<?php
ob_start();
session_start();
require_once("interfaceClass.php");
require_once("functions.php");
$main = new MainClass();
$user = new user();
?>
<!DOCTYPE html>
<html lang="pl">
	<head>
	    <?php
		interfaceClass::printHead("Szkola Jazdy", "./assets/css/glowny/style.css", "./assets/img/icon.jpg");
		?>
	</head>
	<body>
		<?php
        interfaceClass::interfaceHeader();
		?>
	</body>	
</html>
