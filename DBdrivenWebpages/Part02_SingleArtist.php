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
  <link rel="stylesheet" type="text/css" href="project-3.css">
  <meta charset="utf8">
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
  
  <div class="row">

  <?php
  ini_set('max_execution_time', 300);
  $mysqli=new MySQLi('localhost','root','','art');
  mysqli_set_charset($mysqli,'utf8');
  if(!$mysqli)
  {
    die("Connection failed: " . $conn->connect_error);
  }
  $id = $_GET['idno']; 

  $imgSrc = "http://localhost:81/project_3/images/art/artists/medium/".$id.".jpg";
  
  $query = "select * from artists where ArtistId=".$id;
  
  $results = $mysqli->query($query);
  if($results->num_rows != 0)
  {
    $row = $results->fetch_assoc();
    
      echo '<h2>&nbsp'.$row['FirstName'].' '.$row['LastName'].'</h2>';
      echo '<div class="col-md-4">';
     // echo '<a href =" " class="img-thumbnail">';
      echo "<img  class='thumbnail img-responsive' src=\"" . $imgSrc . "\" > </a> </div> ";
      echo '<div class="col-md-6"><div>'.$row['Details'].'</div><br>' ;  
      echo '<button class="btn btn-default"><i class="glyphicon glyphicon-heart" style="color:cornflowerblue"></i><span class ="text-primary">&nbspAdd to Favourites List</span></button><br><br>';

   
      echo '<div class="panel panel-default">';
      echo '<div class="panel-heading">Artist Detils</div>';
      echo '<table class="table table-bordered">';
      echo '<tbody>';
      echo '<tr><td class="prodettd">Date:</td><td>'. $row['YearOfBirth']."-".$row['YearOfDeath'].'</td></tr>';
      echo '<tr><td class="prodettd">Nationality:</td><td>'.$row['Nationality'].'</td></tr>';
      echo '<tr><td class="prodettd">More Info:</td><td>'.$row['ArtistLink'].'</td></tr>';
      echo '</tbody>';  
      echo '</table>'; 
      echo '</div>';
      echo '</div>';
      echo '</div>';

     
     
      echo '<h3> Art by '.$row['FirstName'].' '.$row['LastName'].'</h3>';
      echo "</div>";

  }
  else
  {
    header ("Location: Error.php");
  }
  ?>
  <!--Artists Art Works -->
  <div class="container">
      <div class="row">
      <?php
       ini_set('max_execution_time', 300);
      $mysqli=new MySQLi('localhost','root','','art');
      mysqli_set_charset($mysqli,'utf8');
      if(!$mysqli)
      {
        die("Connection failed: " . $conn->connect_error);
      }
      $id = $_GET['idno']; 
     // $imgSrc = "http://localhost:81/project_3/images/art/works/square-thumbs/";
      $query = "select * from artworks where ArtistId=".$id;
      $results = $mysqli->query($query);
      if($results->num_rows != 0)
      {

        while($row = $results->fetch_assoc())
        {
        $imgsrc= "http://localhost:81/project_3/images/art/works/square-medium/".$row['ImageFileName'].".jpg";
        $wrkId = $row["ArtWorkID"];
        $part3_url = "Part03_SingleWork.php?wrkId=".$wrkId;
        
        echo '<div class="col-md-3">';
        echo "<div class='panel panel-default pantext'>";
        //echo '<table class ="tabalign">';
        //echo "<tr><td class ='tablecenter'>";
        echo "<a href =\"". $part3_url ."\" ><img class='thumbnail  img-responsive center-block' src=\"" . $imgsrc . "\"> </a>";
        echo '<div class="txtartWorkTitle" >';
        echo '<a href ="' . $part3_url .'">'.$row['Title'].'</a><br>';
        echo '</div>';
        echo '<div class="txtartWorkButt" >';
        echo '<a href ="' . $part3_url .'"> <button class="btnstyleview"><i class="glyphicon glyphicon-info-sign" style="color:white"></i>&nbspView</button></a>';
        echo '&nbsp<button class="btnstylewish"><i class="glyphicon glyphicon-gift" style="color:white"></i>&nbspWish</button>';
        echo '&nbsp<button class="btnstylecart"><i class="glyphicon glyphicon-shopping-cart" style="color:white"></i>&nbspCart</button>';
        echo '</div>';
       // echo '</td></tr>';
        //echo '<tr><td class ="tablecenter"></td></tr>';
        //echo '</table>';
        echo '</div>';
        echo "</div>";

      }
    }
      else
      {
        header ("Location: Error.php");
      }
      ?>

      
 </body>
 </html>
 