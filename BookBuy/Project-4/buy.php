<!-- 
Student Name: Yezzu Sadhika
Project deatils:  Project 4, 26th November 2016 
Student ID:   1001358368
-->
<!DOCTYPE html>
<html lang=en">
<head>
<title>CheapBook-Proj 4</title>
<link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="dist/css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="cheapbook.css">
</head>
<body>
<?php 
session_start();

if(!isset($_SESSION['username']))
header('Location: login.php');
 $totalPrice = 0;

?>
  <div class="container-fluid">
<center>
	<h2> Welcome to CheapBook</h2>
</center>
<a href="shopping.php" name="basket" class="btn btn-primary" style="margin: 20px">Shop Here!</a>
<a style="float:right;margin-right:30px" style="margin: 10px" href="logout.php" class="btn btn-danger"> Logout</a>
<h4 >Items in <?php echo $_SESSION['username'] ?>'s cart</h4>
<?php
if(!isset($_SESSION['numCart']))
{

echo 'No Items in cart....';
}
else{
?>
<table class="table table-hover" style="margin: 10px">
	<thead>
		<tr>
		<th>Book Name</th>
			<th>ISBN Number</th>
			<th> Author</th>
			<th>No. of Books in Stock</th>
			<th>Cost</th></tr></thead>
			<tbody>
<?php 
ini_set('max_execution_time', 300);
  $mysqli=new MySQLi('localhost','root','','cheapbook');
  mysqli_set_charset($mysqli,'utf8');
  if(!$mysqli)
  {
    die("Connection failed: " . $conn->connect_error);
  }
  if(isset($_SESSION['cart']))
  {
  
  for($i=0;$i<sizeof($_SESSION['cart']);$i++) 
  {
  	$isbn = $_SESSION['cart'][$i];
  	$results = $mysqli->query("select * from writtenby w INNER JOIN book b on w.ISBN = b.ISBN INNER JOIN author a on a.ssn=w.ssn WHERE b.ISBN='".$isbn."'");
  	if($results->num_rows != 0)
	{

		while ($row = $results->fetch_assoc()) {

			$num = $mysqli->query("select number from stocks where ISBN = '".$isbn."'");
			$number = $num->fetch_assoc(); 
			echo '<tr>';
			echo '<td>';
			echo $row['title'];
			echo '</td>';
			echo '<td>';
			echo $row['ISBN'];
			echo '</td>';
			echo '<td>';
			echo $row['name'];
			echo '</td>';
			echo '<td>';
			echo $number['number'];
			echo '</td>';
			echo '<td>$';
			echo $row['price'];
			echo '</td>';
			echo '</tr>';
			$totalPrice = $totalPrice + $row['price'];
			
		}


	}

	else {
		
		echo "No Results";
	}

  }

}


?>
</tbody>		
</table>
<div style="float:right;margin-right:50px">
<?php 

echo 'Total Cost: ';
echo '$';
echo $totalPrice;
}
?>
</div> <br>
<center>
<form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
	<input type="submit" name="buyclick"  class="btn btn-primary" value="Buy">
</form>
</center>
</div>

<?php
if(isset($_POST['buyclick']))
{
   if(isset($_SESSION['cart']))
	{
	$username = $_SESSION['username'];
	$mysqli->query("insert into shoppingbasket (username) values ('{$username}')");
	
	$bId = $mysqli ->query("select max(basketId) as id from shoppingbasket");
	if($bId->num_rows != 0)
	{
		$basketId = $bId->fetch_assoc();
		$basketValue = $basketId['id'];
		for($i=0;$i<sizeof($_SESSION['cart']);$i++)
		{
			echo sizeof($_SESSION['cart']);
			$isbn = $_SESSION['cart'][$i];
			$result = $mysqli->query("select number,warehouseCode from stocks where ISBN='$isbn'");
			$count = $result->fetch_assoc();
			$availStock = $count['number'];
			$warehouseCode = $count['warehouseCode'];
			if($availStock>0)
			{
				$result = $mysqli->query("select number from contains where ISBN='$isbn' and basketID ='$basketValue'");
				if($result->num_rows != 0)
				{
					//increasing the count  of contains table if isbn already exists.
					$num = $result->fetch_assoc();
					$number = $num['number'];
					$number = $number+1;
					$mysqli->query("update contains set number = '$number' where ISBN='$isbn' and basketID ='$basketValue'");

				}
				else
				 {
				 	// inserting for the first time into contains table
				 	$mysqli->query("insert into contains (`ISBN`, `basketID`, `number`) VALUES ('$isbn','$basketValue','1')");
				 }	

				 $resShippingOrdr = $mysqli->query("select number from shippingorder where ISBN='$isbn' and username ='$username'");
				 if($resShippingOrdr->num_rows != 0)
				{
					//increasing the count  of shippingorder table if isbn already exists.
					$numShipOrdr = $resShippingOrdr->fetch_assoc();
					$numberShipOrdr = $numShipOrdr['number'];
					$numberShipOrdr = $numberShipOrdr+1;
					$mysqli->query("update shippingorder set number = '$numberShipOrdr' where ISBN='$isbn' and username ='$username'");
				}
				else
				{
					// inserting for the first time into shippingorder table
					$mysqli->query("insert into shippingorder(`ISBN`, `warehouseCode`, `username`, `number`) values ('$isbn','$warehouseCode','$username','1') ");
					
				}

				$reduceStock = $availStock -1;
				$mysqli->query("update stocks set number='$reduceStock' where ISBN='$isbn'");

				if(isset($_SESSION['added']))
				{

					$_SESSION['added'][$j] = $_SESSION['cart'][$i];
					$j=$j+1;
				}
				else
				{
					$_SESSION['added'] =array();
					$j=0;
					$_SESSION['added'][$j] = $_SESSION['cart'][$i];
					$j=$j+1;
				}
				
				
					
			}
			else
			{
				//no stock available


				if(isset($_SESSION['notAvailable']))
				{
					$_SESSION['notAvailable'][$k] = $_SESSION['cart'][$i];
					$k=$k+1;
				}
				else
				{
					$_SESSION['notAvailable'] =array();
					$k=0;
					$_SESSION['notAvailable'][$k] = $_SESSION['cart'][$i];
					$k=$k+1;
				}


				
			}
		}
		
		
	}
	else {
		//no values in shopping basket
		

		}
		unset($_SESSION['cart']);
		unset($_SESSION['numCart']);
		echo "Not Available in stock. You cnnot place order.";
		header("location: buy.php");
	}
else
{
	//no values in cart
	
	

}

}

if(isset($_SESSION['notAvailable']))
	{
		foreach ($_SESSION['notAvailable'] as $s => $value) {

			echo $_SESSION['notAvailable'][$s];
			echo " ";
		}
		echo ". Not Available in stock. Could not place order for those item(s).";
	}


?>
</body>
</html>