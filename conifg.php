<?php
$dbhost='localhost:3306';
$dbroot='root';
$dbpass='12345678';
$dbname='leanrn_fun_php_smarty_b01';

$conn = mysqli_connect($dbhost,$dbroot,$dbpass);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

?>
