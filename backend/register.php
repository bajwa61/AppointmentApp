<?php

include '../connection.php';


//write your queries here
$name=$_POST["name1"];
$email=$_POST["email"];
$password=$_POST["password"];
$accountType=$_POST["account-type"];


$sql = "INSERT into users (name,email,password,UserTypeId) VALUES ('$name','$email','$password','$accountType')";
$result = $conn->query($sql);

if ($result) {
    $last_id = $conn->insert_id;
    if($accountType=="1")
    {
        $sql2 = "INSERT into customers (UserId) VALUES ('$last_id')";
        $result2 = $conn->query($sql2);
        if ($result2 === TRUE) { ?>
           <script>alert("Registration Sucess"); window.location.href="/AppointmentApp/login-front.php"</script>
        <?php }
        else{
          ?>
           <script>alert("Registration Failed");</script>
        <?php }
    }
    else if($accountType=="2")
    {
        $sql2 = "INSERT into serviceproviders (UserId) VALUES ('$last_id')";
        $result2 = $conn->query($sql2);
        if ($result2 === TRUE) { ?>
            <script>alert("Registration Sucess"); window.location.href="/AppointmentApp/login-front.php"</script>
         <?php}
         else{
           ?>
            <script>alert("Registration Failed");</script>
         <?php echo "Registration Failed" ;   }
    }
}     
else { ?>
     <script>alert("Registration Failed");</script>
<?php }


$conn->close();

?>