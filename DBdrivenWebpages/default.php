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
        <li class="active"><a href="default.php">Home<span class="sr-only">(current)</span></a></li>
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
      <form method="GET" class="navbar-form navbar-right"  action ="Part04_Search.php" >
        <div class="form-group">
        <span class ="text-muted">Sadhika Yezzu &nbsp</span>

          <input type="text" class="form-control" placeholder="Search" name="sertxt">
        </div>
        <button type="submit" class="btn btn-primary" name="serBtn">Search</button>
       
          </form>
      </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
 </nav>
 <div>
 <p>
 </p>	
 </div>

   <div class="jumbotron">
      <div class="container">
        <h1>Welcome to Assignment #3</h1>
        <p>This is the first assignemt for Sadhika Yezzu for COMP 5335</p>
        </div>
    </div>
  <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-15 col-sm-2">
          <h3><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>&nbspAbout US</h3>
          <p>What this is all about and other stuff.</p>
          <p><a class="btn btn-default" href="AboutUs.php" role="button"><span class="glyphicon glyphicon-link" aria-hidden="true"></span>&nbspVisit Page </a></p>
        </div>
        <div class="col-md-15 col-sm-2">
          <h3><span class="glyphicon glyphicon-list" aria-hidden="true"></span>&nbspArtist List</h3>
          <p>Displays the list of artist names as links. </p>
          <p><a class="btn btn-default" href="Part01_ArtistsDataList.php" role="button"><span class="glyphicon glyphicon-link" aria-hidden="true"></span> &nbspVisit Page </a></p>
       </div>
        <div class="col-md-15 col-sm-2">
          <h3><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbspSingle Artist</h3>
          <p>Displays information for a single artist.</p>
          <p><a class="btn btn-default" href="Part02_SingleArtist.php?idno=19" role="button"><span class="glyphicon glyphicon-link" aria-hidden="true"></span>&nbspVisit Page </a></p>
        </div>
        <div class="col-md-15 col-sm-2">
          <h3><span class="glyphicon glyphicon-picture" aria-hidden="true"></span>&nbspSingle Work</h3>
          <p>Displays information for a single work.</p>
          <p><a class="btn btn-default" href="Part03_SingleWork.php?wrkId=394" role="button"><span class="glyphicon glyphicon-link" aria-hidden="true"></span>&nbspVisit Page</a></p>
        </div>
        <div class="col-md-15 col-sm-2">
          <h3><span class="glyphicon glyphicon-search" aria-hidden="true"></span>&nbspSearch</h3>
          <p>Perform search on ArtWorks tabels</p>
          <p><a class="btn btn-default" href="Part04_Search.php" role="button"><span class="glyphicon glyphicon-link" aria-hidden="true"></span>&nbspVisit Page </a></p>
        </div>
      </div>
    </div> <!-- /container -->
</body>
</html>