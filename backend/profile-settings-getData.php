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


$Id=$_SESSION['Id'];//Customer or Service Provider Id
$UserId;


if($_SESSION["UserTypeId"]=="1")
{
    $sql = "Select UserId from customers where CustomerId='$Id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $UserId=$row["UserId"];

    $sql2="Select * from users where UserId='$UserId'";
    $result2 = $conn->query($sql2);
    $row = $result2->fetch_assoc();

    $myObj = new \stdClass();
    $myObj->email=$row['email'];
    $myObj->name=$row['name'];
    $myObj->gender=$row['gender'];
    $myObj->dob=$row['dob'];
    $myObj->mobileNumber=$row['mobileNumber'];
    $myObj->country=$row['country'];
    $myObj->city=$row['city'];
    $myObj->postalCode=$row['postalCode'];

    $myJSON = json_encode($myObj);
    echo $myJSON;
}
else if($_SESSION["UserTypeId"]=="2")
{
    $sql = "Select * from serviceproviders where ServiceProviderId='$Id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $UserId=$row["UserId"];

    $myObj = new \stdClass();
    $myObj->aboutMe=$row['aboutMe'];
    $myObj->category=$row['CategoryId'];


    $sql2="Select * from users where UserId='$UserId'";
    $result2 = $conn->query($sql2);
    $row = $result2->fetch_assoc();

    
    $myObj->email=$row['email'];
    $myObj->name=$row['name'];
    $myObj->gender=$row['gender'];
    $myObj->dob=$row['dob'];
    $myObj->mobileNumber=$row['mobileNumber'];
    $myObj->country=$row['country'];
    $myObj->city=$row['city'];
    $myObj->postalCode=$row['postalCode'];

    $myJSON = json_encode($myObj);
    echo $myJSON;
}





$conn->close();

?>