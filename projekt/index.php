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
		interfaceClass::printHead("Galeria", "./assets/css/glowny/style.css", "./assets/img/icon.jpg");
		?>
	</head>
	<body>
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<p class="navbar-brand">Strona Główna</a>
				<?php
                interfaceClass::interfaceHeader(); //klasa interface oraz wykorzystanie z jej funkcji
				?>
			</div>
		</nav>
		<div class="space"></div>
		<section class="sekcja">
			<?php
            interfaceClass::interfaceNota(); //klasa interface oraz wykorzystanie z jej funkcji
			interfaceClass::interfaceNota1("Witaj ".$_SESSION['user_name']."#".$_SESSION['id'], "lorem");
            interfaceClass::interfaceNota2("Rogal ddl - OCB/NWS", "lorem");
            interfaceClass::interfacePanel(); //klasa interface oraz wykorzystanie z jej funkcji
			?>
			            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
			<?php
			if (isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true) {
			?>
			<div class="alert">Galeria</div>
			<?php
			}
			else {
			?>
				<div class="alert">Publiczna Galeria</div>
			<?php
			}
			?>
				<?php
					// require_once ('config.class.php');
					// $main = new MainClass();
					$connection = $main -> db_connect(); //lączenie z bazą danych
					$query = mysqli_query($connection, "SELECT * FROM `image`") or die(mysqli_error());
					if (isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true) {
						while ($fetch = mysqli_fetch_array($query)) {
							if ($_SESSION['id'] == $fetch['id']) {
								?>
								<div style="border:1px solid #000; height:190px; width:190px; padding:4px; float:left; margin:10px;">
									<a href="<?php echo $fetch['location'] ?>"><img src="<?php echo $fetch['location'] ?>" width="180" height="180"/></a>
								</div>
							<?php
							}
						}
					}
					else {
					while ($fetch = mysqli_fetch_array($query)) {
						?>
								<div style="border:1px solid #000; height:190px; width:190px; padding:4px; float:left; margin:10px;">
									<a href="<?php echo $fetch['location'] ?>"><img src="<?php echo $fetch['location'] ?>" width="180" height="180"/></a>
								</div>
						<?php
						}
					}
				?>
			</div>
		</section>
	</body>	
</html>