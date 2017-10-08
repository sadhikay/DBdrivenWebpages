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
  <script type="text/javascript">
    function dispText()
    {
      if(document.getElementById('filterTitile').checked)
      {
        document.getElementById('titleText').style.display = 'block';
         document.getElementById('descText').style.display = 'none';
         document.getElementById('descText').value='';
      }

     if(document.getElementById('filterDesc').checked)
      {
        document.getElementById('descText').style.display = 'block';
        document.getElementById('titleText').style.display = 'none';
        document.getElementById('titleText').value='';
      }

     if(document.getElementById('noFilter').checked)
      {
        document.getElementById('titleText').style.display = 'none';
        document.getElementById('descText').style.display = 'none';
        document.getElementById('titleText').value='';
        document.getElementById('descText').value='';
        document.getElementById('noFilterText').value='no';
      }
    }
  </script>
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
        <div class="form-group" >
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

   <h2> Search Results</h2>

   
   <div class="alert alert-default alecolor">
   <form class="form-group" method="GET">

    <div class="radio">
    <label><input type="radio" name="filter" value="filterTitile" onclick="dispText()" id="filterTitile"> Filter by Titile:</label><br>
    <input type="text" class="form-control" id="titleText" name="titleText">
    </div>
   
    <div class="radio">
      <label><input type="radio" name="filter" value="filterDesc" id="filterDesc" onclick="dispText()"> Filter by Description:</label>
      <input type="text" class="form-control" id="descText" name="descText">
    </div>

    <div class="radio">
    <label>
    <input type="radio" name="filter" value="noFilter" id="noFilter" onclick="dispText()">No Filter (Show all art works):
     <input type="text" class="form-control" id="noFilterText" name="noFilterText">
    </label>
    </div>

    <button class="btn btn-primary" type="submit" name="filterButton">Filter</button>
   
   </form> 
   </div>
   </div>
   
  <div class="container">
    
    <?php
    if(isset($_GET['filterButton'])) {
      
      $title = $_GET['titleText'];
      $description = $_GET['descText'];
      $noFilter = $_GET['noFilterText'];

      if($title !="" && $title!= null) {

        ini_set('max_execution_time', 300);
      $mysqli=new MySQLi('localhost','root','','art');
      mysqli_set_charset($mysqli,'utf8');
     
      if(!$mysqli)
      {
        die("Connection failed: " . $conn->connect_error);
      }

      $query="select * from artworks where title like'%$title%'";
      $results = $mysqli->query($query);
      if($results->num_rows != 0)
      {
        while($row = $results->fetch_assoc())
       {
        $imgsrc= "http://localhost:81/project_3/images/art/works/square-medium/".$row['ImageFileName'].".jpg";
        $wrkId = $row["ArtWorkID"];
        $part3_url = "Part03_SingleWork.php?wrkId=".$wrkId;
        echo '<div class="row serbotomdisp">';
        echo '<div class="col-md-2">';
        echo "<a href =\"". $part3_url ."\" ><img class= 'img-responsive' src=\"" . $imgsrc . "\"> </a>";
        echo '</div>';
        echo '<div class="col-md-10">';
        echo '<a href ="' . $part3_url .'">'.$row['Title'].'</a><br>';
        echo $row['Description'];
        echo '</div>';
        echo '</div>';

        }

      } 
      else
      {
        echo("No Results");
      }     
}

// search by description
 else if($description !="" && $description!= null) {
        ini_set('max_execution_time', 300);
      $mysqli=new MySQLi('localhost','root','','art');
      mysqli_set_charset($mysqli,'utf8');
     
      if(!$mysqli)
      {
        die("Connection failed: " . $conn->connect_error);
      }

      $query="select * from artworks where description like'%$description%'";
      $results = $mysqli->query($query);
      if($results->num_rows != 0)
      {
        while($row = $results->fetch_assoc())
       {
        $imgsrc= "http://localhost:81/project_3/images/art/works/square-medium/".$row['ImageFileName'].".jpg";
        $wrkId = $row["ArtWorkID"];
        $part3_url = "Part03_SingleWork.php?wrkId=".$wrkId;
        echo '<div class="row serbotomdisp">';
        echo '<div class="col-md-2">';
        echo "<a href =\"". $part3_url ."\" ><img class= 'img-responsive'  src=\"" . $imgsrc . "\"> </a>";
        echo '</div>';
        echo '<div class="col-md-10">';
        echo '<a href ="' . $part3_url .'">'.$row['Title'].'</a><br>';
        echo str_ireplace($description, "<span class='high_light'>$description</span>", $row['Description']);
        echo '</div>';
        echo '</div>';

        }

      }  
      else
      {
        echo("No Results");
      }    
  }
  else if($noFilter !="" && $noFilter!= null){

    ini_set('max_execution_time', 300);
      $mysqli=new MySQLi('localhost','root','','art');
     mysqli_set_charset($mysqli,'utf8');
      if(!$mysqli)
      {
        die("Connection failed: " . $conn->connect_error);
      }

      $query="select * from artworks";
      $results = $mysqli->query($query);
      if($results->num_rows != 0)
      {
        while($row = $results->fetch_assoc())
       {
        $imgsrc= "http://localhost:81/project_3/images/art/works/square-medium/".$row['ImageFileName'].".jpg";
        $wrkId = $row["ArtWorkID"];
        $part3_url = "Part03_SingleWork.php?wrkId=".$wrkId;
        echo '<div class="row serbotomdisp">';
        echo '<div class="col-md-2">';
        echo "<a href =\"". $part3_url ."\" ><img  class= 'img-responsive' src=\"" . $imgsrc . "\"> </a>";
        echo '</div>';
        echo '<div class="col-md-10">';
        echo '<a href ="' . $part3_url .'">'.$row['Title'].'</a><br>';
        echo $row['Description'];
        echo '</div>';
        echo '</div>';

        }

      }
      else
      {
        echo("No Results");
      }

  }
   }

if(isset($_GET['sertxt'])){

  $serTxt = $_GET['sertxt']; 

  if($serTxt !="" && $serTxt!= null) {

        ini_set('max_execution_time', 300);
      $mysqli=new MySQLi('localhost','root','','art');
      mysqli_set_charset($mysqli,'utf8');
     
      if(!$mysqli)
      {
        die("Connection failed: " . $conn->connect_error);
      }

      $query="select * from artworks where title like'%$serTxt%'";
      $results = $mysqli->query($query);
      if($results->num_rows != 0)
      {
        while($row = $results->fetch_assoc())
       {
        $imgsrc= "http://localhost:81/project_3/images/art/works/square-medium/".$row['ImageFileName'].".jpg";
        $wrkId = $row["ArtWorkID"];
        $part3_url = "Part03_SingleWork.php?wrkId=".$wrkId;
        echo '<div class="row serbotomdisp">';
        echo '<div class="col-md-2">';
        echo "<a href =\"". $part3_url ."\" ><img class= 'img-responsive' src=\"" . $imgsrc . "\"> </a>";
        echo '</div>';
        echo '<div class="col-md-10">';
        echo '<a href ="' . $part3_url .'">'.$row['Title'].'</a><br>';
        echo $row['Description'];
        echo '</div>';
        echo '</div>';

        }

      } 
      else
      {
        echo("No Results");
      }     
}

  }

     
    ?>


  </div>
  
 </body>
 </html>