<?php
$hostName = "localhost";
$dbUser = "root";
$dbPassword="";
$dbName = "bookingcalendar";

$conn = mysqli_connect($hostName,  $dbUser, $dbPassword, $dbName);
if(!$conn){
    die("something went wrong;");
}
?>