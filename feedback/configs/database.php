<?php
$servername = "127.0.0.1:3307";
$username = "phucdo";
$password = "12345678";
$databaseName = "learn_php_feedback_b01";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $databaseName);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>