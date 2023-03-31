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
            <a href='productPage.php?product_id=$id'>
                <div>
                    <img src='$img' alt='img' style='height: 250px;' />
                    <h3 class='product_name'>$name</h3>
                    <p class='price_product'>$price PLN</p>

                </div>
            </a>
        ";
    }

    public static function getProducts() {
        $connection = SystemClass::dbConnect();
        $sql = "SELECT * FROM product";
        echo "
            <section class='shop_category'>
            <ul>
                <li class='category_ref'>Category 1</li>
                <li class='category_ref'>Category 2</li>
                <li class='category_ref'>Category 3</li>
            </ul>
            </section>
            <section class='shop_products'>
        ";
            $result = mysqli_query($connection, $sql);
            while($row = mysqli_fetch_assoc($result)) {
                LayoutClass::printTile($row);
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