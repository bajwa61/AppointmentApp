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


$Id=$_SESSION['Id'];
$password=$_POST['password'];
$UserId;

if($_SESSION["UserTypeId"]=="1")
{  
    $sql = "Select UserId from customers where CustomerId='$Id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $UserId=$row["UserId"];


    $sql="Update users set password='$password' where UserId='$UserId'";
    $result = $conn->query($sql);

    if ($result === TRUE) {
        echo true;
    } 
    else
    {
        echo false;
    }
}
else if ($_SESSION["UserTypeId"]=="2")
{
    
    $sql = "Select UserId from serviceproviders where ServiceProviderId='$Id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $UserId=$row["UserId"];


    $sql="Update users set password='$password' where UserId='$UserId'";
    $result = $conn->query($sql);

    if ($result === TRUE) {
        echo true;
    } 
    else
    {
        echo false;
    }

}







$conn->close();

?>