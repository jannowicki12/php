<?php
session_start();
require_once ("interfaceClass.php");
$interfaceClass = new interfaceClass();
$main = new MainClass();
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
