<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hci";

$link = mysqli_connect($servername, $username, $password, $dbname);

$conn = new mysqli($servername, $username, $password, $dbname);
if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>