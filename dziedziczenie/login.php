<?php 
session_start();
// require ("class.php");
// $database = new MainClass();
// $conn = $database -> db_connect();
require_once("config.class.php");
$main = new MainClass();
$connection = $main -> db_connect();

if (isset($_POST['uname']) && isset($_POST['password'])) {

	$uname = htmlentities($_POST['uname'], ENT_QUOTES, "UTF-8");
	$password = htmlentities($_POST['password'], ENT_QUOTES, "UTF-8");

	if (empty($uname)) {
		header("Location: index.php?error=Nazwa uzytkownika wymagana");
		session_unset();
	    exit();
	}else if(empty($password)){
        header("Location: index.php?error=Haslo wymagane");
	    exit();
	}else{
		$sql = sprintf(
			"SELECT * FROM users WHERE user_name='%s' AND password='%s'",
			mysqli_real_escape_string($connection, $uname),
			mysqli_real_escape_string($connection, $password)
			);

		$result = $connection -> query($sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['user_name'] === $uname && $row['password'] === $password) {
            	$_SESSION['user_name'] = $row['user_name'];
            	$_SESSION['id'] = $row['id'];
            	$_SESSION['signed_in'] = true;	 
				header("Location: logged.php");
		        exit();
            }else{
				header("Location: index.php?error=Nieprawidlowa nazwa uzytkownika albo haslo");
				session_unset();
		        exit();
			}
		}else{
			header("Location: index.php?error=Nieprawidlowa nazwa uzytkownika albo haslo");
			session_unset();
	        exit();
		}
	}
	
}else{
	header("Location: index.php");
	exit();
}