<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "authentication";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("connection failled". $conn->connect_error);
}

echo"connected "; //showing the connection.


?>