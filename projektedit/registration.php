<?php
session_start();
require_once("interfaceClass.php");
$main = new MainClass();
$connection = $main -> db_connect();

$uname = htmlentities($_POST['uname'], ENT_QUOTES, "UTF-8");
$email = htmlentities($_POST['email'], ENT_QUOTES, "UTF-8");
$password = htmlentities($_POST['password'], ENT_QUOTES, "UTF-8");
$repassword = htmlentities($_POST['re-password'], ENT_QUOTES, "UTF-8");

if (empty($uname)) {
    header("Location: register.php?error=Nazwa uzytkownika wymagana");
    session_unset();
    exit();
}else if(empty($email)){
    header("Location: register.php?error=Email jest wymagany");
    exit();
}else if(empty($password)){
    header("Location: register.php?error=Haslo wymagane");
    exit();
}else if($password !== $repassword){
    header("Location: register.php?error=Haslo sie nie zgadza");
    exit();
}else if(strlen($password) < 8){
    header("Location: register.php?error=Haslo jest za krótkie, powinno sie skladac z minimum 8 znaków");
}else {

    $query = "SELECT id FROM users WHERE email = '$email'";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0) {
        header("Location: register.php?error=email jest juz zarejestrowany");
        exit();
    } else {

        $query = "INSERT INTO users (user_name, email, password) VALUES ('$uname', '$email', '$password')";
        
        if (!mysqli_query($connection, $query)){
            header("Location: register.php?error=Nie mozesz sie zarejestrowac? sproboj ponownie");
            exit();
            } else {
                header("Location: login.php"); 
            } 
        
            }
        
        }
?>