<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "demo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name=$_POST['name1'];
$email=$_POST['email'];
$password=$_POST['password'];
$accountType=$_POST['accountType'];



//write your queries here

$sql = "INSERT into users (name,email,password,UserTypeId) VALUES ('$name','$email','$password','$accountType')";
$result = $conn->query($sql);

if ($result === TRUE) {
    $last_id = $conn->insert_id;
    if($accountType=="1")
    {
        $sql2 = "INSERT into customers (UserId) VALUES ('$last_id')";
        $result2 = $conn->query($sql2);
        if ($result2 === TRUE) {
           echo "New record created successfully";
        }
        else{
          echo "Error: " . $sql2 . "<br>" . $conn->error;
        }
    }
    else if($accountType=="2")
    {
        $sql2 = "INSERT into serviceproviders (UserId) VALUES ('$last_id')";
        $result2 = $conn->query($sql2);
        if ($result2 === TRUE) {
           echo "New record created successfully";
        }
        else{
          echo "Error: " . $sql2 . "<br>" . $conn->error;
        }
    }
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>