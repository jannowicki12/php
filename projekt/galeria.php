<?php
session_start();
// if(isset($_SESSION["signed_in"]) && $_SESSION["signed_in"] == true) sesja
require_once("config.class.php"); // lączenie z bazą oraz session
$main = new MainClass();
$session = $main -> d_session();
?>
<!DOCTYPE html>
<html lang="pl">
	<head>
		<title>Galeria</title>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.css"/>
		<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
		<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
	</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<a class="navbar-brand">Strona Główna</a>
		</div>
        <button class="button1"><a href="logout.php"<?php session_unset();?>>Logout</a></button>
	</nav>
	<div class="col-md-3"></div>
	<div class="col-md-6 well">
		<h3 class="text-primary">Galeria</h3>
		<hr style="border-top:1px dotted #ccc;"/>
		<form method="POST" action="upload.php" enctype="multipart/form-data">
			<div class="form-inline">
				<label>Wrzuc tutaj</label>
				<input type="file" name="image" class="form-control" required="required"/>
				<button class="btn btn-primary" name="upload"><ion-icon name="cloud-upload-outline"></ion-icon></span>Upload</button>
			</div>
		</form>
		<br />
		<div class="alert alert-info">Moja Galeria</div>
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
</body>	
</html>