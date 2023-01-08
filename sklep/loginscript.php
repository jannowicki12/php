<?php 
session_start();
require_once("db.php");
$db = new db();
$connect = $db -> connectcor();

if (isset($_POST['email']) && isset($_POST['password'])) {

	$email = htmlentities($_POST['email'], ENT_QUOTES, "UTF-8");
	$password = htmlentities($_POST['password'], ENT_QUOTES, "UTF-8");

	if (empty($email)) {
		header("Location: login.php?error=Nazwa uzytkownika wymagana");
		session_unset();
	    exit();
	}else if(empty($password)){
        header("Location: login.php?error=Haslo wymagane");
	    exit();
	}else{
		$sql = sprintf(
			"SELECT * FROM users WHERE email='%s' AND password='%s'",
			mysqli_real_escape_string($connect, $email),
			mysqli_real_escape_string($connect, $password)
			);

		$result = $connect -> query($sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['email'] === $email && $row['password'] === $password) {
            	$_SESSION['email'] = $row['email'];
            	$_SESSION['id'] = $row['id'];
            	$_SESSION['signed_in'] = true;	 
				header("Location: index.php");
		        exit();
            }else{
				header("Location: login.php?error=Nieprawidlowa nazwa uzytkownika albo haslo");
				session_unset();
		        exit();
			}
		}else{
			header("Location: login.php?error=Nieprawidlowa nazwa uzytkownika albo haslo");
			session_unset();
	        exit();
		}
	}
	
}else{
	header("Location: login.php");
	exit();
}