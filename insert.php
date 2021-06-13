<?php
	$name= $_POST["name"];
	$email = $_POST["email"];
	$location = $_POST["location"];
	$password = $_POST["password"];
	$confirm_password = $_POST["confirm_password"];
	if (!empty($name) || !empty($email) || !empty($location) || !empty($password) || !empty($confirm_password) ){
		$host = "localhost";
		$dbUsername = "root";
		$dbPassword = "";
		$dbname = "beach traffic";
		
		$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
		
		if(mysqli_connect_error()){
			die('Connect error ('.mysql_connect_error().')'.mysqli_connect_error());
		} else {
			$SELECT = "SELECT email From register Where email=? Limit 1";
			$INSERT = "INSERT Into register (name, email, location, password, confirm_password) values (?,?,?,?,?)"; 
			
			$stmt = $conn->prepare($SELECT);
			$stmt->bind_param("s", $email);
			$stmt->execute();
			$stmt->bind_result($email);
			$stmt->store_result();
			$rnum = $stmt->num_rows;
			
			if ($rnum == 0){
				$stmt->close();
				$stmt = $conn->prepare($INSERT);
				$stmt->bind_param("ssss", $name, $email, $location, $password, $confirm_password);
				$stmt->execute();
				echo "New record added";
				header('Location: loginn.html');
			} else{
				echo "This email id already exist";
				#header('Location: signup.html');
			}
			$stmt->close();
			$conn->close();
		}
	} else {
		echo "All fields are required";
		die();
	}
	
?>