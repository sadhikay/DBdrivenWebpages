<!-- 
Student Name: Yezzu Sadhika
Project deatils:  Project 3, 20th November 2016 
Student ID:   1001358368
-->
<!DOCTYPE html>
<html lang="en">
<head>
	<title>COMP 3512 Assign #3</title>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="dist/js/bootstrap.js"></script>
	<link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="dist/css/bootstrap-theme.min.css">
</head>

<body>
	 <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
       <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Assign 3</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="default.php">Home<span class="sr-only">(current)</span></a></li>
        <li><a href="AboutUs.php">About Us</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pages <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="Part01_ArtistsDataList.php">Artists Data List (Part 1)</a></li>
           <li><a href="Part02_SingleArtist.php?idno=19 ">Single Artist (Part 2)</a></li>
            <li><a href="Part03_SingleWork.php?wrkId=394">Single Work (Part 3)</a></li>
            <li><a href="Part04_Search.php">Search (Part 4)</a></li>
          </ul>
        </li>
      </ul>
      <form method="GET" class="navbar-form navbar-right"  action ="Part04_Search.php">
        <div class="form-group">
        <span class ="text-muted">Sadhika Yezzu &nbsp</span>
           <input type="text" class="form-control" placeholder="Search" name="sertxt">
        </div>
        <button type="submit" class="btn btn-primary" name="serBtn">Search</button>
      </form>
      </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
 </nav>
 <div class="container">
  <div class="page-header">
  </div>
  </div>
<div class="container">
  <div class="page-header">
    <h1> Artist Data List (Part 1)</h1>
    <hr>

 <?php

 ini_set('max_execution_time', 300);
$mysqli=new MySQLi('localhost','root','','art');
mysqli_set_charset($mysqli,'utf8');
if(!$mysqli)
{
  die("Connection failed: " . $conn->connect_error);
}
$resultSet = $mysqli->query("Select ArtistID,FirstName,LastName,YearOfBirth, YearOfDeath from art.artists order by LastName");
//$resultSet = $mysqli->query("Select * from art.artists");
if($resultSet->num_rows !=0)
{
// Loop through the query results, outputing the options one by one
while ($row = $resultSet->fetch_assoc()) 
{
  $id = $row["ArtistID"];
  echo "<p>";
  $url = "Part02_SingleArtist.php?idno=" .$id;
  echo "<a href=\"" . $url . "\">";
  echo $row['FirstName']." ";
  echo $row['LastName']." (";
  echo $row['YearOfBirth']."-";
  echo $row['YearOfDeath'].") "; 
  echo "</a>";
  echo "</p>";  
  }
}
else 
{
  header ("Location: Error.php");

}
?>
</div>
</div>
</body>
</html>
