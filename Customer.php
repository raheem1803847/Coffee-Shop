<?php
include 'User.php';
class Customer extends User{
  public function signUp($email, $password, $userType){
      parent::addUser($email, $password, $userType);
  }
  public function logIn($email, $password){
      include 'dB.php';
      $sql = mysqli_query($conn,"SELECT * FROM User WHERE email='$email' AND password='$password'");
      if(mysqli_num_rows($sql) > 0){
         if($row = mysqli_fetch_assoc($sql)){
           if($row['userType'] == 3){
            echo 'Logged In As Customer';
            session_start();
            $_SESSION['email'] = $email;  
            //Call Page
          }
          else{
            echo '<script>alert("Error, Customer Is Not Exist")</script>';
            return;
                
          }
      }
      else{
          echo '<script>alert("Error, Data Is Not True")</script>';
          return;
      }
    }
  }
public function editProfile($email, $password){
    include 'dB.php';
    session_start();
    mysqli_query($conn, "UPDATE User SET email='$email', password='$password', userType=3 
    WHERE email='".$_SESSION['email']."'");
    $_SESSION['email'] = $email;
    echo '<script>alert("Done, Data Updated Successfully")</script>';
    return;
  }
}

?>