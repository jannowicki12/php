<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pl">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.css"/>
	</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<a class="navbar-brand">Strona Główna</a>
		</div>
        <button class="button1"><a href="logout.php"<?php 		session_unset();?>>Logout</a></button>
	</nav>
	<div class="col-md-3"></div>
	<div class="col-md-6 well">
		<h3 class="text-primary">Galeria</h3>
		<hr style="border-top:1px dotted #ccc;"/>
		<form method="POST" action="upload.php" enctype="multipart/form-data">
			<div class="form-inline">
				<label>Wrzuc tutaj</label>
				<input type="file" name="image" class="form-control" required="required"/>
				<button class="btn btn-primary" name="upload"><span class="glyphicon glyphicon-upload"></span>Upload</button>
			</div>
		</form>
		<br />
		<div class="alert alert-info">Moja Galeria</div>
		<?php
			require 'connect.php';
			
			$query = mysqli_query($connect, "SELECT * FROM `image`") or die(mysqli_error());
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