<?php
session_start();
require 'dbconnect.php';
$db = new db();
$connect = $db -> connectcor();
// if ($_SESSION["logged_in"] == TRUE){
    // echo '<h1>Already logged in</h1>';
if (isset($_POST["username"]) & isset($_POST["email"]) & isset($_POST["password_1"]) & isset($_POST["password_2"])){
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password_1 = $_POST["password_1"];
    $password_2 = $_POST["password_2"];

    $errors = array();
    if(count($errors) == 0){

        $check_user_exists = "SELECT * FROM users WHERE username = '$username' OR email = '$email' LIMIT 1";
        $result = $connect->query($check_user_exists);
        if ($result->num_rows == 0) {
            $create_new_user = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password_1')";
            $result = $connect->query($create_new_user);
            $_SESSION["username"] = $username;
            $_SESSION["logged_in"] = true;
            $is_created = true;
            header("Location: index.php");
        } else {
            array_push($errors, "User already exists");
        }
        $connect->close();
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
                    <ul>
                        <?php
                        if (isset($errors)) {
                            foreach ($errors as $error) {
                                echo "<li>$error</li>";
                            }
                        }
                        ?>
                    </ul>  
                    <?php
                        if (isset($is_created)) {
                            echo '<div class="alert alert-success" role="alert">
                                    User created
                            </div>';
                        }
                    ?>  
                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" required>
                    <div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password_1" required>
                    <div>
                    <div class="mb-3">
                        <label class="form-label">Retype password</label>
                        <input type="password" class="form-control" name="password_2" required>
                    <div>
                    <div class="mb-3 text-center">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
                        <label class="form-check-label" for="flexCheckDefault">
                            <a href="/terms.php">Terms and conditions<a>
                        </label>
                    </div>
                    <div class="mt-3 d-grid">
                        <button class="btn btn-primary" type="submit">Register</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>