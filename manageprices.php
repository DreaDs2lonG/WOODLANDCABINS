<?php
session_start();
/*
if(isset($_SESSION['user'])!="")
{
//	header("Location: home.php");
}*/
include_once 'connect.php';


// Check if image file is a actual image or fake image
if(isset($_POST["lgx"])) {

		$season = mysqli_real_escape_string($conn,$_POST['season']);
	$type = mysqli_real_escape_string($conn,$_POST['type']);
	$amount = mysqli_real_escape_string($conn,$_POST['amount']);
	$query="INSERT INTO cabinprices( type, season, price) 
	VALUES ('$type', '$season', '$amount')";
   $result=mysqli_query($conn,$query);
   //header("location:viewcabins.php");
	}	
	


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Material Design Bootstrap</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

     <!--Main Navigation-->
    <header>

        <!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark indigo fixed-top scrolling-navbar">
             <div class="container">
               
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!--Links-->
                    <ul class="navbar-nav mr-auto">
                        
                       
                        <li class="nav-item">
                            <a class="nav-link" href="homecabins.php" >Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="newcabins.php"  >Manage cabins</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="manageprices.php">Prices</a>
                        </li>
						<li class="nav-item">
                            <a class="nav-link" href="viewclientbookings.php">Manage Bookings</a>
                        </li>
						<li class="nav-item">
                            <a class="nav-link" href="onlineforum.php">Forum</a>
                        </li>
						<li class="nav-item">
                            <a class="nav-link" href="index.php">Logout</a>
                        </li>
                    </ul>

                    <!--Social Icons-->
                    <ul class="navbar-nav nav-flex-icons">
                        <li class="nav-item">
                            <a class="nav-link"><i class="fa fa-facebook cyan-text"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"><i class="fa fa-twitter cyan-text"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"><i class="fa fa-instagram cyan-text"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
      
	   </nav>
        <!--/.Navbar-->

    </header>
      
    <!--Main Navigation-->
	 <form method="post">
	<div class="modal fade" id="modal-info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-bold">Sign in</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form">
                    <select name="type" class="mdb-select colorful-select dropdown-info">
			<option value="luxury" disabled selected>Cabin Type</option>
			  <option value="luxury">luxury</option>
			  <option value="contemporary">contemporary </option>
			  <option value="original">original</option>
			  </select>    </div>

                <div class="md-form">
                     <select name="season" class="mdb-select colorful-select dropdown-info">
			   <option value="Autumn" disabled selected>Season</option>
			  <option value="Autumn">Autumn</option>
			  <option value="Spring">Spring</option>
			  <option value="Summer">Summer </option>
			  <option value="Winter">Winter</option>
			  </select>
                </div>
				
				<div class="md-form">
				<b>Amount </b>
                <input type="text" id="amount" name="amount" class="form-control"  >
				
				</div>

            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button  class="btn btn-success btn-lg" id="lgx" name="lgx" type="submit"> <span class="glyphicon glyphicon-save"></span> Submit </button>

            </div>
        </div>
    </div>
</div>
</form>


    <main class="mt-5">

        <!--Main container-->
        <div class="container">
<br/><br/>
            <!--Grid row-->
            <div class="row">

             
							<form method="post">		
                        <!--Card content-->
                        <div class="card-body">
						<div call="text-left">
<a class="btn btn-success" data-toggle="modal" data-target="#modal-info">Add Prices</a>
</div>
                  
	                          
									
									
 			

             
	                           
							
	                        </div>
							</form>
							
							
							
					<table class="table">
  <thead>
    <tr>

      <th>Type of cabin</th>
      <th>Season</th>
      <th>Price</th>
    </tr>
  </thead>
  <tbody>
   <?php
$query="select * from cabinprices ORDER BY type";
$result=mysqli_query($conn,$query);

while($row=mysqli_fetch_array($result))
{
?>
    <tr>
      
      <td><?php echo $row[1]; ?></td>
      <td><?php echo $row[2]; ?></td>
      <td><?php echo $row[3]; ?></td>
	 <td><a href="deleteprices.php?q=<?php echo $row[0]; ?>" class="btn btn-warning btn-sm">Delete</a></td>
    </tr>
   <?php
}
   ?>
    
  </tbody>
</table>
                            	 

            </div>
            <!--Grid row-->

          

        </div>
        <!--Main container-->

    </main>
    <!--Main layout-->

   <!--Footer-->
<footer class="page-footer indigo center-on-small-only pt-0">

  
    <!--Copyright-->
    <div class="footer-copyright">
        <div class="container-fluid">
            © 2017 Copyright: <a href="index.php"> Woodlands cabins </a>
        </div>
    </div>
    <!--/Copyright-->

</footer>
<!--/Footer-->
                


    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
<script>
		$(document).ready(function() {
    $('.mdb-select').material_select();
  });
  </script>
	</body>

</html>