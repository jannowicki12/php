<?php
require_once "LayoutClass.php";
include "db.php";
if(!isset($_SESSION['email'])){
    header("Location: login.php");
}
$email = $_SESSION['email'];
$user = $_SESSION['username'];
$wybieranieuserasql = "SELECT id,email,rank, password from users WHERE email= '$email'";
$wynik = mysqli_query($connection, $wybieranieuserasql);
$profil = mysqli_fetch_assoc($wynik);

if(isset($_POST['zmiendane'])){
    $nowymail = $_POST['nowyemail'];
    $obecnymail = $_SESSION['email'];
    $nowehaslo = $_POST['nowehaslo'];
    $zmianasql = " UPDATE users SET email='$nowymail', password='$nowehaslo' WHERE email='$obecnymail'";
    $connection->query($zmianasql);
    header("Location: logout.php");

}
if(isset($_POST['usunkonto'])){
    $usun_konto_query = "DELETE FROM users WHERE email='$email'";
    $usun_listetodo_usera = "DELETE FROM todolist WHERE user='$user'";
    $connection->query($usun_konto_query);
    $connection->query($usun_listetodo_usera);
    header("Location: logout.php");
}

?>

<html lang="pl">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profil</title>
    <script type="text/javascript" src="assets/functions.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
<?php
        LayoutClass::printHeader();
?>

<div class="bodyprofilu">
<form action="profil.php" method="post" class="formularzzmiany">
        <label for="nowyemail" class="sr-only">Email:</label>
    <input type="text" class="form-control" id="nowyemail" name="nowyemail" disabled value="<?php echo $profil['email']?>"> <br>
    <label for="nowehaslo" class="sr-only">Haslo:</label>
    <input type="text" class="form-control" id="nowehaslo" name="nowehaslo" disabled value="<?php echo $profil['password']?>"> <br>
        <button type='button' id="pokazemail" onclick="Zmiendane()" class="zmiendanebutt"> <i class="fi fi-rr-refresh"></i> Zmien dane</button>
    <input id="zmiendanebutton" type="submit" name="zmiendane" value="Zaktualizuj dane!" class="zaaktualizujdanebutt" disabled>
    <input type="submit" name="usunkonto" onclick="return confirm('Do you really want to delete your account? This operation cannot be changed')" class="usunkontobutt" value="Usun Konto">
</form>
</div>
<div class="bodyprofilu">
<?php
$username = $_SESSION['username'];
$isadminquery = "SELECT * FROM users WHERE username = '$username'";
$select = mysqli_query($connection, $isadminquery);
while ($res = mysqli_fetch_assoc($select)){
    if ($res['rank'] == 1) {
        echo "<p>Posiadasz plan premium</p>";
    }
    if ($res['rank'] == 2) {
        echo "<p>Jestes Administratorem</p>";
    }
    if ($res['rank'] == 0) {
        echo "<p>Nie posiadasz planu premium</p>";
    }

}
?>
</div>

</body>

</html>