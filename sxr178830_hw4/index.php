<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "hw4";
$conn = mysqli_connect($servername, $username, $password, $dbname);
try {
	$request_url=$_SERVER['REQUEST_URI'];
	$url = $request_url;
	$tag=0;
	$strlen=strlen($url);
	for( $i = 0; $i <= $strlen; $i++ ) {
    	$char = substr( $url, $i, 1 );
    	if(!is_numeric( $char ) ) { continue; }
    	$tag = $char;
	}

	if($tag=="books"){
		$query = "SELECT Title from book";
	}
	else{
		$query = "SELECT b.Title,b.Year,b.Price,b.Category,a.Author_Name from book b,authors a where b.Book_id='$tag' and a.Author_Name  IN(SELECT x.Author_Name from Authors x,book_authors y where x.Author_id=y.Author_id and y.Book_id='$tag')";
	}
	$result = mysqli_query($conn, $query);
	echo '[';
	for ($i=0;$i<mysqli_num_rows($result);$i++) {
		echo ($i>0?',':'').json_encode(mysqli_fetch_object($result));
	}
	echo ']';
} catch (Exception $e) {
	echo "Issues with the connection";
}
?>