<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login1";  // Use 'login' as the database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
