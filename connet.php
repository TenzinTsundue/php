<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname ="knowledgemangement";

$conn = new mysqli($servername, $username, $password, $dbname) or die(mysqli_error($mysqli));
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>