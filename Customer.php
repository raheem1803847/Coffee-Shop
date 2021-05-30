<?php
include 'User.php';
class Customer extends User{
  public function signUp($email, $password, $userType){
      parent::__construct($email, $password, $userType);
  }
  public function logIn($email, $password){
      include 'dB.php';
      $sql = mysqli_query($conn,"SELECT * FROM User WHERE email='$email' AND password='$password'");
      if(mysqli_num_rows($sql) > 0){
         if($row = mysqli_fetch_assoc($sql)){
             if($row[userType] == 1){
                echo 'Logged In As Admin';  
                //Call Page
          }
          else if ($row[userType] == 2){
            echo 'Logged In As Employee';  
            //Call Page
          
          }
          else if ($row[userType] == 3){
            echo 'Logged In As Customer';  
            //Call Page
          }
      }
      else{
          echo '<script>alert("Error, Data Is Not True")</script>';
          return;
      }
    }
  }
public function editProfile($email, $password){
    mysqli_query($conn, "UPDATE User SET email='$email', password='$password', userType=3");
    echo '<script>alert("Done, Data Updated Successfully")</script>';
    return;
  }
}

?>