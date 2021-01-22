<?php
session_start();

include_once 'connect.php';
if(isset($_POST["log"])){
$fname = mysql_real_escape_string($_POST['fname']);
	$uname = mysql_real_escape_string($_POST['username']);
	$email = mysql_real_escape_string($_POST['email']);
	$upass = md5(mysql_real_escape_string($_POST['password']));
	$lname = (mysql_real_escape_string($_POST['lname']));
	$gender = (mysql_real_escape_string($_POST['gender']));
	$status=1;
	
	if(mysqli_query($conn,"INSERT INTO users(firstName, lastName, username, password, status, gender) 
		VALUES('$fname', '$lname', '$uname', '$upass', '$status', '$gender')"))
	{
		?>
        <script>alert('successfully registered ');</script>
        <?php
        header("location:landingpage.php");
	}
	else
	{
		
		?>
        <script>alert('error while registering you...');</script>
        <?php
	}

}

if(isset($_POST['login']))
{
	$username = mysqli_real_escape_string($conn,$_POST['username']);
	$upass = md5(mysqli_real_escape_string($conn,$_POST['password']));
	$res=mysqli_query($conn,"SELECT * FROM users WHERE username='$username'");
	$row=mysqli_fetch_array($res);
	
	if($row['password']==($upass) )
	{
		$_SESSION['status'];
		$_SESSION['user'] = $row['firstName']. " " . $row['lastName'] ;
   $_SESSION['userid'] =$row['userID'];
   if($row['status']==1)
   {
	 $_SESSION['status'] =1; 
   }else{
	 $_SESSION['status'] =0;   
	   
   }
	header("Location: homecabins.php");	 
	
	
	}
	else
	{
		?>
        <script>alert('wrong details or inactive account');</script>
        <?php
	}
	
}
?>
<!DOCTYPE html>
<html lang="en" class="full-height">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Material Design Bootstrap</title>

    <!-- Meta OG -->
    <meta property="og:title" content="Material Design Medical Landing Page">
    <meta property="og:description" content="Perfect for projects closely connected to clinics, hospitals or related businesses.">
    <meta property="og:image" content="https://mdbootstrap.com/img/Live/MDB/medical-landing.jpg">
    <meta property="og:url" content="https://mdbootstrap.com/live/_MDB/templates/Landing-Page/medical-landing-page.html">
    <meta property="og:site_name" content="mdbootstrap.com">
    <!-- /Meta OG -->

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:description" content="Perfect for projects closely connected to clinics, hospitals or related businesses." />
    <meta name="twitter:title" content="Material Design Medical Landing Page" />
    <meta name="twitter:site" content="@MDBootstrap" />
    <meta name="twitter:image" content="https://mdbootstrap.com/img/Live/MDB/medical-landing.jpg" />
    <meta name="twitter:creator" content="@MDBootstrap" />
    <!-- /Twitter Card -->    

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">

    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">

    <style>
        @media (max-width: 740px) {
            .full-height,
            .full-height body,
            .full-height header,
            .full-height header .view {
                height: 700px; 
            } 
        }
    </style>

</head>

<body class="medical-lp">

    <!--Navigation & Intro-->
    <header>

        <!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark indigo fixed-top scrolling-navbar">
            <div class="container">
               
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!--Links-->
                    <ul class="navbar-nav mr-auto ">
                        
                       
                        <li class="nav-item">
                            <a class="nav-link" href="eventcalendar.php" data-offset="100" >Calendar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="modal" data-target="#modal-info">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="modal" data-target="#modal-contact">Register</a>
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
        <!--/Navbar-->

        <!-- Intro Section -->
        <div id="home" class="view hm-black-strong-1 jarallax" data-jarallax='{"speed": 0.2}' style="background-image: url('img/italy-2021154_1920.jpg');">
            <div class="full-bg-img">
                <div class="container flex-center">
                    <div class="row smooth-scroll">
                        <div class="col-md-12 white-text text-center">
                            <div class="wow fadeInDown" data-wow-delay="0.2s">
                                <h2 class="display-3 font-up font-bold mb-2">Woodlands cabins</h2>
                                <hr class="hr-light">
                                 </div>
                           
                            <a href="#services" data-offset="100" class="btn btn-rounded btn-cyan-2 wow fadeInUp" data-wow-delay="0.2s">View cabins</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <form method="post">
        <!--Modal Contact-->
        <div class="modal fade modal-ext" id="modal-contact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <!--Content-->
                <div class="modal-content">
                    <!--Header-->
                    <div class="modal-header text-center">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title w-100"  id="myModalLabel">Write to us</h4>
                    </div>
                    <!--Body-->
                    <div class="modal-body">
                       
                        <div class="md-form">
                            <i class="fa fa-user prefix"></i>
                            <input type="text" id="form22" name="fname" class="form-control">
                            <label for="form42">First name</label>
                        </div>
      <div class="md-form">
                            <i class="fa fa-user prefix"></i>
                            <input type="text" id="form22" name="lname" class="form-control">
                            <label for="form42">last name</label>
                        </div>
						 <div class="md-form">
                            <i class="fa fa-user prefix"></i>
                            <input type="text" id="form22" name="username" class="form-control">
                            <label for="form42">Username</label>
                        </div>
						 <div class="md-form">
                            <i class="fa fa-user prefix"></i>
                            <input type="password" id="form22" name="password" class="form-control">
                            <label for="form42">password</label>
                        </div>
                        <div class="md-form">
                            <i class="fa fa-envelope prefix"></i>
                            <input type="text" id="form32" name="email" class="form-control">
                            <label for="form34">Your email</label>
                        </div>
                     <div class="md-form">
                            
                                  <select name="gender"  class="mdb-select colorful-select dropdown-info">
                                           
                                             <option value="Male">Male</option>
			     <option value="Male">Female</option>
                                        </select>
                            <label for="form34">Gender</label>
                        </div>
                       

                      

                        <div class="text-center">
                            <button id="log" name="log" class="btn btn-rounded btn-info waves-effect">Submit</button>
  <button type="button" class="btn btn-rounded btn-unique waves-effect" data-dismiss="modal">Close</button>
                          
                            
                        </div>
                    </div>
                    <!--Footer-->
                    <div class="modal-footer">
                        </div>
                </div>
                <!--/Content-->
            </div>
        </div>
        <!--/Modal Contact-->
</form>
  <form method="post">
        <!--Modal Contact-->
        <div class="modal fade modal-ext" id="calendar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <!--Content-->
                <div class="modal-content">
                    <!--Header-->
                    <div class="modal-header text-center">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title w-100"  id="myModalLabel">Write to us</h4>
                    </div>
                    <!--Body-->
                    <div class="modal-body">
                       
                        <div class="md-form">
                            <i class="fa fa-user prefix"></i>
                            <input type="text" id="form22" name="fname" class="form-control">
                            <label for="form42">First name</label>
                        </div>
      <div class="md-form">
                            <i class="fa fa-user prefix"></i>
                            <input type="text" id="form22" name="lname" class="form-control">
                            <label for="form42">last name</label>
                        </div>
						 <div class="md-form">
                            <i class="fa fa-user prefix"></i>
                            <input type="text" id="form22" name="username" class="form-control">
                            <label for="form42">Username</label>
                        </div>
						 <div class="md-form">
                            <i class="fa fa-user prefix"></i>
                            <input type="password" id="form22" name="password" class="form-control">
                            <label for="form42">password</label>
                        </div>
                        <div class="md-form">
                            <i class="fa fa-envelope prefix"></i>
                            <input type="text" id="form32" name="email" class="form-control">
                            <label for="form34">Your email</label>
                        </div>
                     <div class="md-form">
                            
                                  <select name="gender"  class="mdb-select colorful-select dropdown-info">
                                           
                                             <option value="Male">Male</option>
			     <option value="Male">Female</option>
                                        </select>
                            <label for="form34">Gender</label>
                        </div>
                       

                      

                        <div class="text-center">
                            <button id="log" name="log" class="btn btn-rounded btn-info waves-effect">Submit</button>
  <button type="button" class="btn btn-rounded btn-unique waves-effect" data-dismiss="modal">Close</button>
                          
                            
                        </div>
                    </div>
                    <!--Footer-->
                    <div class="modal-footer">
                        </div>
                </div>
                <!--/Content-->
            </div>
        </div>
        <!--/Modal Contact-->
</form>
        <!--Modal Info-->
		 <form method="post">
        <div class="modal fade modal-ext" id="modal-info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <!--Content-->
                <div class="modal-content">
                    <!--Header-->
                    <div class="modal-header text-center">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title w-100" id="myModalLabel">Login</h4>
                    </div>
                    <!--Body-->
                    <div class="modal-body text-center">
                       
                       
                             <!--Card content-->
                      

                  
                    <!--Body-->
                   <div class="md-form">
                                   
                                    <input type="text" required name="username" id="form-name" class="form-control">
                                    <label for="form-name">Your Username</label>
                                </div>

                    <div class="md-form">
                       
                        <input type="password" required name="password" id="defaultForm-pass" class="form-control">
                        <label for="defaultForm-pass" class="">Your password</label>
                    </div>

                    <div class="text-center">
                        <button type="submit" name="login" class="btn btn-rounded btn-info waves-effect" >Login</button>
                             <button type="button" class="btn btn-rounded btn-info waves-effect" data-dismiss="modal">Close</button>
                
				   </div>

                

                            
                        </div>
                        <!--/First row-->
                        
                    </div>
                    
                </div>
                <!--/Content-->
            </div>
			</form>
        </div>
        <!--/Modal Info-->

    </header>
    <!--/Navigation & Intro-->
    
    <!--Main content-->
    <main>

      
        <!--/Streak-->
        
        <div class="container">

           
            <!--Projects section v.2-->
            <section id="services" class="section">

                <div class="row text-center">

                    <!--First column-->
                    <div class="col-lg-4 col-md-12 mb-r wow fadeIn" data-wow-delay="0.4s">

                        <!--Featured image-->
                        <div class="view overlay hm-white-slight z-depth-1 z-depth-2">
                            <img src="uploads/cabin1.jpg">
                        </div>

                        <!--Excerpt-->
                        <div class="card-body">
                            <a href="" class="cyan-text"><h5><i class="fa fa-home"></i> Luxury</h5></a>
                             </div>

                    </div>
                    <!--/First column-->

                    <!--Second column-->
                    <div class="col-lg-4 col-md-6 mb-r wow fadeIn" data-wow-delay="0.4s">

                        <!--Featured image-->
                        <div class="view overlay hm-white-slight z-depth-1 z-depth-2">
                           <img src="uploads/cabin2.jpg">  </div>

                        <!--Excerpt-->
                        <div class="card-body">
                            <a href="" class="cyan-text"><h5><i class="fa fa-home"></i> Contemporary</h5></a>
                             </div>

                    </div>
                    <!--/Second column-->

                    <!--Third column-->
                    <div class="col-lg-4 col-md-6 mb-r wow fadeIn" data-wow-delay="0.4s">

                        <!--Featured image-->
                        <div class="view overlay hm-white-slight z-depth-1 z-depth-2">
                          <img src="uploads/cabin3.jpg"> </div>

                        <!--Excerpt-->
                        <div class="card-body">
                            <a href="" class="cyan-text"><h5><i class="fa fa-home"></i> Original</h5></a>
                            </div>

                    </div>
                    <!--/Third column-->
                </div>
                <!--/First row-->

            </section>
            <!--/Projects section v.2-->

        </div>
            
        <div class="container">

           
            <!--Projects section v.2-->
            <section id="services" class="section">

                <div class="row text-center">

                    <!--First column-->
                    <div class="col-lg-4 col-md-12 mb-r wow fadeIn" data-wow-delay="0.4s">

                        <!--Featured image-->
                        <div class="view overlay hm-white-slight z-depth-1 z-depth-2">
                         <img src="uploads/cabin4.jpg">  </div>

                        <!--Excerpt-->
                        <div class="card-body">
                            <a href="" class="cyan-text"><h5><i class="fa fa-home"></i> Luxury</h5></a>
                             </div>

                    </div>
                    <!--/First column-->

                    <!--Second column-->
                    <div class="col-lg-4 col-md-6 mb-r wow fadeIn" data-wow-delay="0.4s">

                        <!--Featured image-->
                        <div class="view overlay hm-white-slight z-depth-1 z-depth-2">
                           <img src="uploads/cabin5.jpg"> </div>

                        <!--Excerpt-->
                        <div class="card-body">
                            <a href="" class="cyan-text"><h5><i class="fa fa-home"></i> Contemporary</h5></a>
                             </div>

                    </div>
                    <!--/Second column-->

                    <!--Third column-->
                    <div class="col-lg-4 col-md-6 mb-r wow fadeIn" data-wow-delay="0.4s">

                        <!--Featured image-->
                        <div class="view overlay hm-white-slight z-depth-1 z-depth-2">
                          <img src="uploads/cabin6.jpg">  </div>

                        <!--Excerpt-->
                        <div class="card-body">
                            <a href="" class="cyan-text"><h5><i class="fa fa-home"></i> Original</h5></a>
                            </div>

                    </div>
                    <!--/Third column-->
                </div>
                <!--/First row-->

            </section>
            <!--/Projects section v.2-->

        </div>
        
    </main>
    <!--/Main content-->

  <footer class="page-footer indigo center-on-small-only pt-0">

  
    <!--Copyright-->
    <div class="footer-copyright">
        <div class="container-fluid">
            © 2017 Copyright: <a href="index.php"> Woodlands cabins </a>
        </div>
    </div>
    <!--/Copyright-->

</footer>

    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>

    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>

    <script>
        //Animation init
        new WOW().init();
        
        //Modal
        $('#myModal').on('shown.bs.modal', function () {
          $('#myInput').focus()
        })
        
        // Material Select Initialization
        $(document).ready(function() {
            $('.mdb-select').material_select();
        });

    </script>
    <!--Google Maps-->
    <script src="https://maps.google.com/maps/api/js"></script>   

    <script>
        function init_map() {
            var var_location = new google.maps.LatLng(40.725118, -73.997699);

            var var_mapoptions = {
                center: var_location,
                zoom: 14
            };

            var var_marker = new google.maps.Marker({
                position: var_location,
                map: var_map,
                title: "New York"
            });

            var var_map = new google.maps.Map(document.getElementById("map-container"),
                var_mapoptions);

                var_marker.setMap(var_map);

            }

            google.maps.event.addDomListener(window, 'load', init_map);
    </script>
    
</body>

</html>