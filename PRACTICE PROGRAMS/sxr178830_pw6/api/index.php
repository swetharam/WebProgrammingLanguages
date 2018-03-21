<?php
	$databasen = 'mysql:dbname=pw6;host=localhost;port=3306';
	$username = 'root';
	$password = 'root';
	
	try{
		$db = new PDO($databasen, $username, $password);
		$query="Select * from `book`";
		$rows = $db->query($query);
		$value = array();
		foreach ($rows as $row) {
				echo json_encode(array($row['Book_id'], $row['title'], $row['year'],$row['price'],$row['category']));
				echo "<br>";
			}
		die();
	}
	

	catch(PDOException $e) {
		die('Could not connect to the database:<br/>' . $e);
	}	
?>