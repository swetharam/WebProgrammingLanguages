<?php

session_start();
if ($_SESSION["username"]!=""&& $_SESSION["name"] !=""&&$_SESSION["password"]!="") {

$servername = "localhost";
$username = "root";
$password = "";
$dbname="PW5";

// Create connection
try {
	$usrname=$_SESSION["username"];
	$nme=$_SESSION["name"] ;
	$passwd=$_SESSION["password"];
	echo "Hi and welcome ".$nme;
	echo "\r\n";
	$conn = new mysqli($servername, $username, $password, $dbname);

	$sql = "SELECT avatar FROM Users where username='$usrname'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		    // output data of each row
		while($row = $result->fetch_assoc()) {
			$image = $row['avatar'];
			echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['avatar'] ).'"/>';

		}
	}
	$sql = "SELECT `movie_id` FROM FavoriteMovies where username='$usrname'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {		
					$movieid=$row['movie_id'];
					$sql1 = "SELECT title,year FROM Movies WHERE `movie_id`='$movieid'";
					$result1 = $conn->query($sql1);
					if ($result1->num_rows > 0) {
							while($row = $result1->fetch_assoc()) {
								echo "Title: ".$row['title']." Year: ".$row['year'];

				}
			}
	}
}
}

catch(PDOException $e)
{
	echo "Connection failed: " . $e->getMessage();
}
}
else
{
	header('Location:login.html');
}
?>
