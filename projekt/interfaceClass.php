<?php
require_once("config.class.php");
class InterfaceClass extends MainClass {
    public static function interfaceHeader(){
        if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true){
            echo"<button class='button'><a href='logout.php'>Logout</a></button>";
        }
        else {
            echo "<button class='button'><a href='login.php'>Login</a></button>";
        }
    }

    public static function interfacePanel(){
        if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true) { 
            echo "
            <div class='panel'>
                    <h3 class='tytul'>Wrzucanie zdjęć</h3>
                    <hr style='border-top:1px dotted #ccc;'/>
                    <form method='POST' action='upload.php' enctype='multipart/form-data'>
                        
                        <div class='form-inline'>
                            <label>Wrzuc tutaj</label>
                            <input type='file' name='image' class='form-control' required='required'/>
                            <button class='button' name='upload'><ion-icon name='cloud-upload-outline'></ion-icon></span>Upload</button>
                            <p style='font-size: 9px;'>     mozesz wrzucic zdjęcia tylko w formacie(.jpg, .png, .gif, .jpeg), oraz maksymalna waga pliku to 5 MB</p>
                        </div>
                    </form>
                    <br/>
                </div>
            ";
        }
    }
    public static function interfaceNota(){
        if (!isset($_SESSION['signed_in'])) {
            echo " <p class='nota'>Musisz sie zalogowac by móc wrzucać zdjęcia</p>";
        }
    }
    
    public static function interfaceFooter(){
        echo "<p> Strona stworzona przez Jana Nowickiego i Jakuba Wyszyńskiego</p>";
    }
    public static function printHeroSection($title, $description) {
        echo "
        <section class='hero'
            <h1>$title</h1>
            <p>$description</p>
            <button type=''>
                <a>lorem</a>
            </button>
        </section>";
        
    }
    public static function interfaceNota1()
    {
        if (isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true) {
            echo '
        <section class="hero">
            <h1>Witaj '.$_SESSION["user_name"].'#'.$_SESSION["id"].'</h1>
            <p>Witaj w galerii publicznej! Jesteśmy tu po to, aby dzielić się z Tobą naszymi najnowszymi pracami i zapewniać Ci inspirację i wrażenia wizualne. Przeglądaj nasze ekspozycje, korzystaj z naszych usług artystycznych oraz doświadcz wyjątkowych przeżyć. Miło Cię widzieć!</p>
        </section>';
        }
    }
    public static function interfaceNota2($title, $description)
    {
        if (isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true) {
            echo "
        <section class='hero'>
            <h1>$title</h1>
            <p>$description</p>
        </section>";
        }
    }
    public static function interfaceNota3(){
        if (!isset($_SESSION['signed_in'])) {
            echo " <p class='nota'>Musisz sie zalogowac by wrzucic zdjecia</p>";
        }
    }
}
?>