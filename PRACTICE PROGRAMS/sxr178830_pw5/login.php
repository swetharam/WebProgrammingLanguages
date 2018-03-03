<?php
// Start the session
session_start();
try {
	$conn = new mysqli("localhost", "root", "", "PW5");
	$name=$username=$password="";
	$flag="";
// Set session variables
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		# code...
		//$name=htmlspecialchars($_POST['name']);
		$username=htmlspecialchars($_POST['username']);
		$password=htmlspecialchars($_POST['password']);
		
		if($username!=""&&$password!=""){

			
			$sql = "SELECT fullname,username, password FROM Users";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
		    // output data of each row
				while($row = $result->fetch_assoc()) {
					if ($row['username']==$username && $row['password']==$password) {
						$flag="true";
						$_SESSION["name"] = $row['fullname'];
					}
				}
			}
			
			if ($flag=="true") {
				$_SESSION["username"] =$username;
				$_SESSION["password"]=$password;
				echo "Its correct";
				header('Location:welcome.php');
			}
			else{
				header('Location:login.html');
			}

		}
		else {
			header('Location:login.html');
		}
	}
	
} catch (Exception $e) {
	
	echo "connection not established";
}


?>