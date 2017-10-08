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
	<div>
		<h2><center> Welcome to CheapBook </center></h2><br>
	<form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
	<center>
		<label>USER NAME</label>
		<input type="text" name="user" class="form-control inputWidth" ><br>
		<label>PASSWORD</label>
		<input type="PASSWORD" name="pass" class="form-control inputWidth">
		<br>
		<input type="submit" class="btn btn-primary" name="login" value="Log In"> <br>
		<br>
        <a href="register.php" class="btn btn-primary">New Member? Register Here</a>
	</center>
	</form>

	</div>
<?php


if(isset($_POST['login'])){

 $username = $_POST['user'];
 $password = $_POST['pass'];
 
  ini_set('max_execution_time', 300);
  $mysqli=new MySQLi('localhost','root','','cheapbook');
  mysqli_set_charset($mysqli,'utf8');
  if(!$mysqli)
  {
    die("Connection failed: " . $conn->connect_error);
  }
  $result = $mysqli->query("Select password from customers where username='".$username."'");
  $row = $result->fetch_assoc();
  $pass = md5($password);
  if($pass == $row['password'])
  {
  	echo "Login Successfull";
  	session_start();
  	$_SESSION['username'] = $username;
    header('Location: shopping.php'); 
  }
 else
    echo "Login Unsuccessfull. Enter Correct Paassword";
 
 }


  ?>
  </div>
  </body>
</html>