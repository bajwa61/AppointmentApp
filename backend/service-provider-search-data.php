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

$Id= $_SESSION["ClickServiceProviderId"];
$Id=1;

//write your queries here

$sql="SELECT name,country,city FROM users INNER JOIN serviceproviders where users.Userid=serviceproviders.userId";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$myObj = new \stdClass();
$myObj->name=$row['name'];
$myObj->country=$row['country'];
$myObj->city=$row['city'];

$myJSON = json_encode($myObj);
echo $myJSON;


$conn->close();

?>