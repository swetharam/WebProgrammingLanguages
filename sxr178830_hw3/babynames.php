<?php
	$year = $_GET["year"];
	$gender = $_GET["gender"];
	$databasen = 'mysql:dbname=hw3;host=localhost;port=3306';
	$username = 'root';
	$password = '';

	error_log("Got the request");
	
	try {
		error_log("Inside try statement");
		$db = new PDO($databasen, $username, $password);
		$y = $db->quote($year);
		$g = $db->quote($gender);
		// This following value store the value of number of values displayed, as in top 5 in most cases and all values when nothing is selected
		$c=0;
		if (strlen($gender)<1 && strlen($year)>0){
			$queryyear="SELECT name,ranking, gender,year FROM babynames WHERE year = $y order by year";
			$rows = $db->query($queryyear);
			$c=100;
		}
		if (strlen($year)<1 && strlen($gender)>0){
			$querygen="SELECT name,ranking, gender,year FROM babynames WHERE gender = $g order by ranking";
			$rows = $db->query($querygen);
			$c=100;
		}
		if(strlen($year)>0 && strlen($gender)>0){
			$queryboth="SELECT name,ranking, gender ,year FROM babynames WHERE year = $y and gender = $g order by ranking";
			$rows = $db->query($queryboth);
			$c=5;
		}
		if(strlen($year)<1 && strlen($gender)<1){
			$c=1000;
			$queryall="SELECT name,ranking, gender ,year FROM babynames order by year";
			$rows = $db->query($queryall);
		}
		$i = 0;
		$names = array();
			foreach ($rows as $row) {
				if($c>0){

				$names[] = array($row['name'], $row['ranking'], $row['gender'],$row['year']);	
				$c-=1;
				}
			}
	
		print json_encode($names);
		die();
	} catch(PDOException $e) {
		die('Could not connect to the database:<br/>' . $e);
	}	
?>