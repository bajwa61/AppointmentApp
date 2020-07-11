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

$sql="Select * from slots where ServiceProviderId='$Id'";
$result=$conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) 
    {
        echo '<tr>
                   <td>';echo $row["SlotId"] ;echo'</td>';
                   echo' <td>';echo $row["duration"] ; echo ' Mins'; ;echo'</td>';
                   echo' <td>';echo $row["date"];echo'</td>';
                   echo' <td>';echo $row["time"] ;echo'</td>';
                   
        echo'</tr>';
    }
}

    


$conn->close();

?>