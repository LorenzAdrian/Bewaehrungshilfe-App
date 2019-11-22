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
    
  <!--- Pfad zur style.css--------------------------->
  <link rel="stylesheet" href="../CSS/Betreuer_index.css">
  <!--Schriftart aus google fonts------------------>
  <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">

  <title>Start</title>
     
</head>

<body>
<!-- HEADER -->
<header>

<nav class="navbar navbar-expand-lg navbar-light bg-light flex-nowrap">

    <a class="navbar-brand w-100" href="#">
      <img src="../CSS/image/Baericon.jpeg"  width="30" height="30" alt="Logo" > &nbsp;&nbsp;Sodi 4u
	  </a>

     <div class="navbar-collapse collapse w-100" id="navbar5">
        <ul class="navbar-nav mx-auto">
		<!-- Aktuelle Seite -->
      <li class="nav-item active">
        <a class="nav-link" href="../php/index_betreuer.php">Startseite<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../php/probinfo.php">Termine</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../php/probinfo.php">Nachrichten</a>
      </li>
	    <li class="nav-item">
        <a class="nav-link" href="To_Do_Liste.php">Leitfaden</a>
      </li>
	    <li class="nav-item">
        <a class="nav-link" href="login.php">Abmelden</a>
      </li>
    </ul>
    </div>
    <div class="w-100"><!--spacer--></div>


  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar5" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  </nav>


<hr>
</header>

<div class="logo"></div>
<!---
<div class="hallobox">Hallo <?php echo $_SESSION["username"]; ?></div>

<div class="menu">

            <li><form method='post' action="">
					<img src="../CSS/image/logout.svg">
					<input type="submit" value="Logout" name="but_logout">
				</form>
			</li>
            <li><a href ="#"><img src="../CSS/image/user-circle.svg"></a>
            </li>
			<li><a href ="https://cssgridgarden.com/#de"><img src="../CSS/image/search.svg"></a>
            </li>
</div>
-->

<div class="container">
  <div class="row">
    <div class="col-6">
      <h1 class="uberschrift1">Probanden</h1>
    <?php include 'dataTbl.php';?>
  </div>
    <div class="col-6">
      <div class="calendar">
    <?php include 'FullCalendar.php';?>
<!--
	<a target="popup" onclick="window.open('', 'popup', 'width=580,height=360,scrollbars=no, toolbar=no,status=no, resizable=yes,menubar=no,location=no,directories=no,top=10,left=10')
	"href="termineinsert.php"><button type="submit"
	name="button">Termin anlegen</button></a>
<br>

   <a target="popup" onclick="window.open('', 'popup', 'width=580,height=360,scrollbars=no, toolbar=no,status=no, resizable=yes,menubar=no,location=no,directories=no,top=10,left=10')
	"href="terminedelete.php"><button type="submit"
	name="button">Termin loeschen</button></a>
-->
</div>
    </div>
    
  </div>
</div>

<?php include '../includes/footer_betreuer.inc.php' ?>
</body>
</html>


