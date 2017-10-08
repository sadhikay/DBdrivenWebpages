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
<div class="container-fluid">
<?php
session_start();
if(!isset($_SESSION['username']))
header('Location: login.php');

if(isset($_POST['addCart'])){

if(isset($_SESSION['cart'])){

		$_SESSION['cart'][]=$_POST['cart'];
		$_SESSION['numCart'] = $_SESSION['numCart'] + 1 ;
	}
else
	{
		$_SESSION['cart']=array();
		$_SESSION['numCart'] = 0;
		$_SESSION['cart'][]= $_POST['cart'];
		$_SESSION['numCart'] = $_SESSION['numCart'] + 1 ;
	}
}

?>

<?php
$sel = 0;
if(isset($_SESSION['numCart'])) 
{
	$sel = $_SESSION['numCart'];
}
//echo $_SESSION['numCart']
	
?>
<center>
	<h2> Welcome to CheapBook</h2>
</center>
<form action="buy.php">
<button name="shopping" class="btn btn-primary" id="shopping"><span>Shopping Basket.<span class="badge"><?php echo $sel; ?></span></span>
</button>
</form>
<a style="float:right;margin-right:30px" style="margin: 10px" href="logout.php" class="btn btn-danger"> Logout</a>
<form action="<?php $_SERVER['PHP_SELF']?>" method="GET">
<center>
	<textarea name="search" placeholder="Search" class="form-group"></textarea> <br>
	<input type="submit" name="author" class="btn btn-default" value="Search by Author"> &nbsp &nbsp
	<input type="submit" name="title" class="btn btn-default" value="Search by Title"><br><br>
</center>
</form>
<table class="table table-hover" style="margin: 10px">
	<thead>
		<tr>
<?php

ini_set('max_execution_time', 300);
  $mysqli=new MySQLi('localhost','root','','cheapbook');
  mysqli_set_charset($mysqli,'utf8');
  if(!$mysqli)
  {
    die("Connection failed: " . $conn->connect_error);
  }


if(isset($_GET['author'])){

	$selected = $_GET['search'];
	$results = $mysqli->query("select * from writtenby w INNER JOIN book b on w.ISBN = b.ISBN INNER JOIN author a on a.ssn=w.ssn WHERE name LIKE '%$selected%'");
	
	if($results->num_rows != 0)
	{
		
		echo'<th>Book Name</th>
			<th>ISBN Number</th>
			<th> Author</th>
			<th>No. of Books in Stock</th>
			<th>Add to Cart</th></tr></thead>';
		echo "<tbody>";	

		while ($row = $results->fetch_assoc()) {

			$isbn = $row['ISBN'];
			$num = $mysqli->query("select number from stocks where ISBN = '".$isbn."'");
			$number = $num->fetch_assoc(); 
			if( $number['number'] != 0)
			{
			?>

             <tr>
			<td><?php echo $row['title']?></td>
			<td><?php echo $row['ISBN']?></td>
			<td><?php echo $row['name']?></td>
			<td><?php echo $number['number']?></td>
			<td>
			<form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
			<input value="<?php echo $row['ISBN'] ?>" name="cart" hidden="true"/>	
			<input type="submit" name="addCart" value="add to cart"/>
			</form>
			</td>
			</tr>
			<?php
			}

		}

	}
	else {
		
		echo "No Results";
	}

}
elseif (isset($_GET['title'])) {


	$selected = $_GET['search'];
	
	$results = $mysqli->query("select * from writtenby w INNER JOIN book b on w.ISBN = b.ISBN INNER JOIN author a on a.ssn=w.ssn WHERE title LIKE '%$selected%'");
	
	
	if($results->num_rows != 0)
	{
		
		echo'<th>Book Name</th>
			<th>ISBN Number</th>
			<th> Author</th>
			<th>No. of Books in Stock</th>
			<th>Add to Cart</th></tr></thead>';
		echo "<tbody>";	
		
			while ($row = $results->fetch_assoc()) {

			$isbn = $row['ISBN'];
			$num = $mysqli->query("select number from stocks where ISBN = '".$isbn."'");
			$number = $num->fetch_assoc(); 
			if( $number['number'] != 0)
			{
			?>

             <tr>
			<td><?php echo $row['title']?></td>
			<td><?php echo $row['ISBN']?></td>
			<td><?php echo $row['name']?></td>
			<td><?php echo $number['number']?></td>
			<td>
			<form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
			<input value="<?php echo $row['ISBN'] ?>" name="cart" hidden="true"/>	
			<input type="submit" name="addCart" value="add to cart"/>
			</form>
			</td>
			</tr>
			<?php
			
		}

		}

	}
	else {
		
		echo "No Results";
	}
	
}



?>
</tbody>		
</table>

<div>

</div>
</div>
</body>
</body>
</html>