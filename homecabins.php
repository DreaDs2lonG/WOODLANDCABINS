<?php


include_once 'connect.php';

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

    <!--Main layout-->
    <main class="mt-5">

        <!--Main container-->
        <div class="container">
<br/><br/>
           <div class="row">
<?php
$query="select * from cabins ";
$result=mysqli_query($conn,$query);

while($row=mysqli_fetch_array($result))
{
?>
           
            <div class="col-md-6">

                <!--Card-->
                <div class="card testimonial-card" style="max-width: 22rem;">

                    <!--Bacground color-->
                    <div class="card-up aqua-gradient">
                    </div>

                    <!--Avatar-->
                    <div class="avatar"><img src="uploads/<?php echo $row['photo']; ?>" class="rounded-circle img-responsive">
                    </div>

                    <div class="card-body">
                        <!--Name-->
                        <h4 class="card-title"><?php echo $row['cabinname']; ?>-<?php echo $row['type']; ?></h4>
                        <hr>
                        <!--Quotation-->
                        <p><i class="fa fa-quote-left"></i> <?php echo $row['description']; ?></p>
                 <p>
				 <a href="details.php?q=<?php echo $row[0]; ?>" class="btn btn-default btn-success">Book</a>
				 </p>
				 </div>

                </div>
                <!--/.Card-->
<br/>
            </div>
			
		<?php
}
?>		

        </div>

          

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
</body>

</html>