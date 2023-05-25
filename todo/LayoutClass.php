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
            if($res['rank'] == 2){
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
            <nav class='navbar navbar-expand-lg bg-body-tertiary'>
            <div class='container-fluid'>
            <a class='navbar-brand' href='index.php'>ToDo</a>
            <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
            </button>
            <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
                <li class='nav-item'>
                    <a class='nav-link active' aria-current='page' href='index.php'>Home</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='#'>Link</a>
                </li>
                <li class='nav-item dropdown'>
                    <a class='nav-link dropdown-toggle' href='#' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                    Dropdown
                    </a>
                    <ul class='dropdown-menu'>
                    <li><a class='dropdown-item' href='#'>Action</a></li>
                    <li><a class='dropdown-item' href='#'>Another action</a></li>
                    <li><hr class='dropdown-divider'></li>
                    <li><a class='dropdown-item' href='#'>Something else here</a></li>
                    </ul>
                </li>
                </ul>
                <ul class='navbar-nav  mb-2 mb-lg-0'>
                        $conditionRender
                </ul>
                </div>
                </div>
            </nav>
        ";
    }
    
    
}  