<?php
	class Product
	{

	private $servername = "localhost";
	private $username 	= "root";
	private $password 	= "";
	private $database 	= "CoffeeShop";
	public  $con; 
		public function __construct()
		{
			$this->con = new mysqli($this->servername, $this->username,$this->password,$this->database);
			if(mysqli_connect_error()) {
				trigger_error("Failed to connect to MySQL: " . mysqli_connect_error());
			}else{
				return $this->con;
			}
		}
		public function InsertNewProduct($post)
		{
			
			$ProductName = $this->con->real_escape_string($_POST['ProductName']);
			$ProductType = $this->con->real_escape_string($_POST['ProductType']);
			$ProductFlavors = $this->con->real_escape_string($_POST['ProductFlavors']);
			$Description= $this->con->real_escape_string($_POST['Description']);
			$Price = $this->con->real_escape_string($_POST['Price']);
			$image=$_FILES['Image'];
            $file_name=$_FILES['Image']['name'];
            $file_size=$_FILES['Image']['size'];
            $file_tmp=$_FILES['Image']['tmp_name'];
            $file_type=$_FILES['Image']['type'];

	
			

			$sql="INSERT INTO Products(ProductID,ProductName,ProductType,ProductFlavors,Description,Price,Image) VALUES 
			(Null,'$ProductName','$ProductType', '$ProductFlavors','$Description','$Price','$file_name')";
			$result = mysqli_query($this->con,$sql);
			move_uploaded_file($file_tmp,"Products/".$file_name);
			
			if ($result) {
header("Location:employee.php?msg1=insert");
} else {
  echo "Error: " . $sql . "<br>" . $this->con->error;
}

		
		}
	
		public function displayData()
		{
			$query = "SELECT * FROM Products";
			$result = $this->con->query($query);
			if ($result->num_rows > 0) {
				$data = array();
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				return $data;
			}
		}
		public function displyaRecordById($id)
		{
			$query = "SELECT * FROM Products WHERE ProductID = '$id'";
			$result = $this->con->query($query);
			if ($result->num_rows > 0) {
				$row = $result->fetch_assoc();
				return $row;
			}else{
				echo "Product not found";
			}
		}
		public function updateRecord($postData)
		{
			$ProductName  = $this->con->real_escape_string($_POST['ProductName']);
			$ProductType = $this->con->real_escape_string($_POST['ProductType']);
			$ProductFlavors = $this->con->real_escape_string($_POST['ProductFlavors']);
			$Description = $this->con->real_escape_string($_POST['Description']);
			$Price = $this->con->real_escape_string($_POST['Price']);
			
			$image=$_FILES['Image'];
            $file_name=$_FILES['Image']['name'];
            $file_size=$_FILES['Image']['size'];
            $file_tmp=$_FILES['Image']['tmp_name'];
            $file_type=$_FILES['Image']['type'];
			
			$ProductID= $this->con->real_escape_string($_POST['ProductID']);
			if (!empty($ProductID) && !empty($postData)) {
				$sql = "UPDATE Products SET ProductName='$ProductName',ProductType='$ProductType',ProductFlavors='$ProductFlavors',Description='$Description', Price='$Price', Image='$file_name' WHERE ProductID = $ProductID";
				$result = mysqli_query($this->con,$sql);
				move_uploaded_file($file_tmp,"Products/".$file_name);
			if ($result) {
  header("Location:employee.php?msg2=update");
} else {
  echo "Error: " . $sql . "<br>" . $this->con->error;
}
				
			}
			
		}
		public function deleteRecord($id)
		{
			$query = "DELETE FROM Products WHERE ProductID = '$id'";
			$sql = mysqli_query($this->con,$query);
			if ($sql) {
				header("Location:employee.php?msg3=delete");
			}else{
				echo "Error: " . $sql . "<br>" . $this->con->error;
			}
		}

	}
?>