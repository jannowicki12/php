<?php
session_start();
require_once "SystemClass.php";

$connection = SystemClass::dbConnect();

$email = htmlentities($_POST['email'], ENT_QUOTES, "UTF-8");
$password = htmlentities($_POST['password'], ENT_QUOTES, "UTF-8");
$repassword = htmlentities($_POST['re-password'], ENT_QUOTES, "UTF-8");
$checkbox = $_POST['checkbox'];

if (empty($email)) {
    $_SESSION['signUpEmailrequired'] = true;
    header("Location: signUpPage.php");
    exit();
}else if(empty($password)){
    $_SESSION['signUpPasswordrequired'] = true;
    header("Location: signUpPage.php");
    exit();
}else if($password !== $repassword){
    $_SESSION['signUpPasswordError'] = true;
    header("Location: signUpPage.php");
    exit();
}else if(strlen($password) < 8){
    $_SESSION['singUpPasswordShort'] = true;
    header("Location: signUpPage.php");
}else if(!isset($checkbox)) {
    $_SESSION['signUpChechbox'] = true;
    header("Location: signUpPage.php");
}
else {

    $query = "SELECT id FROM users WHERE email = '$email'";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['signUpEmailError'] = true;
        header("Location: signUpPage.php");
        exit();
    } else {

        $query = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
        
        if (!mysqli_query($connection, $query)){
            $_SESSION['signUpCreateError'] = true;
            header("Location: signUpPage.php");
            exit();
            } else {
                unset($_SESSION['signInError']);
                header("Location: signInPage.php"); 
            } 
        
            }
        
        }
?>