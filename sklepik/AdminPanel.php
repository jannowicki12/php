<?php
include "dbconnect.php";
include "AdminClass.php";
session_start();
$username = $_SESSION['email'];
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
    $newmovieid = intval($getidres['id']) + 1;

    $imgname = $_FILES['zdj']['name'];
    $extension = pathinfo($imgname, PATHINFO_EXTENSION);
    $nowanazwa = $newmovieid.'.'.$extension;

    $filename = $_FILES['zdj']['tmp_name'];
    move_uploaded_file($filename, 'images/'.$nowanazwa);
    $nazwa = $_POST['nazwa'];
    $cena = $_POST['cena'];
    $opis = $_POST['opis'];
    $ilosc = $_POST['ilosc'];
    $path = "images/".$nowanazwa;
    $dodawanieproduktu = "INSERT INTO `product`(`id`, `name`, `img`, `price`, `desc`, `count`) VALUES ('$newmovieid','$nazwa','$path','$cena','$opis','$ilosc')";
    $connection->query($dodawanieproduktu);
    header("Location: AdminPanel.php?panel=dodajprodukt");
}
if(isset($_POST['deluser'])){
    $iduser = $_POST['iduser'];
    $connection->query("DELETE FROM users WHERE id = '$iduser'");
    header("Location:AdminPanel.php?panel=uzytkownicy");
}
if(isset($_POST['delprodukt'])){
    $idproduktu = $_POST['idprodukt'];
    $connection->query("DELETE FROM product WHERE id = '$idproduktu'");
    header("Location:AdminPanel.php?panel=listaproduktow");
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
    <title>Panel administratora</title>
</head>
<body>
<div class="nawigacyjny">
        <header>
            <div class='header__container'>
                <h4 style='color:white;'>LOGO</h4>
                <nav>
                    <ul>
                        <li><a href='index.php' style='color:white;'>Home</a></li>
                        <li><a href='shopPage.php' style='color:white;'>Sklep</a></li>
                        <li><a style='color:white;'>About Us</a></li>
                        <li><a style='color:white;'>Contact</a></li>
                        <li><a href='logout.php' style='color:white;'>Wyloguj</a></li>
                    </ul>
                </nav>
            </div>
        </header> 
</div>
<div class="container">
    <div class="kategorie">

        <a href="AdminPanel.php?panel=uzytkownicy"> <h3 style='color: blue;'> Użytkownicy</h3></a>
        <a href="AdminPanel.php?panel=dodajprodukt"> <h3 style='color: green;'> dodaj produkt </h3></a>
        <a href="AdminPanel.php?panel=listaproduktow"> <h3 style='color: red;'> lista produktow </h3></a>
    </div>
    <div class="tools">
        <?php
        $admin = new AdminClass($username);
        if(isset($_GET['panel'])){
            if($_GET['panel'] == "uzytkownicy"){
                $admin->wyswietluserow();
            }
            if($_GET['panel'] == "dodajprodukt"){
                $admin ->dodajprodukt();
            }
            if($_GET['panel'] == "listaproduktow"){
                $admin ->listaproduktow();
            }


        }
        ?>
    </div>


</div>


</body>
</html>
