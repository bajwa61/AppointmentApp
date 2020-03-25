<?php
   session_start();
?>


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


$Id=$_SESSION['Id'];//Customer Id
$UserId;
//write your queries here

$sql = "Select UserId from customers where CustomerId='$Id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$UserId=$row["UserId"];


$sql2="Select name,dob,country,city from users where UserId='$UserId'";
$result2 = $conn->query($sql2);
$row = $result2->fetch_assoc();

$myObj = new \stdClass();
$myObj->name=$row['name'];
$myObj->dob=$row['dob'];
$myObj->country=$row['country'];
$myObj->city=$row['city'];

$myJSON = json_encode($myObj);
echo $myJSON;


$conn->close();

?>