<?php
session_start();
/*
if(isset($_SESSION['user'])!="")
{
//	header("Location: home.php");
}*/
include_once 'connect.php';
$target_dir = "uploads/";

// Check if image file is a actual image or fake image
if(isset($_POST["lg"])) {
	$target_file = $target_dir . basename($_FILES["photo"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    $check = getimagesize($_FILES["photo"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["photo"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
       $photo=basename($_FILES["photo"]["name"]);
		$cabinname = mysqli_real_escape_string($conn,$_POST['name']);
	$type = mysqli_real_escape_string($conn,$_POST['type']);
	$desc = mysqli_real_escape_string($conn,$_POST['desc']);
	$query="INSERT INTO cabins( cabinname, type, description, photo) 
	VALUES ('$cabinname', '$type', '$desc', '$photo')";
   $result=mysqli_query($conn,$query);
   header("location:homecabins.php");
	}	
	
}
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
    <!--Main layout-->
    <main class="mt-5">
<form class="form-signin" method="post" enctype="multipart/form-data">
 
        <!--Main container-->
        <div class="container">
<br/><br/>
            <!--Panel data-->
			
                                    <div class="row">

                                        <!--First column-->
                                        <div class="col-md-6">
                          <div class="md-form">
                                             
                                                <input type="text" required id="orangeForm-name" name="name" class="form-control">
                                                <label for="orangeForm-name">Cabin Name</label>
                                            </div>
											  								 
											

											 
											   <div class="md-form">
                                       
											
                                                   <select name="type" class="mdb-select colorful-select dropdown-info">
                                            <option value="" disabled selected>Cabin Type</option>
                                             			  <option value="luxury">luxury</option>
			  <option value="contemporary">contemporary </option>
			  <option value="original">original</option>
                                        </select>
                                            </div>
                                           

                                           <div class="md-form">
    <textarea mdbActive name="desc" type="text" id="desc" class="md-textarea"></textarea>
    <label for="desc">Description</label>
</div>
                                            

	
	<div class="file-field">
        <div class="btn btn-primary btn-sm">
          
            <input type="file" id="photo" name="photo">
        </div>
        <div class="file-path-wrapper">
           <input class="file-path validate" type="text" placeholder="Upload your file">
        </div>
    </div>
	 <button  class="btn btn-primary btn-lg" id="lg" name="lg" type="submit"> <span class="glyphicon glyphicon-save"></span> Add Cabin </button>
			
                          
                                        </div>
                                      
                                       
                                   </div>
                                    <!--/Panel data-->

            <!--Grid row-->

          

        </div>
        <!--Main container-->
</form>
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
	 <script> $(document).ready(function() {
            $('.mdb-select').material_select();
        });
		</script>
</body>

</html>