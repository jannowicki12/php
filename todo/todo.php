<?php
require_once "LayoutClass.php";
$user = $_SESSION['username'];
include "dbconnect.php";
$db = new db();
$connect = $db -> connectcor();

if(!isset($_SESSION['email'])){
    header('Location: login.php');
}
if (isset($_POST['addBtn']))
{
	$titleAdd = $_POST['titleAdd'];
	$detailAdd = $_POST['detailAdd'];
	$day1 = strtotime($_POST["oddata"]);
	$day2 = strtotime($_POST["dodata"]);
	$status = "ToDo";
	$username = $_SESSION['username'];
	$errors = array();
	$isadminquery = "SELECT * FROM users WHERE username = '$username'";
	$select = mysqli_query($connect, $isadminquery);
	while ($res = mysqli_fetch_assoc($select)){
		if (empty($titleAdd) || empty($detailAdd || empty($day1) || empty($day2)))
		{
			$errors[] = 'Sprawdz wszystkie pola';
		}


		if (empty($errors))
		{
			if ($res['rank'] == 2) {
				$SQLinsert = ("INSERT INTO `todolist`(`id`, `user`, `tytul`, `opis`, `status`, `date`, OdDaty, DoDaty) VALUES ('NULL', '$user', '$titleAdd', '$detailAdd', '$status', UNIX_TIMESTAMP(), '$day1', '$day2')");
				$connect->query($SQLinsert);
				header("Location: todo.php");
				echo '<div class="nNote nSuccess hideit"><p><strong>SUCCESS: </strong>Wpis wrzucony!</p></div>';
			}
			if ($res['rank'] == 1) {
				$check_user_exists = "SELECT * FROM todolist WHERE user = '$username' LIMIT 10";
				$result = $connect->query($check_user_exists);
				if ($result->num_rows >= 10) {
					echo "masz limit 10 todo, usun jezeli chcesz miec slota";
				}
				else {
					$SQLinsert = ("INSERT INTO `todolist`(`id`, `user`, `tytul`, `opis`, `status`, `date`, OdDaty, DoDaty) VALUES ('NULL', '$user', '$titleAdd', '$detailAdd', '$status', UNIX_TIMESTAMP(), '$day1', '$day2')");
					$connect->query($SQLinsert);
					header("Location: todo.php");
					echo '<div class="nNote nSuccess hideit"><p><strong>SUCCESS: </strong>Wpis wrzucony!</p></div>';
				}
			}
			else {
				$check_user_exists = "SELECT * FROM todolist WHERE user = '$username' LIMIT 5";
				$result1 = $connect->query($check_user_exists);
				if ($result1->num_rows >=5) {
					echo "masz limit 5 todo, usun jezeli chcesz miec slota";
				}
				else {
					$SQLinsert = ("INSERT INTO `todolist`(`id`, `user`, `tytul`, `opis`, `status`, `date`, OdDaty, DoDaty) VALUES ('NULL', '$user', '$titleAdd', '$detailAdd', '$status', UNIX_TIMESTAMP(), '$day1', '$day2')");
					$connect->query($SQLinsert);
					header("Location: todo.php");
					echo '<div class="nNote nSuccess hideit"><p><strong>SUCCESS: </strong>Wpis wrzucony!</p></div>';
				}
			}
		}
		{
			echo '<div class="nNote nFailure hideit"><p><strong>ERROR:</strong><br />';
			foreach($errors as $error)
			{
				echo '- '.$error.'<br />';
			}
			echo '</div>';
		}
	}
}
if (isset($_POST['powrot'])) {
	header('Location: index.php');
}
if(isset($_POST['deltodo'])) {
	$idtodo = $_POST['idlist'];
    $connect->query("DELETE FROM todolist WHERE id = '$idtodo'");
    setcookie("powiadomienie", "User todo deleted successfully!");
    header("Location:todo.php");
}
if(isset($_POST['edittodo'])) {
	include "db.php";
    $idlist = $_POST['idlist'];
    $editstatus = $_POST['editstatus'];
    $zmianasql = " UPDATE todolist SET status='$editstatus' WHERE id='$idlist'";
    $connection->query($zmianasql);
    header("Location:todo.php");
}
?>


<!DOCTYPE html>
<html lang="pl">
	<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel ToDo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<style>
		.ToDo {
			background-color: rgb(146, 30, 32);
		}
		.InProgress {
			background-color: rgb(219, 141, 32);
		}
		.Done {
			background-color: rgb(0, 95, 255);
		}
	</style>
	</head>
	<body>
	<?php
        require_once "LayoutClass.php";
        LayoutClass::PrintHeader();
      ?>
	<div class="titleArea">
        <div class="wrapper">
            <div class="pageTitle">
                <h3 class="h3">Lista ToDo</h3>
            </div>
        </div>
    </div> 
    <div class="line"></div>
    <div style="width:600px;">
		<form action="" class="form-control" method="POST">
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
						<div class="mb-3">
							<label>Od - Do</label>
							<div class="formRight"><input type="date" name="oddata" id="oddata"><input type="date" name="dodata" id="dodata"></div></div>
							<div class="clear"></div>
						</div>
						<br>
						<div class="formRow">
							<button class="btn btn-primary" type="submit" value="Add" name="addBtn" class="add">Dodaj do listy ToDo</button>
							<button class="btn btn-secondary" type="submit" value="powrot" name="powrot" class="powrot">Strona głowna</button>

							<div class="clear"></div>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
		<form action="" class = "form" method="POST">
		<div class="widget container mt-5 my-5">
			<h6>Lista ToDo</h6>
				<table class="table table-bordered border-primary">
				  <thead>
					  <tr>
						  <td class="table-title">Tytul</td>
						  <td class="table-description">Opis</td>
						  <td class="table-date">Utworzono</td>
						  <td class="table-oddaty"> Od </td>
						  <td class="table-dodaty"> Do </td>
						  <td class="table-status">Status</td>
						  <td class="table-editstatus">Edit</td>
						  <td class="table-delete">Delete</td>
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
						$dodaty = $row['DoDaty'];
						$oddaty = $row['OdDaty'];
						$progressShow = $row['status'];
						$rowID = $row['id'];
						echo '<tr class='.$progressShow.'>
						<td class="titletytul">'.htmlentities($titleShow).'</td>
						<td class="detailopis">'.htmlentities($detailShow).'</td>
						<td class="detailopis">'.date("d-m-Y",$dateShow).'</td>
						<td>'.date('d-m-Y',$oddaty).'</td>
						<td>'.date('d-m-Y',$dodaty).'</td>
						<td><form action="todo.php" method="post"><select name="editstatus" id="editstatus" class="form-select"><option selected>'.$progressShow.'</option><option value="ToDo">To Do</option><option value="InProgress">In Progress</option><option value="Done">Done</option></form></td>
						<td class="detailstatus"><form action="todo.php" method="post"><input type="hidden" name="idlist" value="'.$rowID.'"><input id="zmienedittodobutton" type="submit" name="edittodo" value="Edit!" class="btn btn-warning"></form></td>
						<td class="detaildelete"><form action="todo.php" method="post"><input type="hidden" name="idlist" value="'.$rowID.'"><input name="deltodo" type="submit" value="Delete" class="btn btn-danger"></form></td>
						</tr>';
					}
				  ?>

				  </tbody>

        </div>
	</form>
    </div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
	</body>
</html>