<?php

//start session
session_start();

$_SESSION['firstName'] = "Phuc";
$_SESSION['lastName'] = "Do Ngoc";
echo 'Hi, ' . $_SESSION["firstName"] . ' ' . $_SESSION["lastName"];

// Removing session data
if (isset($_SESSION["lastName"]) && $_SESSION["firstName"]) {
    unset($_SESSION["firstName"]);
    unset($_SESSION["lastName"]);
}

// Destroying session
session_destroy();
