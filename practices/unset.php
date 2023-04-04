<?php

$dbhost = 'localhost:3306';
$dbroot = 'root';
$dbpass = '12345678';
$dbname = 'learn_php_feedback_b01';

$conn = mysqli_connect($dbhost, $dbroot, $dbpass, $dbname);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
var_dump("Connected successfully");
echo '<br/>';
$sql = "SELECT * FROM feedback";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"] . " - Name: " . $row["name"] . "- Email: " . $row["email"] . " - Body: " . $row["body"] . " - Date: " . $row["date"] . "<br>";

        unset($row["name"]);
        echo "id: " . $row["id"]  . "- Email: " . $row["email"] . " - Body: " . $row["body"] . " - Date: " . $row["date"] . "<br>";
    }
    echo "<br/>";
} else {
    echo "0 results";
}
