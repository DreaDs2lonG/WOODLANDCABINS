<?php
	session_start();
$_SESSION["amount"];
$_SESSION["currency"];
include_once 'connect.php';
$QueryStatement="create table if not exists users(
userID int auto_increment primary key,

email varchar(40),
firstName varchar(40),
lastName varchar (40),username varchar(50),
password varchar(80),
status int(11),
gender varchar(10))";
$exe=mysqli_query($conn,$QueryStatement);

$QueryStatement="create table if not exists cabins(
cabinid int auto_increment primary key,
cabinname varchar(30),
type varchar(30),
description text,
photo varchar(30))";
$exe=mysqli_query($conn,$QueryStatement);

$QueryStatement="create table if not exists forumn(
forumnid int auto_increment primary key,
forumnName varchar(50),
description text,
published_Date varchar(25))";
$exe=mysqli_query($conn,$QueryStatement);


$QueryStatement="CREATE TABLE IF NOT EXISTS booking (
  bookingID int(11) NOT NULL AUTO_INCREMENT,
  package varchar(25) DEFAULT NULL,
  price decimal(8,2) DEFAULT NULL,
  currency varchar(30) DEFAULT NULL,
  userid int(11) DEFAULT NULL,
  username varchar(30) DEFAULT NULL,
  month varchar(20) DEFAULT NULL,
  bdate date DEFAULT NULL,
  PRIMARY KEY (bookingID)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ";

$exe=mysqli_query($conn,$QueryStatement);


/*$sql="select * from adminTable ";
$QueryStatementsResult=mysqli_query($conn,$sql);
$num=mysqli_num_rows($QueryStatementsResult);
if($num<1)
{
$password=md5("admin");
$QueryStatement="insert into adminTable(id,username,password) VALUES (null,'admin','$password')";
$exe=mysqli_query($conn,$QueryStatement);

}
*/

$QueryStatement="CREATE TABLE IF NOT EXISTS cabinprices (
  priceid int(11) NOT NULL AUTO_INCREMENT,
  type varchar(20) NOT NULL,
  season varchar(20) NOT NULL,
  price double NOT NULL,
  PRIMARY KEY (priceid)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ";
$exe=mysqli_query($conn,$QueryStatement);
header("location:landingpage.php");
?>
