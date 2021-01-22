<?php
session_start();

include_once 'connect.php';


if(isset($_POST["upd"])) {
	$id=$_POST["id"];
$package=$_POST["package"];
$price=$_POST["price"];
$username=$_POST["username"];
$month=$_POST["month"];
$bdate=$_POST["bdate"];

$query="UPDATE booking SET package='$package',price='$price',username='$username',month='$month',bdate='$bdate'
 WHERE bookingID='$id'";
	$result=mysqli_query($conn,$query);
	header("Location: viewclientbookings.php");	
}
if(isset($_POST["lm"])) {

$id=$_POST["id"];
$query="delete from booking  WHERE bookingID='$id'";
	$result=mysqli_query($conn,$query);
	header("Location: viewclientbookings.php");	
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

    <main class="mt-5">

        <!--Main container-->
        <div class="container">
<br/><br/>
            <!--Grid row-->
            <div class="row">

							
							
							
					<table class="table">
  <thead>
    <tr>

     <th>Date</th>
			<th>Booking Price </th>
				<th>Month</th>
				
				<th>Season </th>
    </tr>
  </thead>
  <tbody>
   <?php
$query="select * from booking ORDER BY bdate";
$result=mysqli_query($conn,$query);

while($row=mysqli_fetch_array($result))
{
?>
   <tr>
<td><?php echo $row[5]; ?></td>
<td><?php echo $row[7]; ?></td>
<td><?php echo $row[2]; ?> $</td>
<td><?php echo $row[6]; ?></td>
<td><?php echo $row[1]; ?></td>
<td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#message<?php echo $row[0];?>">Details</button></td>
<div id="message<?php echo $row[0];?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Booking Details</h4>
      </div>
                    <form class="form-signin" method="post" enctype="multipart/form-data">  
            
  
  <div class="col-md-6">
  <input type="hidden" id="id" name="id" value="<?php echo $row[0]; ?>" />
  <b>Client Name </b>
                <input type="text" id="username" name="username" value="<?php echo $row[5]; ?>" class="form-control" placeholder="Cabin Name" >
<b>Date Booked </b>
 <input type="text" id="bdate" name="bdate" value="<?php echo $row['bdate']; ?>" class="form-control" placeholder="Cabin Name" >
<b>	Month </b>
                <input type="text" id="month" name="month" value="<?php echo $row['month']; ?>" class="form-control" placeholder="Cabin Name" >
	  </div>		
      <div style="padding:10px;" >
              
 <b>Package </b>
                <input type="text" id="package" name="package" value="<?php echo $row['package']; ?>" class="form-control" placeholder="Cabin Name" >
<b>price </b>
                <input type="text" id="price" name="price" value="<?php echo $row['price']; ?>" class="form-control" placeholder="Cabin Name" >

	       
      <div class="modal-footer">
	 <button  class="btn btn-success btn-lg" id="upd" name="upd" type="submit"> <span class="glyphicon glyphicon-edit"></span> Update </button>
	<button  class="btn btn-success btn-lg" id="lm" name="lm" type="submit"> <span class="glyphicon glyphicon-trash"></span> Delete </button>
	 
        <button type="button" class="btn btn-success btn-lg" data-dismiss="modal">Close</button>
      </div>		
		</form><!-- /form -->
</div>	  
	<br/>
			    
	
	
	  
     
    </div>

  </div>
</div>
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
$(document).ready(function(){
    $('#myModal').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
        $.ajax({
            type : 'post',
            url : 'login.php', //Here you will fetch records 
            data :  'rowid='+ rowid, //Pass $id
            success : function(data){
            $('.fetched-data').html(data);//Show fetched data from database
            }
        });
     });
});

		$(document).ready(function() {
    $('.mdb-select').material_select();
  });
  </script>
  	</body>

</html>