<?php
session_start();
require_once "SystemClass.php";

$connection = SystemClass::dbConnect();

$email = htmlentities($_POST['email'], ENT_QUOTES, "UTF-8");
$password = htmlentities($_POST['password'], ENT_QUOTES, "UTF-8");
$repassword = htmlentities($_POST['re-password'], ENT_QUOTES, "UTF-8");

if (empty($email)) {
    header("Location: signUpPage.php?error=Email jest wymagany");
    exit();
}else if(empty($password)){
    header("Location: signUpPage.php?error=Haslo wymagane");
    exit();
}else if($password !== $repassword){
    header("Location: signUpPage.php?error=Haslo sie nie zgadza");
    exit();
}else if(strlen($password) < 8){
    header("Location: signUpPage.php?error=Haslo jest za krótkie, powinno sie skladac z minimum 8 znaków");
}else {

    $query = "SELECT id FROM users WHERE email = '$email'";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0) {
        header("Location: signUpPage.php?error=email jest juz zarejestrowany");
        exit();
    } else {

        $query = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
        
        if (!mysqli_query($connection, $query)){
            header("Location: signUpPage.php?error=Nie mozesz sie zarejestrowac? sproboj ponownie");
            exit();
            } else {
                header("Location: signInPage.php"); 
            } 
        
            }
        
        }
?>