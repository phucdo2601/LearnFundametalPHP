<?php
    session_start();
    $_SESSION['page'] =$_POST['page'];
    $_SESSION['records'] =$_POST['records'];

    // var_dump($_SESSION['page']);
    // var_dump($_SESSION['records']);
    // die();

    header("location: ../../views/detail.php");

?>