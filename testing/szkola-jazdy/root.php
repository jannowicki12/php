<?php
ob_start();
session_start();
require_once("interfaceClass.php");
require_once("functions.php");
$main = new MainClass();
$user = new user();
$connect = $main -> db_connect();

if (!($user -> isAdmin($connect)))
{
	header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="pl">
	<head>
	    <?php
		interfaceClass::printHead("Admin", "./assets/css/glowny/style.css", "./assets/img/icon.jpg");
		?>
	</head>
	<body>
		<p style="color: white;">jestes adminem</p>
	</body>	
</html>
