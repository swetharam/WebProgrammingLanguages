<?php
// Start the session
session_start();

$name=$username=$password="";
// Set session variables
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		# code...
		$name=htmlspecialchars($_POST['name']);
		$username=htmlspecialchars($_POST['username']);
		$password=htmlspecialchars($_POST['password']);
		
		if($name!=""&&$username!=""&&$password!=""){
		$_SESSION["name"] = $name;
		$_SESSION["username"] =$username;
		header('Location:welcome.php');
	}
	else{
		header('Location:login.html');
	}
	}
?>