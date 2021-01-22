<?php
$username="root";
$password="";
$host="localhost";
$database="dbwoodlands";
$conn=mysqli_connect($host,$username,$password);

//create a database
$query="create database if not exists dbwoodlands";
$exe=mysqli_query($conn,$query);

//select the database
mysqli_select_db($conn,$database);

?>