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
                    <li><a href='AdminPanel.php'>Panel Admin</a></li>
                    <li><a href='cart.php'>Cart</a></li>
                    <li><a href='profil.php'>Profil</a></li>
                    <li><a href='logout.php'>Logout</a></li>";

            }
            else {
                $conditionRender ="
                <li><a href='cart.php'>Cart</a></li>
                <li><a href='profil.php'>Profil</a></li>
                <li><a href='logout.php'>Logout</a></li>";
            }
        }
        else {
            $conditionRender = "
                <li><a href='signInPage.php'>Login</a></li>
                <li><a href='signUpPage.php'>Sign Up</a></li>
            ";
        }
        echo "
        <header>
            <div class='header__container'>
                <h4>LOGO</h4>
                <nav>
                    <ul>
                        <li><a href='index.php'>Home</a></li>
                        <li><a href='shopPage.php'>Shop</a></li>
                        <li><a href='aboutus.php'>About Us</a></li>
                        <li><a href='contact.php'>Contact</a></li>
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
                    <input type='submit' value='Go to the product'>
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
                    <input type='submit' value='Go to the product'>
                </a>
            </div>
        ";
    }

    public static function getProducts() {
        $KategorieSet = false;
        $connection = SystemClass::dbConnect();
        $sql = "SELECT * FROM product";
        $najtanszy = "SELECT * FROM `product` ORDER BY `product`.`price` ASC";
        $najdrozszy = "SELECT * FROM `product` ORDER BY `product`.`price` DESC";
        
        echo '
        <style>
        color: #000;
        </style>

        <form action="shopPage.php" method="POST" class="sortowanie_form">
        <label for="kategorie">Choose category:</label>
        <input name="najdrozszy" type="submit" value="Sort by most expensive">
        <input name="najtanszy" type="submit" value="Sort by cheapest">
        <input name="reset" type="submit" value="Reset">
    </form>
        ';
        if(isset($_POST['najdrozszy'])) {
            $KategorieSet = true;
            $result = mysqli_query($connection, $najdrozszy);
            while($row = mysqli_fetch_assoc($result)) {
                LayoutClass::printKategoria($row);
            }
        }
        elseif(isset($_POST['najtanszy'])){
            $KategorieSet = true;
            $result = mysqli_query($connection, $najtanszy);
            while($row = mysqli_fetch_assoc($result)) {
                LayoutClass::printKategoria($row);
            }
        }
        elseif(isset($_POST['reset'])){
            $KategorieSet = true;
            $result = mysqli_query($connection, $sql);
            while($row = mysqli_fetch_assoc($result)) {
                LayoutClass::printKategoria($row);
            }
        }
        if($KategorieSet == false) {            
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
        $count = $row['count'];

        echo "
            <section class='product__container'>
                <img src='$img' alt='img' class='product_img' />
                <div class='product__content'>
                    <h2 class='titleproduct'>$name</h2>
                    <p class='product_desc'>$desc</p>
                    <p class='product_price'>$price PLN</p>
                    <p class='product_count'>There are $count pieces in stock</p>
                    <form action='productPage.php?product_id=$product_id' method='POST'>
                    <input name='dodaj_do_koszyka' type='submit' value='To cart!'>
                </div>
            </section>

        ";

        if(isset($_POST['dodaj_do_koszyka'])){
            if(isset($_SESSION['email'])){
                $mail = $_SESSION['email'];
                $sprilosc = "SELECT count FROM cart WHERE name = '$name' AND user = '$mail'";
                $spriloscquery = mysqli_query($connection, $sprilosc);
                if(mysqli_num_rows($spriloscquery) > 0 ){
                    setcookie("powiadomienie", "The product is already in the cart!");
                    header("Location: productPage.php?product_id=$product_id");
                }else{
                    $do_koszyka_sql = "INSERT INTO cart (name, price, user, count) VALUES ('$name', '$price', '$mail','1')";
                    $connection->query($do_koszyka_sql);
                    setcookie("powiadomienie", "Added to cart!");
                    header("Location: productPage.php?product_id=$product_id");
                }
            }else{
                setcookie("powiadomienie", "You must be logged!");
                header("Location: productPage.php?product_id=$product_id");
            }
        }
        if (isset($_COOKIE['powiadomienie'])) {
            $powiadomienie = $_COOKIE['powiadomienie'];
            echo "<div class='powiadomienie' id='mess' onclick='this.remove();'> <p>$powiadomienie</p> </div> ";
            setcookie("powiadomienie", "", time()-3600);
        }
    }


}  