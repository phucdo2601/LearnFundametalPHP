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

if (isset($_POST['submit'])) {
    # code...
    $sql = "INSERT INTO user(name, city)
    VALUES ('".$_POST['name']."', '".$_POST['city']."')";
    if ($conn->query($sql) === TRUE) {
        $conn->close();
        header("location:view.php");
        echo "New record created successfully";
        
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
}

// $smarty->assign('news', 'test');
$smarty->display('insert.tpl');
?>