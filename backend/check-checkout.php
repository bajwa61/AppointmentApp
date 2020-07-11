<?php
  session_start();
?>
<?php
  include  '../connection.php';
  if( isset($_SESSION["UserTypeId"]) && isset($_SESSION["Id"])  )
  {
    if($_SESSION["UserTypeId"]=="1" && $_SESSION["Id"]>0)//Customer is login
    {
        $CustomerId=$_SESSION["Id"];
        $SlotId=$_POST["SlotId"];
        $sql="Insert into bookings (CustomerId,SlotId) VALUES ('$CustomerId','$SlotId') ";
        $result=$conn->query($sql);
        if($result){?>
            <script> alert ('Appointment Booked Sucessfully'); window.location.href="http://localhost/AppointmentApp/customer-dashboard.php"; </script>
        <?php } else {  ?>
            <script> alert ('Appointment Booing Failed Try Again !!');window.location.href="http://localhost/AppointmentApp/login-front.php";</script></script>

       <?php }
    }
    else if($_SESSION["UserTypeId"]=="2" && $_SESSION["Id"]>0) { ?>
            <script> alert ('You need to login as a Customer');
            window.location.href="http://localhost/AppointmentApp/login-front.php";</script>
       <?php }
    else {  ?>
      <script> window.alert("You need to login in order to Place an Order");
               window.location.href="http://localhost/AppointmentApp/login-front.php";
      </script>
   <?php } 
  }
  else {  ?>
         <script> window.alert("You need to login in order to Order an Appointment");
                  window.location.href="http://localhost/AppointmentApp/login-front.php";
         </script>
   <?php } $conn->close(); ?> 

   
