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

$sql="SELECT * FROM users JOIN serviceproviders ON users.UserTypeId =2;";
$result=$conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) 
    {
        echo "Name: " . $row["name"]. " " . $row["CategoryId"]. "<br>";
        echo "<br>";
    }
} else {
    echo "0 results";
}


$conn->close();

?>