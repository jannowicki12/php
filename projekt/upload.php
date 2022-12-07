<?php
	session_start();
	require_once("interfaceClass.php");
	$main = new MainClass();
	$connection = $main -> db_connect();
	
	if(ISSET($_POST['upload'])){
		$image_name = $_FILES['image']['name'];
		$image_temp = $_FILES['image']['tmp_name'];
		$image_size = $_FILES['image']['size'];
		$ext = explode(".", $image_name);
		$end = end($ext);
		$allowed_ext = array("jpg", "jpeg", "gif", "png");
		$name = time().".".$end;
		$path = "upload/".$name;
		if(in_array($end, $allowed_ext)){
			if($image_size > 5242880){
				header("Location: index.php?error=zdjęcie waży za duzo");
			}else{
				if(move_uploaded_file($image_temp, $path)){
					mysqli_query($connection, "INSERT INTO `image` VALUES('', '$name', '$path')") or die(mysqli_error());
					header("Location: index.php");
				}
			}
		}else{
			header("Location: index.php?error=Zły format");
		}
	}
?>