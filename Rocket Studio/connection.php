<?php
$servername = "localhost";
$username = "stiliyan";
$password = "1234";
$dbname = "rocketStudio";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->close();
