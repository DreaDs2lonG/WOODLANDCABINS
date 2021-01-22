
<?php
session_start();
include("connect.php");

$q = $_GET['q'];
$month = $_GET['x'];
$type = $_GET['type'];
$ss="00";
function getprice($month)
{

	
	if($month=="January")
	{
	return "Winter";
		
	}elseif($month=="February")
	{
		return "Winter";
	}elseif($month=="March")
	{
		return "Spring";
	}elseif($month=="April")
	{
		return"Spring";
	}elseif($month=="May")
	{
		return "Spring";
	}elseif($month=="June")
	{
		return "Summer";
	}elseif($month=="July")
	{
		return "Summer";
	}elseif($month=="August")
	{
		return "Summer";
	}elseif($month=="September")
	{
		return "Autumn";
	}elseif($month=="October")
	{
		return "Autumn";
	}elseif($month=="November")
	{
		return "Autumn";
	}
	elseif($month=="December")
	{
		return "Winter";
	}	

}
function convertCurrency($amount, $from, $to){
	$data = file_get_contents("https://finance.google.com/finance/converter?a=$amount&from=$from&to=$to");
	preg_match("/<span class=bld>(.*)<\/span>/",$data, $converted);
	$converted = preg_replace("/[^0-9.]/", "", $converted[1]);	
	return number_format(round($converted, 3),2);
}
$ss=getprice($month);

$sql="SELECT * FROM cabinprices WHERE type = '$type' and season='$ss'";
$result = mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
$curr=convertCurrency($row[3], "USD",$q) . "  "  .  $q ;
echo "<p> Price " . $curr .   "</p>";
$_SESSION["amount"]=$row[3];
$_SESSION["currency"]= $curr  ;
mysqli_close($conn);
?>
