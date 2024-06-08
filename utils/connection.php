<?php
$servername = "localhost";
$username = "johncastle";
$password = "1234";
$dbname = "eshop";
$port = "3306";

// Create connection
$conn = new mysqli($servername.':'.$port, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
?>