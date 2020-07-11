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

$duration=$_POST['duration'];
$date=$_POST['date'];
$time=$_POST['time'];
$ServiceProviderId=$_SESSION["Id"];

//write your queries here

$sql = "INSERT into slots (duration,date,time,ServiceProviderId) VALUES ('$duration','$date','$time','$ServiceProviderId')";
$result = $conn->query($sql);

if ($result === TRUE) {
   echo "1";
} 
else {
    echo "-1";
}

$conn->close();

?>