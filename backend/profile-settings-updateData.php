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

$Id=$_SESSION["Id"];//User Id


$name=$_POST['name'];

$rawdate = htmlentities($_POST['dob']);
$dob = date('Y-m-d', strtotime($rawdate));

$gender=$_POST['gender'];
$mobileNumber=$_POST['mobileNumber'];
$country=$_POST['country'];
$city=$_POST['city'];
$postalCode=$_POST['postalCode'];



//write your queries here

$sql = "UPDATE users SET name='$name',dob='$dob',gender='$gender',mobileNumber='$mobileNumber',country='$country',city='$city',postalCode='$postalCode' WHERE UserId='$Id' ";
$result = $conn->query($sql);

if ($result === TRUE) {
    echo true;
} 
else
{
    echo false;
}


$conn->close();

?>