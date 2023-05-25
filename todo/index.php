<?php
ob_start();
?>
<!doctype html>
<html lang="en">
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
        require_once "LayoutClass.php";
        LayoutClass::PrintHeader();
      ?>
</ul>
    </div>
  </div>
</nav>
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
          include 'db.php';
					$query = "SELECT * FROM `todolist`";
					$select = mysqli_query($connection, $query);
					while ($row = mysqli_fetch_array($select)) {
						$titleShow = $row['tytul'];
						$detailShow = $row['opis'];
						$dateShow = $row['date'];
						$rowID = $row['id'];
						echo '<tr><td class="titletytul"><a href="wpis.php?id='.$row['id'].'">'.htmlentities($titleShow).'</a></td><td class="detailopis">'.htmlentities($detailShow).'</td><td class="detailopis">'.htmlentities($dateShow).'</td></tr>';
					}
				  ?>

				  </tbody>

        </div>
	</form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>