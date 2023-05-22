<?php
ob_start();
session_start();
require 'dbconnect.php';
$db = new db();
$connect = $db -> connectcor();

if (isset($_POST["username"]) & isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $errors = array();
    if (strlen($username) < 5 || strlen($username) > 20) {
        array_push($errors, "Username must be between 5 and 20 characters");
    }
    if (strlen($password) < 8 || strlen($password) > 64) {
        array_push($errors, "Password must be between 8 and 64 characters");
    }
    if (count($errors) == 0){
        $check_user_exists = "SELECT * FROM users WHERE username='$username' AND password = '$password' LIMIT 1";
        $result = $connect->query($check_user_exists);
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $_SESSION["username"] = $row["username"];
            $_SESSION["logged_in"] = TRUE;
            header("Location: index.php");
            
        } else {
            array_push($errors, "User does not exist");
        }
    }

}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
  <div class="container">
<div class="h-100 d-flex align-items-center justify-content-center">
        <div class="card">
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control" name="username">
                    <div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                    <div>
                    <div class="mt-3 d-grid">
                        <button class="btn btn-primary" type="submit">Login</button>
                    </div>
                    <div class="mb-3">
                        <a href="index.php">index</a>
                    <div>
                </form>
            </div>
        </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>
