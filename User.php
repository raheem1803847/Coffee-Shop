<?php
class User{
  private $email;
  private $password;
  private $userType;

  function addUser($email, $password, $userType){
     $this->email = $email;
     $this->password = $password;
     $this->userType = $userType;
     if(!$this->validateData()){
      $this->insertData();
   }
}
  private function validateData(){
   include 'dB.php';
     $flag = true;
     if($this->email == '' || $this->password == '' || $this->userType == ''){
        return $flag;
     }
     $sql = mysqli_query($conn, "SELECT email FROM User WHERE email='$this->email'");
     if(mysqli_num_rows($sql) > 0){
        echo '<script>alert("Error, Name Is Already Taken")</script>';
        return $flag; 
      }
     if(mysqli_num_rows($sql) == 0){
     $flag = false;
     return $flag;
   }
  }
  private function insertData(){
   include 'dB.php';
     mysqli_query($conn, "INSERT INTO User
      (email, password, userType) 
       VALUES
       ('$this->email', '$this->password', '$this->userType')");
       echo '<script>alert("Done, Your Account Saved Successfully")</script>';
       return;
  }
  public function getEmail(){
     return $this->email;
  }
  public function getPassword(){
     return $this->password;
  }
}



?>