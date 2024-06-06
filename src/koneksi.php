<?php
$servername = "localhost";  
$username = "root";         
$password = "";             
$dbname = "uapweb";         


$conn = new mysqli($servername, $username, $password, $dbname);
//ha

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>