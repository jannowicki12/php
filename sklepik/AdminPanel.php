<?php
include "dbconnect.php";
include "AdminClass.php";
session_start();
$username = $_SESSION['email'];
if(!isset($_SESSION['email'])){
    header("Location: notadmin.html ");
}
$isadminquery = "SELECT * FROM users WHERE email = '$username'";
$select = mysqli_query($connection, $isadminquery);
while ($res = mysqli_fetch_assoc($select)){
    if($res['isadmin'] != 1){
        header("Location: notadmin.html ");
    }
}

if(isset($_POST['dodajprodukt'])){
    $getid = "SELECT id from product ORDER BY id DESC LIMIT 0,1";
    $getidselect = mysqli_query($connection, $getid);
    $getidres = mysqli_fetch_assoc($getidselect);
    $newidproduct = intval($getidres['id']) + 1;

    $imgname = $_FILES['zdj']['name'];
    $extension = pathinfo($imgname, PATHINFO_EXTENSION);
    $nowanazwa = $newidproduct.'.'.$extension;

    $filename = $_FILES['zdj']['tmp_name'];
    move_uploaded_file($filename, 'images/'.$nowanazwa);
    $nazwa = $_POST['nazwa'];
    $cena = $_POST['cena'];
    $opis = $_POST['opis'];
    $ilosc = $_POST['ilosc'];
    $path = "images/".$nowanazwa;
    $dodawanieproduktu = "INSERT INTO `product`(`id`, `name`, `img`, `price`, `desc`, `count`) VALUES ('$newidproduct','$nazwa','$path','$cena','$opis','$ilosc')";
    $connection->query($dodawanieproduktu);
    setcookie("powiadomienie", "Added product to store!");
    header("Location: AdminPanel.php?panel");
}
if(isset($_POST['deluser'])){
    $iduser = $_POST['iduser'];
    $connection->query("DELETE FROM users WHERE id = '$iduser'");
    setcookie("powiadomienie", "User account deleted successfully!");
    header("Location:AdminPanel.php?panel");
}
if(isset($_POST['editusers'])){
    $iduser = $_POST['idusers'];
    $editmail = $_POST['editmail'];
    $starymail = $r['email'];
    $edithaslo = $_POST['edithaslo'];
    $editadmin = $_POST['editadmin'];
    $zmianasql = " UPDATE users SET email='$editmail', password='$edithaslo', isadmin='$editadmin' WHERE id='$iduser'";
    $zmianacart = "UPDATE cart SET user = '$editmail' WHERE user='$starymail'";
    $zmianaorders = "UPDATE orders SET email = '$editmail' WHERE email = '$starymail'";
    $connection->query($zmianasql);
    $connection->query($zmianacart);
    $connection->query($zmianaorders);
    header("Location:AdminPanel.php?panel=users");
}
if(isset($_POST['editprodukt'])){
    $idprodukt = $_POST['idproduktu'];
    $editname = $_POST['editname'];
    $editprice = $_POST['editprice'];
    $editdesc = $_POST['editdesc'];
    $editcount = $_POST['editcount'];
    $zmianasql = " UPDATE product SET name='$editname', price='$editprice', `desc`='$editdesc', count='$editcount' WHERE id='$idprodukt'";
    $connection->query($zmianasql);
    header("Location:AdminPanel.php?panel=listproduct");
}
if(isset($_POST['delprodukt'])){
    $idproduktu = $_POST['idprodukt'];
    $connection->query("DELETE FROM product WHERE id = '$idproduktu'");
    setcookie("powiadomienie", "Product deleted successfully!");
    header("Location:AdminPanel.php?panel");
}

?>
<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/admin.css">
    <script type="text/javascript" src="js/functions.js"></script>
    <title>Panel admin</title>
</head>
<body>
<div class="nawigacyjny">
        <header>
            <div class='header__container'>
                <h4 style='color:white;'>LOGO</h4>
                <nav>
                    <ul>
                        <li><a href='index.php' style='color:white;'>Home</a></li>
                        <li><a href='shopPage.php' style='color:white;'>Shop</a></li>
                        <li><a href='AboutUs.php'style='color:white;'>About Us</a></li>
                        <li><a href='Contact.php'style='color:white;'>Contact</a></li>
                        <li><a href='AdminPanel.php' style='color:white;'>Panel Admin</a></li>
                        <li><a href='cart.php' style='color:white;'>Cart</a></li>
                        <li><a href='logout.php' style='color:white;'>Logout</a></li>
                        <li><a href='profil.php' style='color:white;'>Profil</a></li>"
                    </ul>
                </nav>
            </div>
        </header> 
</div>
<div class="container">
    <div class="kategorie">

        <a href="AdminPanel.php?panel=users"> <h3 style='color: blue;'> Users</h3></a>
        <a href="AdminPanel.php?panel=addproduct"> <h3 style='color: green;'> Add product </h3></a>
        <a href="AdminPanel.php?panel=listproduct"> <h3 style='color: red;'> List product </h3></a>
    </div>
    <div class="tools">
        <?php
        $admin = new AdminClass($username);
        if(isset($_GET['panel'])){
            if($_GET['panel'] == "users"){
                $admin->wyswietluserow();
            }
            if($_GET['panel'] == "addproduct"){
                $admin ->dodajprodukt();
            }
            if($_GET['panel'] == "listproduct"){
                $admin ->listaproduktow();
            }


        }
        
        if (isset($_COOKIE['powiadomienie'])) {
            $powiadomienie = $_COOKIE['powiadomienie'];
            echo "<div class='powiadomienie' id='mess' onclick='this.remove();'> <p style='color: green;'>$powiadomienie</p> </div> ";
            setcookie("powiadomienie", "", time()-3600);
        }
        ?>
    </div>


</div>


</body>
</html>
