<?php
session_start();

class LayoutClass {
    static function printHeader() {
        $conditionRender = "";
        if(isset($_SESSION["signedIn"]) && $_SESSION["signedIn"] === true ){
            $conditionRender = "
                <li><a href='logout.php'>Wyloguj</a></li>
            ";
        }
        else {
            $conditionRender = "
                <li><a href='signInPage.php'>Zaloguj się</a></li>
                <li><a href='signUpPage.php'>Zarejestruj się</a></li>
            ";
        }
        echo "
        <header>
            <div class='header__container'>
                <h4>LOGO</h4>
                <nav>
                    <ul>
                        <li><a>Home</a></li>
                        <li><a>About Us</a></li>
                        <li><a>Contact</a></li>
                        $conditionRender
                    </ul>
                </nav>
            </div>
        </header>
        ";
    }
    static function printLogin() {
        $conditionLogin = "";
        if(isset($_SESSION["signedIn"]) && $_SESSION["signedIn"] === true ){
            $conditionLogin = "
                header('Location: index.php');
            ";
        }
        else {
            $conditionLogin = "
            <style>
            body {
                background: lightblue;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                flex-direction: column;
              }
              
              * {
                box-sizing: border-box;
              }
              
              form {
                width: 400px;
                border: 1px solid #ccc;
                padding: 10px;
                background: lightsalmon;
                border-radius: 20px;
              }
              
              h2 {
                text-align: center;
                margin-bottom: 30px;
              }
              
              input {
                display: block;
                border: 2px solid #ccc;
                width: 95%;
                padding: 3px;
                margin: 5px auto;
                border-radius: 6px;
              }
              
              label {
                color: #888;
                font-size: 18px;
                padding: 10px;
              }
              
              button {
                float: right;
                background: #555;
                padding: 5px 5px;
                color: #fff;
                border-radius: 5px;
                margin-right: 50px;
                margin-left:50px;
                width: 70%;
                border: none;
              }
              
              button:hover {
                opacity: 0.8;
              }
              
              h1 {
                text-align: center;
                color: #fff;
              }
              
              a {
                float: left;
                background: #555;
                padding: 5px 5px;
                color: #fff;
                border-radius: 5px;
                border: none;
                text-decoration: none;
              }
              
              a:hover {
                opacity: 0.7;
              } /*# sourceMappingURL=style.css.map *//*# sourceMappingURL=style.css.map */</style>
            <form action='loginscript.php' method='post'>
                <h2>Login</h2>
                <label>Email:</label>
                <input type='email' name='email' placeholder='Podaj Email'><br>
                <label>Hasło:</label>
                <input type='password' name='password' placeholder='Hasło'><br>
                <button type='submit' name='login'>Login<ion-icon name='log-in-outline'></ion-icon></button>
            ";
        }
        echo "<body>
        $conditionLogin
        </body>";
    }
    static function printFooter() {
      echo "<div class='footer'>footer</div>";
    }
    public static function printHero($title1, $description) {
      echo "<section class='hero'
      <h1>$title1</h1>
      <p>$description</p>
      </section>";
    }
}