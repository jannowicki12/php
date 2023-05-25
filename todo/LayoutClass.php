<?php
session_start();

class LayoutClass {
    static function printHeader() {
        $conditionRender = "";
        if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true ){
            include 'db.php';
            $username = $_SESSION['username'];
            $isadminquery = "SELECT * FROM users WHERE username = '$username'";
            $select = mysqli_query($connection, $isadminquery);
            $res = mysqli_fetch_assoc($select);
            if($res['rank'] == 1 or $res['rank'] == 2){
                $conditionRender = '
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="AdminPanel.php">Admin Panel</a></li>
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="todo.php">panel</a></li>
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="logout.php">logout</a></li>
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="profil.php">profil</a></li>';

            }
            else {
                $conditionRender = '
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="todo.php">panel</a></li>
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="logout.php">logout</a></li>
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="profil.php">profil</a></li>
            ';
            }
        }
        else {
            $conditionRender = '
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="login.php">Login</a></li>
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="register.php">Register</a></li>
            ';
        }
        echo "
                        $conditionRender
        ";
    }
    
    
}  