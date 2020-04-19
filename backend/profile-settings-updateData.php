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

$Id=$_SESSION["Id"];//Customer or Service Provider Id
$Userid;
$name=$_POST['name'];
$rawdate = htmlentities($_POST['dob']);
$dob = date('Y-m-d', strtotime($rawdate));
$gender=$_POST['gender'];
$mobileNumber=$_POST['mobileNumber'];
$country=$_POST['country'];
$city=$_POST['city'];
$postalCode=$_POST['postalCode'];


if($_SESSION["UserTypeId"]=="1")
{
    $sql="SELECT UserId from customers where CustomerId='$Id'";
    $result=$conn->query($sql);
    $row = $result->fetch_assoc();
    $UserId=$row["UserId"];
}
else if ($_SESSION["UserTypeId"]=="2")
{

    $category=$_POST['category'];
    $aboutMe=$_POST['aboutMe'];
    $sql="UPDATE serviceproviders SET CategoryId='$category',aboutMe='$aboutMe' where ServiceProviderId='$Id'";
    $result=$conn->query($sql);

    if ($result === TRUE) {
        $sql="SELECT UserId from serviceproviders where ServiceProviderId='$Id'";
        $result=$conn->query($sql);
        $row = $result->fetch_assoc();
        $UserId=$row["UserId"];
    } 
    else
    {
        echo '-1';
    }
}

$sql = "UPDATE users SET name='$name',dob='$dob',gender='$gender',mobileNumber='$mobileNumber',country='$country',city='$city',postalCode='$postalCode' WHERE UserId='$UserId' ";
$result = $conn->query($sql);

if ($result === TRUE) {
    echo '1';
} 
else
{
    echo '-1';
}


$conn->close();

?>