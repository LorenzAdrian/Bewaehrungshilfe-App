<?php
//include '../includes/events_aktualisieren.inc.php';

include 'dbh.inc.php';
if(!isset($_SESSION))
{
      session_start();
}

// Check user login or not
if(!isset($_SESSION['userId'])){
    header('Location: login.php');
}

// logout

if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="de" dir="ltr">

<head>

  <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	 <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
	integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <!--Javascript Datei-->
  <script src="../javascript/index_admin.js"></script>

  <!--- Pfad zur style.css--------------------------->
  <link rel="stylesheet" href="../CSS/admin_index.css">
  <link rel="stylesheet" href="../CSS/header_prob.css">
  <link rel="stylesheet" href="../CSS/footer_admin.css">
  <!--  Schriftart aus google fonts------------------>
  <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">

  <title>Start</title>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-sodi bg-light flex-nowrap nav-h">

   <a class="navbar-brand w-100" href="#">
          		   <img src="../CSS/image/LogoOhneSchatten.png"  width="50" height="50" alt="Logo" > &nbsp;&nbsp;SoDi4U
			</a>

		<form class="form-inline my-2 my-lg-0" method='post' action="">
            <button class="button-sodi btn-outline-sodi my-1 my-sm-0" name="but_logout" type="submit">Abmelden</button>
		</form>


  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar5" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  </nav>

  <hr class="hr-sodi"> <!-- Gehört zum Header -->

<div class="wrapper">

    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>Menü </h3>
        </div>

        <ul class="list-unstyled components">
                <p></p>
            <li>
              <a id="betlisteBtn" href="#">Betreuer verwalten</a>
              <!--
           <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Betreuer verwalten</a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li>
                        <a href="#betliste">Betreuer anzeigen</a>
                    </li>
                    <li>
                        <a href="#">Betreuer anlegen</a>
                    </li>
					<li>
                        <a href="#">Betreuer löschen</a>
                    </li>
                </ul>
              -->
            </li>
            <li>
              <a id="adminlisteBtn" href="#">Administratoren verwalten</a>
              <!--
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Admin verwalten</a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                        <a href="#">Admin anzeigen</a>
                    </li>
                    <li>
                        <a href="#">Admin anlegen</a>
                    </li>
                     <li>
                        <a href="#">Admin löschen</a>
                    </li>
				         </ul>
                -->
			    </ul>
      </nav>

    <!-- Page Content -->
    <div id="content">
        <!-- We'll fill this with dummy content -->
		  <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
      <!--          <button type="button" id="sidebarCollapse" class="btn btn-info">
            <i class="fas fa-align-left"></i>
                <span>Toggle Sidebar</span> <span class="navbar-toggler-icon"></span>
            </button> -->
        </div>
      </nav>
	  <!--Begrüßungscontainer -->
  <div class="container hallo-container">
    <div class="row hallo-row">
      <div class="col-lg-12 hallo-col">
        <h2>Guten Tag <?php echo $_SESSION['vorname']; echo " "; echo $_SESSION['nachname'] ?> </h2>
      </div>
    </div>
  </div>
  <!-- DataTable Betreuer-Liste -->
  <div class="container table-container" id="betliste" style="display: none;">
    <div class="row">
      <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 text-col">
        <?php include 'dataTbl_bet.php';?>
        <br>
        <form class="buttonform" action="anlegen.php" method="post">
          <input class="btn btn-outline-danger" type="submit" name="bet-anlegen" value="Betreuer anlegen">
        <!--<input class="btn btn-outline-danger" type="button" name="" value="Proband löschen" > -->
        </form>
      </div>
    </div>
  </div>
  <!-- DataTable Admin-Liste -->
  <div class="container table-container" id="adminliste" style="display: none;">
    <div class="row">
      <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 text-col">
        <?php include 'dataTbl_admin.php';?>
        <br>
        <form class="buttonform" action="anlegen.php" method="post">
          <input class="btn btn-outline-danger" type="submit" name="admin-anlegen" value="Admin anlegen">
        <!--<input class="btn btn-outline-danger" type="button" name="" value="Proband löschen" > -->
        </form>
      </div>
    </div>
  </div>




    </div>
<footer id="sticky-footer" class="py-4 bg-light text-white-50">
      <div class="container text-center">

              <ul>
                <li>
                  <a href="Impressum_Proband.php">Impressum</a>
                </li>
                <li>
                    <a href="Datenschutz_Proband.php">Datenschutz</a>
                </li>
                <li>
                  <a href="Kontakt_Proband.php">Kontakt</a>
                </li>
              </ul>

      </div>
    </footer>
</div>

</body>
</html>
