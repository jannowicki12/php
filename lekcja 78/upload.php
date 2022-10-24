<?php
	require_once 'connect.php';
	
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
				echo "<script>alert('Plik waży za dużo!')</script>";
				echo "<script>window.location = 'index.php'</script>";
			}else{
				if(move_uploaded_file($image_temp, $path)){
					mysqli_query($connect, "INSERT INTO `image` VALUES('', '$name', '$path')") or die(mysqli_error());
					echo "<script>alert('Zdjęcie zastało wrzucone!')</script>";
					echo "<script>window.location = 'index.php'</script>";
				}
			}
		}else{
			echo "<script>alert('Zły format!')</script>";
			echo "<script>window.location = 'index.php'</script>";
		}
		
		
	}
?>