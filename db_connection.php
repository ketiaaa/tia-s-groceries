<?php
$servername = "grocery.cf24q4kuyzi3.us-east-1.rds.amazonaws.com"; 
$username = "tia";
$password = "Ketia789";
$database = "grocery";

$connection = mysqli_connect($servername, $username, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
