<?php
$servername = "localhost";
$username = "root";
$password = "";
$BD = "175-noel-jasmin-bdfilms";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $BD);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>