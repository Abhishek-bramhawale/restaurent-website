<?php
session_start();
include 'includes/db_connect.php';  

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = password_hash(mysqli_real_escape_string($conn, $_POST['password']), PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header("Location: login.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<style>
    body {
    font-family: Arial, sans-serif;
    background-color: grey;
    color: white;
    text-align: center;
    margin-top: 50px;
}

h2 {
    color: orange;
}

form {
    display: inline-block;
    padding: 20px;
    background-color: #222;
    border: 1px solid orange;
    border-radius: 8px;
}

input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    margin: 8px 0;
    border: 1px solid orange;
    border-radius: 4px;
    background-color: black;
    color: white;
}

input[type="text"]::placeholder,
input[type="password"]::placeholder {
    color: #ccc;
}

button[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: orange;
    border: none;
    color: black;
    font-weight: bold;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
}

button[type="submit"]:hover {
    background-color: #ff6600;
}

p {
    margin-top: 15px;
}

p a {
    color: orange;
    text-decoration: none;
}

p a:hover {
    text-decoration: underline;
}

</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
</head>
<body>
    <h2>Signup</h2>
    <form method="post">
        <input type="text" name="username" placeholder="Enter Username" required><br><br>
        <input type="password" name="password" placeholder="Enter Password" required><br><br>
        <button type="submit">Sign Up</button>
    </form>
    <p>Already have an account? <a href="login.php">Login</a></p>
</body>
</html>
