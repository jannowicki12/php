<?php
require 'dbconnect.php';
$db = new db();
$connect = $db -> connectcor();
include "AdminClass.php";
require 'LayoutClass.php';
$username = $_SESSION['username'];
if(!isset($_SESSION['username'])){
    header("Location: notadmin.html ");
}
if(isset($_POST['deluser'])){
    $iduser = $_POST['iduser'];
    $connect->query("DELETE FROM users WHERE id = '$iduser'");
    setcookie("powiadomienie", "User account deleted successfully!");
    header("Location:AdminPanel.php?panel");
}
if(isset($_POST['deltodo'])){
    $idtodo = $_POST['idlist'];
    $connect->query("DELETE FROM todolist WHERE id = '$idtodo'");
    setcookie("powiadomienie", "User todo deleted successfully!");
    header("Location:AdminPanel.php?panel");
}
if(isset($_POST['editusers'])){
    include 'db.php';
    $iduser = $_POST['iduser'];
    $query = "SELECT username FROM users WHERE id = '$iduser'";
    $select = mysqli_query($connection, $query);
    $r=mysqli_fetch_assoc($select);
    $edituser = $_POST['edituser'];
    $editmail = $_POST['editmail'];
    $staryuser = $r['username'];
    $edithaslo = $_POST['edithaslo'];
    $editadmin = $_POST['editadmin'];
    $zmianasql = " UPDATE users SET username='$edituser', email='$editmail', password='$edithaslo', rank='$editadmin' WHERE id='$iduser'";
    $zmianawpisow = "UPDATE todolist SET user = '$edituser' WHERE user='$staryuser'";
    $connection->query($zmianasql);
    $connection->query($zmianawpisow);
    header("Location:AdminPanel.php?panel=users");
}
if(isset($_POST['edittodo'])) {
    include 'db.php';
    $idlist = $_POST['idlist'];
    $edittytul = $_POST['edittytul'];
    $editopis = $_POST['editopis'];
    $editstatus = $_POST['editstatus'];
    $zmianasql = " UPDATE todolist SET tytul='$edittytul', `opis`='$editopis', status='$editstatus', OdDaty='$day1', DoDaty='$day2' WHERE id='$idlist'";
    $connection->query($zmianasql);
    header("Location:AdminPanel.php?panel=listtodo");
}
$isadminquery = "SELECT * FROM users WHERE username = '$username'";
$select = mysqli_query($connect, $isadminquery);
while ($res = mysqli_fetch_assoc($select)){
    if($res['rank'] == 0 || $res['rank'] == 1){
        header("Location: notadmin.php");
    }
    if($res['rank'] == 2){
      echo '<!doctype html>
      <html lang="pl">
      <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Panel Admin</title>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
      </head>
      <body>';
        LayoutClass::PrintHeader();
      echo '
        <div class="container">
        <div class="kategorie">
    
            <a href="AdminPanel.php?panel=users"> <h3 style="color: blue;"> Users</h3></a>
            <a href="AdminPanel.php?panel=listtodo"> <h3 style="color: red;""> List todo </h3></a>
        </div>
        <div class="tools">
        ';
        $admin = new AdminClass($username);
        if(isset($_GET['panel'])){
            if($_GET['panel'] == "users"){
                $admin->wyswietluserow();
            }
            if($_GET['panel'] == "listtodo"){
                $admin ->listatodo();
            }


        }
        echo '
        </div>
        </body>';
    }
    if($res['rank'] > 2) {
        header("Location: notadmin.php");
    }
}

?>
</html>
