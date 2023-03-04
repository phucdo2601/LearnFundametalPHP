<?php
require('libs/Smarty.class.php');

$smarty = new Smarty;
// include('conifg.php');

$dbhost='localhost:3306';
$dbroot='root';
$dbpass='12345678';
$dbname='leanrn_fun_php_smarty_b01';

$conn = mysqli_connect($dbhost,$dbroot,$dbpass, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$selectUser = "SELECT * FROM user where id = '".$_GET["id"]."'";
$result = $conn->query($selectUser);
// $data[]= mysqli_fetch_array($result);

$data = $res = mysqli_fetch_array($result);

if (isset($_POST['submit'])) {
    # code...
    $sql = "UPDATE user SET name = '".$_POST['name']."', city = '".$_POST['city']."' where id = '".$_POST['id']."'";
    if ($conn->query($sql) === TRUE) {
        $conn->close();
        header("location:view.php");
        echo "Update successfully";
        
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
}



$smarty->assign('users', $data);
$smarty->display('edit.tpl');