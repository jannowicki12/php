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
                    <h3 class='tytul'>Galeria</h3>
                    <hr style='border-top:1px dotted #ccc;'/>
                    <form method='POST' action='upload.php' enctype='multipart/form-data'>
                        
                        <div class='form-inline'>
                            <label>Wrzuc tutaj</label>
                            <input type='file' name='image' class='form-control' required='required'/>
                            <button class='button' name='upload'><ion-icon name='cloud-upload-outline'></ion-icon></span>Upload</button>
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
        echo "";
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
}
?>