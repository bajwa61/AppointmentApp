<?php
   session_start();
   $_SESSION["UserTypeId"]=-1;
   $_SESSION["Id"]=-1;
?>


<?php

include '../connection.php';

$email=$_POST['email'];
$password=$_POST['password'];
$accountType=$_POST['account-type'];
$UserId=0;


//write your queries here

$sql = "Select UserId from  users where email='$email' and password='$password' and UserTypeId='$accountType'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  $row=$result->fetch_assoc();
  $UserId=$row["UserId"];
}
else
{?>
       <script>window.alert("Invalid login"); window.location.href="/AppointmentApp/login-front.php"</script>
 <?php }

if($accountType=='1' && $UserId!=0) 
{
  $sql2="Select CustomerId from customers where UserId='$UserId' LIMIT 1 ";
  $result2=$conn->query($sql2);
  if($result2->num_rows>0)
  {
    $row2=$result2->fetch_assoc();
    $_SESSION["Id"]=$row2["CustomerId"];
    $_SESSION["UserTypeId"]=$accountType;
    header('location:/AppointmentApp/customer-dashboard.php');
  }
}
else if($accountType=='2' &&  $UserId!=0)
{
  $sql2="Select ServiceProviderId from serviceproviders where UserId='$UserId' LIMIT 1 ";
  $result2=$conn->query($sql2);
  if($result2->num_rows>0)
  {
    $row2=$result2->fetch_assoc();

    $_SESSION["Id"]=$row2["ServiceProviderId"];
    $_SESSION["UserTypeId"]=$accountType;
    header('location:/AppointmentApp/service-dashboard.php');
  }
}


$conn->close();

?>