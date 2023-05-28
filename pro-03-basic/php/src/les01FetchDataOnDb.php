<?php

$host = 'db';
$user = "MYSQL_USER";
$pass = "MYSQL_PASSWORD";
$mydatabase = "learnPhpFunOnMacb01";

//connection database string
$conn = new mysqli($host, $user, $pass, $mydatabase);

//select data
$list_data = 'SELECT * FROM users';
if ($res = $conn->query($list_data)){
    while ($data = $res->fetch_object()) {
        $users[] = $data;
    }

    foreach ($users as $user) {
        echo '<br />';
        echo $user->username . " " .$user->password; 
        echo '<br />';
    }
}