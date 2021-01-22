<?php

session_start();
include_once 'connect.php';

$q=$_GET["q"];
$gamount=0;
if(isset($_POST['lg']))
{
	$package = mysqli_real_escape_string($conn,$_POST['package']);
	$price = $_SESSION["amount"];
	$currency = $_SESSION["currency"];
	$userid =  $_SESSION['userid'];
	$username =$_SESSION['user'];
	$month=mysqli_real_escape_string($conn,$_POST['month']);
	$bdate=date("Y/m/d");
	

	
	if(mysqli_query($conn,"INSERT INTO booking(package, price, currency, userid, username,month,bdate) VALUES('$package', '$price',  '$currency', '$userid', '$username','$month','$bdate')"))
	{
		
        header("location:homecabins.php");
	}
	else
	{
		
		?>
        <script>alert('error while registering you...');</script>
        <?php
}}
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
                    <ul class="navbar-nav mr-auto smooth-scroll">
                        
                       
                        <li class="nav-item">
                            <a class="nav-link" href="home.php" >Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  >Manage cabins</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" >Prices</a>
                        </li>
						<li class="nav-item">
                            <a class="nav-link" >Manage Bookings</a>
                        </li>
						<li class="nav-item">
                            <a class="nav-link" >Forum</a>
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
            <!--Grid row-->  <form method="post">
            <div class="row">

                                   
									 
      <?php
	$res=mysqli_query($conn,"SELECT * FROM cabins where cabinid='$q'");  
	while($row=mysqli_fetch_array($res))
	{
	  ?>
	  <div class="col-md-6">
	  
   
  <img src="uploads/<?php echo  $row['photo']; ?>" width="400" alt="Image" >
</div> 
 <div class="col-md-6">
    <p>Name :<b><?php echo  $row['cabinname']; ?></b></p> 
	<p >Type :<b><?php echo  $row['type']; ?></b></p>

<input type="hidden" value="<?php echo  $row['type']; ?>" id="type" />



 
<p>
<b>Select Month</b>
<select id="month" name="month" class="mdb-select colorful-select dropdown-info">
	
	<option value="January">January<option>
	<option value="February">February<option>
	<option value="March">March<option>
	<option value="April">April<option>
	<option value="May">May<option>
	<option value="June">June<option>
	<option value="July">July<option>
	<option value="August">August<option>
	<option value="September">September<option>
	<option value="October">October<option>
	<option value="November">November<option>
	<option value="December">December<option>
<select>
</p> 
<p>
<b>Book Period</b>
<select id="package" name="package" class="mdb-select colorful-select dropdown-info">
	<option value="Friday to Monday">Friday to Monday<option>
	<option value="Monday to Frida">Monday to Frida<option>
	
<select>
</p>

<p>
<b>Select Country</b>

<select class="mdb-select colorful-select dropdown-info" id="base_list" onchange="showUser(this.value)">
	   <option value="PHP" selected="1">Philippine Peso</option>
	   <option value="USD">US Dollar</option><option value="AFA">Afghan Afghani (1927–2002)</option><option value="ALL">Albanian Lek</option><option value="DZD">Algerian Dinar</option><option value="AOA">Angolan Kwanza</option><option value="ARS">Argentine Peso</option><option value="AMD">Armenian Dram</option><option value="AWG">Aruban Florin</option><option value="AUD">Australian Dollar</option><option value="AZN">Azerbaijani Manat</option><option value="BSD">Bahamian Dollar</option><option value="BHD">Bahraini Dinar</option><option value="BDT">Bangladeshi Taka</option><option value="BBD">Barbadian Dollar</option><option value="BYR">Belarusian Ruble (2000–2016)</option><option value="BEF">Belgian Franc</option><option value="BZD">Belize Dollar</option><option value="BMD">Bermudan Dollar</option><option value="BTN">Bhutanese Ngultrum</option><option value="BTC">Bitcoin</option><option value="BOB">Bolivian Boliviano</option><option value="BAM">Bosnia-Herzegovina Convertible Mark</option><option value="BWP">Botswanan Pula</option><option value="BRL">Brazilian Real</option><option value="GBP">British Pound</option><option value="BND">Brunei Dollar</option><option value="BGN">Bulgarian Lev</option><option value="BIF">Burundian Franc</option><option value="KHR">Cambodian Riel</option><option value="CAD">Canadian Dollar</option><option value="CVE">Cape Verdean Escudo</option><option value="KYD">Cayman Islands Dollar</option><option value="XAF">Central African CFA Franc</option><option value="XPF">CFP Franc</option><option value="CLP">Chilean Peso</option><option value="CNY">Chinese Yuan</option><option value="COP">Colombian Peso</option><option value="KMF">Comorian Franc</option><option value="CDF">Congolese Franc</option><option value="CRC">Costa Rican Colón</option><option value="HRK">Croatian Kuna</option><option value="CUC">Cuban Convertible Peso</option><option value="CZK">Czech Koruna</option><option value="DKK">Danish Krone</option><option value="DJF">Djiboutian Franc</option><option value="DOP">Dominican Peso</option><option value="XCD">East Caribbean Dollar</option><option value="EGP">Egyptian Pound</option><option value="ERN">Eritrean Nakfa</option><option value="EEK">Estonian Kroon</option><option value="ETB">Ethiopian Birr</option><option value="EUR">Euro</option><option value="FKP">Falkland Islands Pound</option><option value="FJD">Fijian Dollar</option><option value="GMD">Gambian Dalasi</option><option value="GEL">Georgian Lari</option><option value="DEM">German Mark</option><option value="GHS">Ghanaian Cedi</option><option value="GIP">Gibraltar Pound</option><option value="GRD">Greek Drachma</option><option value="GTQ">Guatemalan Quetzal</option><option value="GNF">Guinean Franc</option><option value="GYD">Guyanaese Dollar</option><option value="HTG">Haitian Gourde</option><option value="HNL">Honduran Lempira</option><option value="HKD">Hong Kong Dollar</option><option value="HUF">Hungarian Forint</option><option value="ISK">Icelandic Króna</option><option value="INR">Indian Rupee</option><option value="IDR">Indonesian Rupiah</option><option value="IRR">Iranian Rial</option><option value="IQD">Iraqi Dinar</option><option value="ILS">Israeli New Shekel</option><option value="ITL">Italian Lira</option><option value="JMD">Jamaican Dollar</option><option value="JPY">Japanese Yen</option><option value="JOD">Jordanian Dinar</option><option value="KZT">Kazakhstani Tenge</option><option value="KES">Kenyan Shilling</option><option value="KWD">Kuwaiti Dinar</option><option value="KGS">Kyrgystani Som</option><option value="LAK">Laotian Kip</option><option value="LVL">Latvian Lats</option><option value="LBP">Lebanese Pound</option><option value="LSL">Lesotho Loti</option><option value="LRD">Liberian Dollar</option><option value="LYD">Libyan Dinar</option><option value="LTL">Lithuanian Litas</option><option value="MOP">Macanese Pataca</option><option value="MKD">Macedonian Denar</option><option value="MGA">Malagasy Ariary</option><option value="MWK">Malawian Kwacha</option><option value="MYR">Malaysian Ringgit</option><option value="MVR">Maldivian Rufiyaa</option><option value="MRO">Mauritanian Ouguiya</option><option value="MUR">Mauritian Rupee</option><option value="MXN">Mexican Peso</option><option value="MDL">Moldovan Leu</option><option value="MNT">Mongolian Tugrik</option><option value="MAD">Moroccan Dirham</option><option value="MZM">Mozambican Metical (1980–2006)</option><option value="MMK">Myanmar Kyat</option><option value="NAD">Namibian Dollar</option><option value="NPR">Nepalese Rupee</option><option value="ANG">Netherlands Antillean Guilder</option><option value="TWD">New Taiwan Dollar</option><option value="NZD">New Zealand Dollar</option><option value="NIO">Nicaraguan Córdoba</option><option value="NGN">Nigerian Naira</option><option value="KPW">North Korean Won</option><option value="NOK">Norwegian Krone</option><option value="OMR">Omani Rial</option><option value="PKR">Pakistani Rupee</option><option value="PAB">Panamanian Balboa</option><option value="PGK">Papua New Guinean Kina</option><option value="PYG">Paraguayan Guarani</option><option value="PEN">Peruvian Sol</option><option value="PLN">Polish Zloty</option><option value="QAR">Qatari Rial</option><option value="RON">Romanian Leu</option><option value="RUB">Russian Ruble</option><option value="RWF">Rwandan Franc</option><option value="SVC">Salvadoran Colón</option><option value="WST">Samoan Tala</option><option value="SAR">Saudi Riyal</option><option value="RSD">Serbian Dinar</option><option value="SCR">Seychellois Rupee</option><option value="SLL">Sierra Leonean Leone</option><option value="SGD">Singapore Dollar</option><option value="SKK">Slovak Koruna</option><option value="SBD">Solomon Islands Dollar</option><option value="SOS">Somali Shilling</option><option value="ZAR">South African Rand</option><option value="KRW">South Korean Won</option><option value="XDR">Special Drawing Rights</option><option value="LKR">Sri Lankan Rupee</option><option value="SHP">St. Helena Pound</option><option value="SDG">Sudanese Pound</option><option value="SRD">Surinamese Dollar</option><option value="SZL">Swazi Lilangeni</option><option value="SEK">Swedish Krona</option><option value="CHF">Swiss Franc</option><option value="SYP">Syrian Pound</option><option value="STD">São Tomé &amp; Príncipe Dobra</option><option value="TJS">Tajikistani Somoni</option><option value="TZS">Tanzanian Shilling</option><option value="THB">Thai Baht</option><option value="TOP">Tongan Paʻanga</option><option value="TTD">Trinidad &amp; Tobago Dollar</option><option value="TND">Tunisian Dinar</option><option value="TRY">Turkish Lira</option><option value="TMT">Turkmenistani Manat</option><option value="UGX">Ugandan Shilling</option><option value="UAH">Ukrainian Hryvnia</option><option value="AED">United Arab Emirates Dirham</option><option value="UYU">Uruguayan Peso</option><option value="UZS">Uzbekistani Som</option><option value="VUV">Vanuatu Vatu</option><option value="VEF">Venezuelan Bolívar</option><option value="VND">Vietnamese Dong</option><option value="XOF">West African CFA Franc</option><option value="YER">Yemeni Rial</option><option value="ZMK">Zambian Kwacha (1968–2012)</option>
	   </select>
</p>
<p> <span id="demo"></span></p> 

<p><button type="submit"  name="lg" class="btn btn-success">Book</button></p>
 </div>

<?php
	}

?>
 
       </div>

            </form> 
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