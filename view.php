<?php
require('libs/Smarty.class.php');
$smarty = new Smarty;

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
  $sql = "SELECT * FROM user";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        # code...
        $data[] = $row;
    }
  }

  if (isset($_GET['del'])) {
    # code...
    $sql = "DELETE FROM user WHERE id = '".$_GET['del']."'";
    if ($conn->query($sql) === TRUE) {
        $conn->close();
        header("location:view.php");
        echo "Delete record created successfully";
        
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
  }

  $smarty->assign('user', $data);
$smarty->display('view.tpl');

