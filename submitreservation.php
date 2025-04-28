<?php
// Database connection details
$server = "localhost";
$username = "root";
$password = "";
$dbname = "restaminidb";

// Establish the connection
$conn = mysqli_connect($server, $username, $password, $dbname);

// Check if connection is successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve form data
$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$date = mysqli_real_escape_string($conn, $_POST['date']);
$partySize = (int)$_POST['partySize'];

// Validate form data
if (empty($name) || empty($email) || empty($phone) || empty($date) || $partySize <= 0) {
    die("Invalid input. Please fill all fields correctly.");
}

// Prepare the SQL query
$sql = "INSERT INTO reservation (name, email, phone, event_date, party_size) 
        VALUES ('$name', '$email', '$phone', '$date', '$partySize')";

// Execute the query
if (mysqli_query($conn, $sql)) {
    echo "Reservation submitted successfully.";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the connection
mysqli_close($conn);
?>
