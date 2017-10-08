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
      <!--Artwrok Details -->
      <?php
       ini_set('max_execution_time', 300);
      $mysqli=new MySQLi('localhost','root','','art');
     mysqli_set_charset($mysqli,'utf8');
      if(!$mysqli)
      {
        die("Connection failed: " . $conn->connect_error);
      }

      $wId = $_GET['wrkId']; 
      $query = "select * from artists a,artworks ar where ar.ArtistID = a.ArtistID and ar.ArtWorkID =".$wId;
      
      $results = $mysqli->query($query);
       if($results->num_rows != 0)
      {
        $row = $results->fetch_assoc();
        $id = $row["ArtistID"];
        $urlArtist = "Part02_SingleArtist.php?idno=" .$id;
        $imgsrc= "http://localhost:81/project_3/images/art/works/medium/".$row['ImageFileName'].".jpg";
        echo '<h2>'.$row['Title'].'</h2>';
        echo '<p>By <a href ="' . $urlArtist .'">'.$row['FirstName'].' '.$row['LastName'].'</a></p>';
        echo '<div class="col-md-4">';
        echo '<a href=""  data-toggle="modal" data-target="#myModal">
        <img class="thumbnail img-responsive" src="'.$imgsrc.'"></a>';
        echo '</div>';
        echo '<div class="col-md-6">';
        echo '<p>'.$row['Description'].'</p>';
        echo '<p><span style="color:red;font-weight:bold">$'.number_format($row['MSRP'], 2, '.', '').'</span></p>';
        }
        else{
        header ("Location: Error.php");
        }
      ?>


      <button class="btn btn-default">
      <a href="">
      <i class="glyphicon glyphicon-gift" ></i>&nbspAdd to Wish List</button></a></button>
      <button class="btn btn-default">
      <a href="">
      <i class="glyphicon glyphicon-shopping-cart" style="color:cornflowerblue"></i><span class ="text-primary">&nbspAdd to Shopping Cart</span></a></button><br><br>
      
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modDiagWidth">
        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">
        <?php 
          echo $row['Title']."&nbsp".$row['YearOfWork']."&nbsp".$row['FirstName']."&nbsp".$row['LastName'];
        ?>
        </h4>
        </div>
        <div class="modal-body">
        <p>
          <?php
          echo '<img class="img-responsive" src="'.$imgsrc.'">';
          ?>
        </p>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </div>
        </div>
        </div>
        <div class="panel panel-default">
       <div class="panel-heading">Product Details</div>
       <table class="table table-bordered">
       <tbody>
       
         
         
      

    <!--Product Details -->
      <?php
      if(!$mysqli)
      {
        die("Connection failed: " . $conn->connect_error);
      }
     

      echo '<tr><td class ="prodettd">Date:</td><td>'. $row['YearOfWork']."-".$row['YearOfDeath'].'</td></tr>';
      echo '<tr><td class="prodettd">Nationality:</td><td>'.$row['Medium'].'</td></tr>';
      echo '<tr><td class="prodettd">Dimensions:</td><td>'.$row['Width'].'cm x '.$row['Height'].'cm</td></tr>';
      echo '<tr><td class="prodettd">Home:</td><td>'.$row['OriginalHome'].'</td></tr>';
      
      $query= "select * from genres g, artworkgenres ag where g.GenreID = ag.GenreID and ag.ArtWorkID =".$wId;
      $data = $mysqli->query($query);
      if($data->num_rows != 0)
      {
      echo '<tr><td class="prodettd">Genres:</td><td>';
        while($gendata = $data->fetch_assoc())
        {
          echo '<a href="">';
          echo $gendata['GenreName'];
          echo '</a><br>';
        }
        echo '</td></tr>';
      
      } 
      else
      {
      echo "No Results";      }
     

      $query= "select * from subjects s, artworksubjects artsub where artsub.SubjectID = s.SubjectId and artsub.ArtWorkID=".$wId;
      $data = $mysqli->query($query);
      if($data->num_rows != 0)
      {
      echo '<tr><td class="prodettd">Sujects:</td><td>';
        while($subdata = $data->fetch_assoc())
        {
          echo '<a href="">';
          echo $subdata['SubjectName'];
          echo '</a>';
          echo '<br>';
        }
        echo '</td></tr>'; 
      } 
      else
      {
      echo "No Results";      }
     
      ?>
      </tbody>
       </table>
      </div>
      <!--Sales Details -->
      </div>
      <div class="col-md-2">
      <div class="panel panel-info">
      <div class="panel-heading"><span class="text-primary">Sales</span></div>
      <div class="panel-body">
      <?php
      if(!$mysqli)
      {
        die("Connection failed: " . $conn->connect_error);
      }
      $query = "select * from orders o, orderdetails od where o.OrderID=od.OrderID and od.ArtWorkID=".$wId;
      
      $salesData = $mysqli->query($query);

      if($salesData->num_rows != 0)
      {
        while($salesResults = $salesData->fetch_assoc())
        {
          $dateTime = $salesResults['DateCreated'];
          $date=explode(" ", $dateTime);
          $format =date('m/d/y',strtotime($date[0]));
          echo '<a href="">';
          echo $format;
          echo '<br>';
          echo '</a>';
        }

      }
      else
      {
      echo "No Results";      }
      ?>
      </div>
      </div>
      </div>
      
      </div>
      </div>
      </div>
 </body>
 </html>
 