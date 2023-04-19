<?php 



$hostname = "localhost";
$username = "root";
$password = "";
$database="order";


$connection = mysqli_connect($hostname, $username, $password,$database);
if (!$connection) {
    echo "fail";
} 
    
?>