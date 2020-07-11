<?php
   session_start();
?>

<?php

include '../connection.php';

$UserId=$_POST["UserId"];
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
    $sql = "UPDATE users SET name='$name',gender='$gender',mobileNumber='$mobileNumber',country='$country',city='$city',postalCode='$postalCode' WHERE UserId='$UserId' ";
    echo $sql;
    $result = $conn->query($sql);
    if($result){
         header('location:http://localhost/AppointmentApp/profile-settings-front.php');
    }else{
        echo "<script type='text/javascript'>alert('Update Failed');</script>";
        header('location:http://localhost/AppointmentApp/profile-settings-front.php');
    }
}

if ($_SESSION["UserTypeId"]=="2")
{
    $category=$_POST['category'];
    $aboutMe=$_POST['aboutMe'];
    $ServiceId=$_POST["ServiceId"];
    $sql3="UPDATE serviceproviders SET CategoryId='$category',aboutMe='$aboutMe' where ServiceProviderId='$ServiceId'";
    $result3=$conn->query($sql3);

    if ($result3 === TRUE) {
        $sql4 = "UPDATE users SET name='$name',gender='$gender',mobileNumber='$mobileNumber',country='$country',city='$city',postalCode='$postalCode' WHERE UserId='$UserId' ";
        echo $sql4;
        $result4 = $conn->query($sql4);
        if($result4){
             header('location:http://localhost/AppointmentApp/profile-settings-front-2.php');
        }else{
            echo "<script type='text/javascript'>alert('Update Failed');</script>";
            header('location:http://localhost/AppointmentApp/profile-settings-front-2.php');
        }
    } 
    else
    {
        echo "<script type='text/javascript'>alert('Update Failed');</script>";
        header('location:http://localhost/AppointmentApp/profile-settings-front-2.php');
    }
}


$conn->close();

?>