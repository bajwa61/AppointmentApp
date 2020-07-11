
<?php  
  session_start();
  $_SESSION["ids"]=array();
?>
<?php 
    include '../connection.php';

    $checkboxValues=$_POST["Search"];
    for($i=0;$i<count($checkboxValues);$i++){
        array_push($_SESSION["ids"],$checkboxValues[$i]);
    }
    header('location:http://localhost/AppointmentApp/search.php');
    $conn->close();
?>

  