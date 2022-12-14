<?php
require_once("config.class.php");
class InterfaceClass extends MainClass {
    public static function interfaceHeader(){
        if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true){
            echo'<header>
            <img class="logo" src="img/logo/logo.svg" alt="logo">
            <nav>
                <ul class="nav__links">
                    <li>
                        <a href="index.php">Strona Główna</a>
                    </li>
                    <li>
                        <a href="kurs.php">Kursy</a>
                    </li>
                    <li>
                        <a href="kontakt.php">Kontakt</a>
                    </li>
                    <li>
                        <a href="informacje.php">Informacja</a>
                    </li>
                </ul>
            </nav>
            <a class="cta" href="logout.php"><button>Wyloguj</button></a>
            </header>';
        } else {
            echo '<header>
            <img class="logo" src="img/logo/logo.svg" alt="logo">
            <nav>
                <ul class="nav__links">
                    <li>
                        <a href="index.php">Strona Główna</a>
                    </li>
                    <li>
                        <a href="kurs.php">Kursy</a>
                    </li>
                    <li>
                        <a href="kontakt.php">Kontakt</a>
                    </li>
                    <li>
                        <a href="informacje.php">Informacja</a>
                    </li>
                </ul>
            </nav>
            <a class="cta" href="login.php"><button>Login</button></a>
            </header>';
        }
    }
    public static function interfacePanel(){
        if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true) { 
        }
    }
    public static function interfaceNota(){
        if (!isset($_SESSION['signed_in'])) {
            echo " <p class='nota'>sddddddddddddddddddddd</p>";
        }
    }
    
    public static function interfaceFooter(){
        echo "<p> sddddddddddddo</p>";
    }
    public static function interfaceNota1($title, $description) {
        if (isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true) {
            echo "
        <section class='hero'>
            <h1>$title</h1>
            <p>$description</p>
        </section>";
        }
        
    }
}
?>