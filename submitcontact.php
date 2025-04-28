

<?php
    $server = "localhost";
    $username ="root";
    $password="";
    $dbname="restaminidb";

    $conn= mysqli_connect($server,$username,$password,$dbname);
    if(!$conn)
    {
        echo "connection failed";
    }
    

    $name= $_POST["name"];
    $mobile= $_POST["mobile"];
    $email= $_POST["email"];
    $message= $_POST["message"];

    $sql= "INSERT INTO restaminicontact (name, email, phone, message) VALUES ('$name', '$email', '$mobile', '$message')";

    $result= mysqli_query($conn,$sql);
    if($result){
        echo "data submitted";

    }
    else {
        echo "data not submitted";
    }
?>