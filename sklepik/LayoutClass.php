<?php
session_start();

class LayoutClass {
    static function printHeader() {
        $conditionRender = "";
        if(isset($_SESSION["signedIn"]) && $_SESSION["signedIn"] === true ){
            include "dbconnect.php";
            $email = $_SESSION['email'];
            $isadminquery = "SELECT * FROM users WHERE email = '$email'";
            $select = mysqli_query($connection, $isadminquery);
            $res = mysqli_fetch_assoc($select);
            if($res['isadmin'] == 1){
                $conditionRender = "
                    <li><a href='AdminPanel.php'>Panel Admina</a></li>
                    <li><a href='logout.php'>Wyloguj się</a></li>
                ";

            }
            else {
                $conditionRender ="<li><a href='logout.php'>Wyloguj się</a></li>";
            }
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
                        <li><a href='index.php'>Home</a></li>
                        <li><a href='shopPage.php'>Sklep</a></li>
                        <li><a>About Us</a></li>
                        <li><a>Contact</a></li>
                        $conditionRender
                    </ul>
                </nav>
            </div>
        </header>
        ";
    }
    
    public static function printHero($title1, $description) {
        echo "<section class='hero'
        <h1>$title1</h1>
        <p>$description</p>
        </section>"; 
    }

    static function printFooter() {
        echo "<footer>

            <div class='footer__container'> 
                <h4> footer </h4>
            </div>
        
        </footer>";
    }

    public static function printTile($row) {
        $name = $row['name'];
        $price = $row['price'];
        $img = $row['img'];
        $id = $row['id'];

        echo "
            <div style='border:1px solid #000; height:360px; width:260px; padding:4px; float:left; margin:10px; text-align:center;'>
                <a href='productPage.php?product_id=$id'>
                    <img src='$img' alt='img' style='height: 250px;' />
                </a>
                    <h3 class='product_name'>$name</h3>
                    <p class='price_product'>$price PLN</p>
                <a href='productPage.php?product_id=$id'>
                    <input type='submit' value='Przejdz do produktu'>
                </a>
            </div>
        ";
    }
    public static function printKategoria($row) {
        $name = $row['name'];
        $price = $row['price'];
        $img = $row['img'];
        $id = $row['id'];

        echo "
            <div style='border:1px solid #000; height:360px; width:260px; padding:4px; float:left; margin:10px; text-align:center;'>
                <a href='productPage.php?product_id=$id'>
                    <img src='$img' alt='img' style='height: 250px;' />
                </a>
                    <h3 class='product_name'>$name</h3>
                    <p class='price_product'>$price PLN</p>
                <a href='productPage.php?product_id=$id'>
                    <input type='submit' value='Przejdz do produktu'>
                </a>
            </div>
        ";
    }

    public static function getProducts() {
        $KategorieSet = true;
        $connection = SystemClass::dbConnect();
        $sql = "SELECT * FROM product";
        $najtanszy = "SELECT * FROM `product` ORDER BY `product`.`price` ASC";
        $najdrozszy = "SELECT * FROM `product` ORDER BY `product`.`price` DESC";
        
        echo '
        <style>
        color: #000;
        </style>

        <form action="shopPage.php" method="POST" class="sortowanie_form">
        <label for="kategorie">Wybierz kategorie:</label>
        <input name="najdrozszy" type="submit" value="Sortuj od najdrozszych">
        <input name="najtanszy" type="submit" value="Sortuj od najtanszego">
    </form>
        ';
        if(isset($_POST['najdrozszy'])) {
            $KategorieSet = false;
            $result = mysqli_query($connection, $najdrozszy);
            while($row = mysqli_fetch_assoc($result)) {
                LayoutClass::printKategoria($row);
            }
        }
        elseif(isset($_POST['najtanszy'])){
            $KategorieSet = false;
            $result = mysqli_query($connection, $najtanszy);
            while($row = mysqli_fetch_assoc($result)) {
                LayoutClass::printKategoria($row);
            }
        }
        if($KategorieSet) {            
            $result = mysqli_query($connection, $sql);
            while($row = mysqli_fetch_assoc($result)) {
                LayoutClass::printTile($row);
            }
        }
        echo "
            </section>
        ";
    }

    public static function showProduct() {
        $connection = SystemClass::dbConnect();
        $product_id = $_REQUEST['product_id'];
        $sql = "SELECT * FROM product WHERE id=$product_id";
        $result = mysqli_query($connection, $sql);
        $row = mysqli_fetch_assoc($result);

        $img = $row['img'];
        $name = $row['name'];
        $desc = $row['desc'];
        $price = $row['price'];

        echo "
            <section class='product__container'>
                <img src='$img' alt='img' class='product_img' />
                <div class='product__content'>
                    <h2 class='titleproduct'>$name</h2>
                    <p class='product_desc'>$desc</p>
                    <p class='product_price'>$price PLN</p>
                    <button type='button' class='product_btn'> Dodaj do koszyka</button>
                </div>
            </section>

        ";
    }


}  