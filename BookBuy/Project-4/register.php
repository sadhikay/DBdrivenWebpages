<!-- 
Student Name: Yezzu Sadhika
Project deatils:  Project 4, 26th November 2016 
Student ID:   1001358368
--><!DOCTYPE html>
<html lang="en">
<head>
<title>CheapBook-Proj 4</title>
<link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="dist/css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="cheapbook.css">
</head>
<body>
<h2><center> Welcome to CheapBook </center></h2><br>
<h4> <center>REGISTER HERE!!</center></h4>
<form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
	<center>
		<label>USER NAME</label>
		<input type="text" name="user" class="form-control inputWidth" >
		<label>PASSWORD</label>
		<input type="PASSWORD" name="password" class="form-control inputWidth">
		<label>ADDRESS</label>
		<input type="text" name="address" class="form-control inputWidth" >
		<label>PHONE NUMBER</label>
		<input type="text" name="phone" class="form-control inputWidth">
		<label>EMAIL</label>
		<input type="text" name="email" class="form-control inputWidth" >
		<br>
		<input type="submit" class="btn btn-primary" name="submit" value="REGISTER"> <br>
	</center>
</form>

<?php

    if(isset($_POST['submit']))
  {

  $username = $_POST['user'];	
  $password = $_POST['password'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];

  ini_set('max_execution_time', 300);
  $mysqli=new MySQLi('localhost','root','','cheapbook');
  mysqli_set_charset($mysqli,'utf8');
  if(!$mysqli)
  {
    die("Connection failed: " . $conn->connect_error);
  }
  //$query = "INSERT INTO customers(username, password,address,phone, email) VALUES ('$username','".md5($password)"','$address','$phone','$email')";
 
  $result = $mysqli->query("insert into Customers(username, password,address,phone,email) values ('$username','".md5($password)."','$address','$phone','$email')");
  // $result = $mysqli->exec("insert into Customers(username, password,address,phone,email) values ('$username','".md5($password)."','$address','$phone','$email')");
  	
  		echo "Registered Successfully :)";
  		header('location:login.php');
  	
}

  ?>

</body>
</html>
