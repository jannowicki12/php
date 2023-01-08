<?php
require_once("config.sklep.php");
class InterfaceClass extends MainClass {
    public static function interfaceHeader(){
        if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true){
            echo'<header>
            <img class="logo" src="assets/img/logo.png" alt="logo">
            <nav>
                <ul class="nav__links">
                    <li class="nav__li">
                        <a href="index.php">Strona Główna</a>
                    </li>
                    <li class="nav__li">
                        <a href="sklep.php">Sklep</a>
                    </li>
                    <li class="nav__li">
                        <a href="kontakt.php">Kontakt</a>
                    </li>
                </ul>
            </nav>
            <a class="cta" href="koszyk.php"><button>Koszyk</button></a>
            <a class="cta" href="connect.php"><button>Panel</button></a>
            <a class="cta" href="logout.php"><button>Wyloguj</button></a>
            </header>';
        } else {
            echo '<header>
            <img class="logo" src="assets/img/logo.png" alt="logo">
            <nav>
                <ul class="nav__links">
                    <li class="nav__li">
                        <a href="index.php">Strona Główna</a>
                    </li>
                    <li class="nav__li">
                        <a href="sklep.php">Sklep</a>
                    </li>
                    <li class="nav__li">
                        <a href="kontakt.php">Kontakt</a>
                    </li>
                </ul>
            </nav>
            <a class="cta" href="login.php"><button>Zaloguj</button></a>
            </header>';
        }
    }
    public static function interfaceKurs(){
        echo "<p> kurs</p>";
    }
    public static function interfaceInfo(){
        echo '
        <style>
            .space{
                height: 100px;
                width: 100%;
            }
            .container__info{
                color: white;
                text-align: left;
                clear: both;
                height: 75px;
                width: 100%;
                padding: 20px;
            }
            .info{
                padding: 10px;
                margin: 10px;
            }
        </style>
        <div class="space"></div>
        <div class="container__info">
            <div class="info">
                <h1>OBELIX istnieje od 1998r.</h1>
                <p>
                    Dysponujemy doświadczoną i wykwalifikowaną kadrą instruktorów z wieloletnim stażem oraz indywidualnym podejściem do każdego kursanta.
                </p>
                <p>
                    Przez okres ponad 20 lat w naszym ośrodku przeszkolonych zostało kilka tysięcy osób.
                    Zajęcia teoretyczne i praktyczne dopasowujemy do codziennych zajęć każdego kursanta.
                </p>
                <p>
                    Posiadamy pojazdy szkoleniowe takie same, którymi WORD przeprowadza egzaminy, czyli Toyota Yaris III.
                    Jako Jedyny ośrodek na Podlasiu oferujemy podczas szkolenia samochód sportowy
                    Subaru Impreza WRX oraz Mercedesa AMG GTR!
                </p>
                <p> Zajmujemy czołowe miejsca w rankingu zdawalności egzaminów na prawo jazdy! Oraz nie przyjmujemy biduli </p>
                <p> Oraz Reprezentujemy Firme, reprezentujemy JP</p>
            </div> 
        </div>
    ';
    }
    
    public static function interfaceKontakt(){
        echo '
        <style>
            .space{
                height: 150px;
                width: 100%;
            }
            .ekran{
                color: white;
                text-align: center;
                clear: both;
                height: 75px;
                width: 100%;
                padding: 20px;
            }
            .kontakt{
                padding: 10px;
                margin: 10px;
            }
        </style>
        <div class="space"></div>
        <div class="ekran">
            <div class="kontakt">
                <ion-icon name="add-outline"></ion-icon><a>    </a><a>Kontakty:</a>
                <p>
                    <ion-icon name="home-outline"></ion-icon><a>     </a><a>Adres:</a><a id="link"> ul.Gitowska 33a</a>
                </p>
                <p>
                    <ion-icon name="mail-outline"></ion-icon><a>     </a><a>Email:</a> <a>obelixszkolka@zajebibi.pl</a>
                </p>
                <p>
                    <ion-icon name="call-outline"></ion-icon><a>     </a><a>Nr Telefonu:</a> <a id="link"> 999999999</a>
                </p>
            </div> 
        </div>';
    }
    
    
    public static function interfaceFooter(){
        echo '';
    }
}
?>