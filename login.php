<?php
	
	if ($_POST ){
		$host = "localhost";
		$dbUsername = "root";
		$dbPassword = "";
		$dbname = "signup";
		
		$name = $_POST["name"];
		$email = $_POST["email"];
		$location = $_POST["location"];
		$password = $_POST["password"];
		$confirm_password = $_POST["confirm_password"];
		$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
		$query = "SELECT * From register Where name='$name' and password='$password'";
		$result = mysqli_query($conn,$query);
		if(mysqli_num_rows($result) ==1){
			echo "Correct Credentials";
			session_start();
			$_SESSION['auth']='true';
			header('location:index.php');
		} else {
			echo "Username or Password is incorrect";
			#header('location:loginn.html');
		}
	}
	#header('Location: loginn.html');
?>
