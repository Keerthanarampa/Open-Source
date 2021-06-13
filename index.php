<?php
	session_start();
	if(!$_SESSION['auth']){
		#echo "Unauthorised user";
		header('location:homepage1.html');
	}

?>

<html>
	<head>
		<title>Home </title>
	</head>
	<body>
		<form action = "logout.php" method = "POST">
			<h1> This is home page </h1>
			<input type="submit" name="Submit" value="Logout">
		</form>
	</body>
</html>