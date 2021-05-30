<?php
try{
  $conn = mysqli_connect("localhost", "root", "", "coffeeShop");
  }catch(Exception $ex){
    echo '<script>alert("Error, Failed Connection With Data Base")</script>';
    return;
  }



?>