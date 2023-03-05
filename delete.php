<?php
    if(isset($_GET["id"])) {
        $id = $_GET["id"];
        $dbhost='localhost:3306';
        $dbroot='root';
        $dbpass='12345678';
        $dbname='learn_php_fun_crud_b01';

        //Create database connection
        $connection = new mysqli($dbhost, $dbroot, $dbpass, $dbname);
        if($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }

        $sql = "DELETE FROM clients where id='$id'";
        $result = $connection->query($sql);
    }

    header("location: /learn_php_crud_mysql_b01/index.php");
        exit;
        ?>
