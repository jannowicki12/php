<?php 
    session_start();
    require_once "SystemClass.php";

    $connection = SystemClass::dbConnect();

    if($connection -> connect_errno === 0) {
        
        $userEmail = htmlentities($_POST['email'], ENT_QUOTES, 'UTF-8');
        $userPassword = htmlentities($_POST['password'], ENT_QUOTES, 'UTF-8');

        $sql = sprintf(
            "SELECT * FROM users WHERE email='%s' AND password='%s'",
            mysqli_real_escape_string($connection, $userEmail),
            mysqli_real_escape_string($connection, $userPassword)
        
        );

        if($result = $connection -> query($sql)) {
            if($result -> num_rows > 0){
                $data = $result -> fetch_assoc();
                $email = $data['email'];
                $_SESSION['email'] = $data['email'];
                $_SESSION['signedIn'] = true;
                unset($_SESSION['signInError']);

                header("Location: index.php");
            } else {
                $_SESSION['signInError'] = true;

                header("Location: signInPage.php");
            }
            $result -> close(); 
        }
        $connection -> close();
    }