<?php
session_start();
// if(isset($_SESSION["signed_in"]) && $_SESSION["signed_in"] == true) sesja
require_once ("interfaceClass.php");
$interfaceClass = new interfaceClass();
$main = new MainClass();
?>
<!DOCTYPE html>
<html lang="pl">
	<head>
	    <?php
		interfaceClass::printHead("Galeria", "./assets/css/glowny/style.css");
		?>
	</head>
	<body>
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<p class="navbar-brand">Strona Główna</a>
				<?php
                interfaceClass::interfaceHeader();
				?>
				<!-- <button class="button"><a href="logout.php">Logout</a></button> -->
			</div>
		</nav>
		<div class="space"></div>
		<section class="sekcja">
			<?php
            interfaceClass::interfaceNota();
            interfaceClass::interfacePanel();
			?>
			<div class="alert">Moja Galeria</div>
				<?php
					// require_once ('config.class.php');
					// $main = new MainClass();
					$connection = $main -> db_connect();
					
					$query = mysqli_query($connection, "SELECT * FROM `image`") or die(mysqli_error());
					while($fetch = mysqli_fetch_array($query)){
				?>
					<div style="border:1px solid #000; height:190px; width:190px; padding:4px; float:left; margin:10px;">
						<a href="<?php echo $fetch['location']?>"><img src="<?php echo $fetch['location']?>" width="180" height="180"/></a>
					</div>
				<?php
					}
				?>
			</div>
		</section>
	</body>	
</html>