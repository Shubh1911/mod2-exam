<?php
$servername="localhost";
$username="shubham";
$password="Shubham@1911";
$database = "parkinglot";

/* Create database  connect with correct username and password*/
$connect=new mysqli($servername,$username,$password,$database);
/* Check the connect is created properly or not */
if(!$connect)
    echo "connect error:" .$connect->connect_error;
else
    echo "connect is created successfully"; 
    echo"<br>";
?>