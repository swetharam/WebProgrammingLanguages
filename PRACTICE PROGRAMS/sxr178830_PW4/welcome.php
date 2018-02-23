<?php
session_start();
if(!isset($_COOKIE['count'])){
	echo "You have visited this page 1 times"."<br>";
	$cookie=1;
	setcookie('count',$cookie,time() + (86400 * 30));
}
else
    {
       	$cookie = ++$_COOKIE['count'];
        setcookie('count', $cookie);
        echo "You have visited this page ".$_COOKIE['count']." times";
        }
if($_SESSION["name"]!="" && $_SESSION["username"]!=""){
	echo "Welcome  User: ".$_SESSION["name"]." Username: ".$_SESSION["username"] ;
}
else {
	# code...
	header('Location:login.html');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome!</title>
</head>
<body>
<br>
<form method="Post" action="welcome.php">
<input type="submit" value="RELOAD">
<br>
<input type="checkbox" value="value1" name="test">Sign Out	<br>
</form>
<?php 
if (isset($_POST['test'])) {
session_destroy();
setcookie("count", "", time() - 3600);
header('Location:login.html');
}



 ?>
<br/>

</body>
</html>