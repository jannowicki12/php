
<?php
ob_start();
require_once "LayoutClass.php";
include "db.php";
$juzwkoszyku = false;
$niemaszkonta = false;
if(isset($_POST['dodaj_do_koszyka'])){
    if(isset($_SESSION['username']) && $_SESSION['username']==true) {
      $username = $_SESSION['username'];
      $check_user_exists = "SELECT * FROM cart WHERE user='$username' LIMIT 1";
      $result = $connection->query($check_user_exists);
      if ($result->num_rows == 0) {
        $name = "Konto premium";
        $price = "20";
        $do_koszyka_sql = "INSERT INTO cart (user, name, price, date) VALUES ('$username', '$name', '$price', CURDATE())";
        $connection->query($do_koszyka_sql);
        header('Location: cart.php');
      }
      else {
        $juzwkoszyku = true;
      }
    }
    else {
        $niemaszkonta = true;
    }
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
      <?php
        LayoutClass::PrintHeader();
      ?>
    <div class="position-absolute top-50 start-50 translate-middle">
    <?php
      if($juzwkoszyku)
      {
          echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
          <strong>Error!</strong> Masz juz to w koszyku.
        </div>";
      }
      if($niemaszkonta)
      {
          echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
          <strong>Error!</strong> Nie jestes zalogowany.
        </div>";
      }
    ?>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Premium 30d</h5>
            <p class="card-text">Zakup premium:</p>
            <form method="post" action=''>
                <p class="card-text">20pln</p>
            <input name='dodaj_do_koszyka' type='submit' class='btn btn-info' value='Do Koszyka!'>
            </form>
</form>
        </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>