<?php
require_once "LayoutClass.php";
$user = $_SESSION['username'];
include "dbconnect.php";
$db = new db();
$connect = $db -> connectcor();
if (isset($_POST['addBtn']))
{
	$titleAdd = $_POST['titleAdd'];
	$detailAdd = $_POST['detailAdd'];
	$errors = array();
	if (empty($titleAdd) || empty($detailAdd))
	{
		$errors[] = 'Sprawdz wszystkie pola';
	}
	if (empty($errors))
	{
		$SQLinsert = ("INSERT INTO `todolist`(`id`, `user`, `tytul`, `opis`, `date`) VALUES ('NULL', '$user', '$titleAdd', '$detailAdd', CURDATE())");
		$connect->query($SQLinsert);
		header("Location: todo.php");
		echo '<div class="nNote nSuccess hideit"><p><strong>SUCCESS: </strong>Wpis wrzucony!</p></div>';

	}
	else
	{
		echo '<div class="nNote nFailure hideit"><p><strong>ERROR:</strong><br />';
		foreach($errors as $error)
		{
			echo '- '.$error.'<br />';
		}
		echo '</div>';
	}
}
if (isset($_POST['powrot'])) {
	header('Location: index.php');
}

?>


<!DOCTYPE html>
<html lang="pl">
	<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	</head>
	<body>
	<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">ToDo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
      </ul>
      <ul class="navbar-nav  mb-2 mb-lg-0">
      <!-- if(isset($_SESSION["signedIn"]) && $_SESSION["signedIn"] === true ){
          echo "zalogowany";

        }
        else {
          echo "nie";
        } -->
      <?php
        LayoutClass::PrintHeader();
      ?>
</ul>
    </div>
  </div>
</nav>
		<div class="titleArea">
        <div class="wrapper">
            <div class="pageTitle">
                <h3 class="h3">Wpis</h3>
            </div>
        </div>
    </div> 
    <div class="line"></div>
    <div style="width:500px;">
		<form action="" class="form" method="POST">
				<fieldset>
					<div class="widget">
						<div class="mb-3">
							<label class="form-label">Tytul</label>
							<div class="form-label"><input type="text" name="titleAdd" maxlength="50" class="form-control form-control-sm" /></div>
							<div class="clear"></div>
						</div>
						<div class="mb-3">
							<label>Opis</label>
							<div class="formRight"><textarea style="resize:none;" rows="4" cols="" name="detailAdd" class="form-control form-control-sm"></textarea></div>
							<div class="clear"></div>
						</div>
						<br>
						<div class="formRow">
							<button class="btn btn-primary" type="submit" value="Add" name="addBtn" class="add">Dodaj wpis</button>
							<button class="btn btn-secondary" type="submit" value="powrot" name="powrot" class="powrot">Strona głowna</button>

							<div class="clear"></div>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
		<form action="" class = "form" method="POST">
		<div class="widget">
			<h6>Wpisy</h6>
			
				<table class="table table-bordered border-primary">
				  <thead>
					  <tr>
						  <td class="table-title">Tytul</td>
						  <td class="table-description">Opis</td>
						  <td class="table-date">Data</td>
					  </tr>
				  </thead>
				  <tbody>
				  <?php
					$query = "SELECT * FROM `todolist` WHERE `user` = '$user'";
					$select = mysqli_query($connect, $query);
					while ($row = mysqli_fetch_array($select)) {
						$titleShow = $row['tytul'];
						$detailShow = $row['opis'];
						$dateShow = $row['date'];
						$rowID = $row['id'];
						echo '<tr><td class="titletytul">'.htmlentities($titleShow).'</td><td class="detailopis">'.htmlentities($detailShow).'</td><td class="detailopis">'.htmlentities($dateShow).'</td></tr>';
					}

				//   $SQLSelect = "SELECT * FROM `todolist` ORDER BY `date` DESC WHERE `user` = '$user'";
                //   $select2 = mysqli_query($connect, $SQLSelect);
				//   while ($show = $SQLSelect -> fetch_assoc($select2))
				//   {
				// 	$titleShow = $show['tytul'];
				// 	$detailShow = $show['opis'];
				// 	$rowID = $show['id'];
				// 	echo '<tr><td class="titletytul">'.htmlentities($titleShow).'</td><td class="detailopis">'.htmlentities($detailShow).'</td></tr>';
				//   }
				  ?>

				  </tbody>

        </div>
	</form>
    </div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
	</body>
</html>