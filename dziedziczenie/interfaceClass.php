<?php
require_once("config.class.php");
class InterfaceClass extends MainClass {
    public function logged()
    {
        if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true) {
            echo "
            <h1>widzisz to tylko dlatego ze jestes zalogowany</h1>
            <button>
            <a href='logout.php'>wyloguj</a>
            </button>";

        }
        
    }
    public static function interfaceHeader(){
        echo "Funkcja w InterfaceClass";
    }
    public static function interfaceFooter(){
        echo "Funkcja interfaceFooter";
    }
    public static function printHeroSection($title, $description) {
        echo "
        <section class='hero'
            <h1>$title</h1>
            <p>$description</p>
            <button type=''>
                <a href='index.php'>zaloguj sie</a>
            </button>
        </section>";
        
    }
}
?>