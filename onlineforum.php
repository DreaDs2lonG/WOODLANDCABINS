<?php
session_start();

include_once 'connect.php';


// Check if image file is a actual image or fake image
if(isset($_POST["log"])) {
	
	
		$description = mysqli_real_escape_string($conn,$_POST['comment']);
	
	$forumnName =$_SESSION['user'];
	
	$sdate=date("Y/m/d");
	$query="INSERT INTO forumn( username, message, sdate) VALUES ('$forumnName', '$description', '$sdate')";
	
   $result=mysqli_query($conn,$query);
    if($result)
	{
	echo "<h1>its ok</h1>"	;
	}
else
{
	echo mysqli_error($conn)	;
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="css/mdb.css">

    <!-- Your custom styles (optional) -->
   
    <style>
 .basic-textarea textarea {
    height: auto;
}
    .A a:hover{background-color:#f4041c;color:white;}
  	.number {
  background-color: purple;
  color: #fff;
  height: 30px;
  width: 30px;
  display: inline-block;
  font-size: 0.8em;
  margin-right: 4px;
  line-height: 30px;
  text-align: center;
  text-shadow: 0 1px 0 rgba(255,255,255,0.2);
  border-radius: 100%;

	</style>
   
</head>

<body class="fixed-sn white-skin">

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
    <main>
        <div class="container-fluid">

            <!--Grid row-->
            <div class="row">

                <!--Grid column-->
               
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-9 col-md-6 mb-r">
<form method="post">
<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-bold">Post Message</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                	<div class="col-md-6">
 			
  
              <div class="form-group basic-textarea">
    <label for="exampleFormControlTextarea2">Add Comment</label>
    <textarea class="form-control" id="exampleFormControlTextarea2" id="comment" name="comment" rows="3"></textarea>
</div>


               
			<br/>
			     <div class="text-center">
                            <button id="log" name="log" class="btn btn-rounded btn-info waves-effect">Submit</button>
  <button type="button" class="btn btn-rounded btn-unique waves-effect" data-dismiss="modal">Close</button>
                          
                            
                        </div>    
	
	</table>
  </div>

            </div>
           
        </div>
    </div>
</div>
           
</form>		   <!--Card-->
                    <div class="card">
									
                        <!--Card content-->
                        <div class="card-body">
						<div class="text-left">
    <a href="" class="btn btn-success btn-rounded mb-4" data-toggle="modal" data-target="#modalLoginForm">Post A message</a>
</div>
                  
	                            <div class="card-content table-responsive">
	                              	<table width="60%">
		
<?php
$query="select * from forumn";
$result=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($result))   
{
?>
<tr>
<td>

  <div class="col-lg-9 mr-auto col-xl-8">
            <!--Excerpt-->
           
           <b ><strong><?php  echo $row['message'] ;?></strong></b>
               <p>by <a><strong><?php  echo $row['username'] ;?></strong></a>, <?php  echo $row['sdate'] ;?></p>
            
        </div>

</td>


</tr>


<?php	
}
?>
</table>

	                            </div>
								
								
	                        </div>
						</div>
               

			   </div>
              
              

            </div>
            <!--Grid row-->

            <hr class="my-5">

           

        </div>
    </main>
    <!--Main layout-->

    <!--Footer-->
    <footer class="page-footer center-on-small-only pt-0 mt-5">

        <!--Copyright-->
        <div class="footer-copyright">
            <div class="container-fluid">
                &copy; 2017 Copyright: <a href="https://www.MDBootstrap.com"> Halai Trading Company (LLC) </a>

            </div>
        </div>
        <!--/.Copyright-->

    </footer>
    <!--/.Footer-->



    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!--Custom scripts-->
    <script>
        // SideNav Initialization
        $(".button-collapse").sideNav();

        var container = document.getElementById('slide-out');
        Ps.initialize(container, {
            wheelSpeed: 2,
            wheelPropagation: true,
            minScrollbarLength: 20
        });

    </script>

    <!--Google Maps-->
    <script src="https://maps.google.com/maps/api/js"></script>
    <!--Custom scripts-->
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

            var var_map = new google.maps.Map(document.getElementById("map-container-2"),
                var_mapoptions);

            var_marker.setMap(var_map);

        }

        google.maps.event.addDomListener(window, 'load', init_map);
    </script>
</body>

</html>