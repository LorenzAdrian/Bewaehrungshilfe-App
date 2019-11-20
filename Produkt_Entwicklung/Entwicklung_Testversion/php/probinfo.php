<?php

if(!isset($_SESSION))
{
      session_start();
}

// Check user login or not
if(!isset($_SESSION['userId'])){
    header('Location: login.php');
}

require "../database/dbh.inc.php";


$betrID = $_POST['betreuer'];
$probID = $_POST['proband'];

//include "Nachrichten_menu.php";

if(!isset($_SESSION['probID'])){
$_SESSION['probID'] = $probID;}
/*
else {
	$probID = $_POST['terPID'];
}*/

$sql = "SELECT * FROM proband WHERE PID = ".$probID;
$result = mysqli_query($conn, $sql);
$probInfo = array();
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)){
    $probInfo[] = $row;
  }
}
?>

<!DOCTYPE html>
<html lang="de">
  <head>
    <!-- GOOGLE FONTS-->
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Proband: Nachrichten und Termine</title>
    <!-- STYLESHEET CSS -->
    <link rel="stylesheet" href="../CSS/probinfo.css" >
    <!-- STYLESHEET SIDEBAR -->
    <link rel="stylesheet" href="../CSS/sidebar.css">
    <!-- SCRIPT SIDEBAR -->
    <script src="../javascript/jquery-3.4.1.js"></script>
    <script src="../javascript/sidebar.js"></script>
	  <script src="../javascript/message.js"></script>
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
	  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- BOOTSTRAP SCRIPT-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  </head>

  <body>
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
        <a class="nav-link" href="#">Termine</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Nachrichten</a>
      </li>
	    <li class="nav-item">
        <a class="nav-link" href="#">Leitfaden</a>
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
    <!-- Hier wird der Inhalt der Nachrichten-Sidebar erstellt -->
    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <div id='msgdiv'></div>
      <form  id="msgform" method="POST">
				<span>Nachrichten</span>
				<br>
				<textarea name="textarea1" rows="5" cols="50" value=""></textarea>
				<input name="hiddenProbID" type='hidden' value="<?php echo $probID?>">
				<br>
				<button type="submit" name="signup-submit">Abschicken</button>
				<br><br><br><br><br><br>
		    </form>
    </div>
    <!-- Zurück-Button -->
    <div id="main">
      <div class="zuruck">
        <form action="index_betreuer.php" method="post">
            <input type="submit"  value="Zurück">
        </form>
      </div>
      <div>
        <!-- <details> ist ein HTML5-Element, das das Ausklappen ermöglicht. Kein Button notwendig. <summary> legt den Text fest, der vor dem Ausklappen sichtbar ist. -->
        <details>
  			<summary class="termin"> Termin anlegen </summary>
  			<form action = "terminetest_insert.php" method = "post">
  			  <p>
          Titel: <input name = "terTitel" type = "text" size = "50" placeholder = "Titel">&nbsp;&nbsp;&nbsp;
          <br>
          <br>
          Beschreibung: <input name="terBeschreibung" type="text" size="50" placeholder="Beschreibung"
          </p>
  			  <p> Datum: <input name = "terDatum" type = "date">&nbsp;&nbsp;&nbsp;
            Beginn: <input name = "terStart" type = "time">&nbsp;&nbsp;&nbsp;
            Ende: <input name = "terEnde" type = "time"></p>
          <p> </P>
  			  <p><!-- Status: --><input name = "terStatus" type = "hidden" value="2">  </p>
  			  <p><!-- PID: --><input name = "terPID" type = "hidden" value="<?php echo $probID ?>"></p>
  			  <p><!-- BID: --><input name = "terBID" type = "hidden" value="<?php echo $betrID ?>"> </p>
  			  <p>
  			  <input type = "submit" value = "Termin speichern"></p>
  			</form>
  		</details>
      </div>
      <!-- Element zum Einblenden der Nachrichten-Sidebar -->
      <div class="toggle"  id="msgbar">
        &#9776; Nachrichten
      </div>

      <!-- Kalender -->
      <div class="kalender">
        <div class="pkalender">
        <p class="ueberschrift">
        <?php
        // Info des ausgewählten Probandes
        foreach ($probInfo as $info) {
          echo "Proband: ".$info['Vorname']." ".$info['Nachname'];
          }
          ?>
        </p>
        <?php include 'FullCalendarProband.php';
        ?>
        </div>
        <div class="bkalender">
          <p class="ueberschrift">
            Mein Kalender
            </p>
        <?php include 'FullCalendar.php';
        ?>
        </div>
      </div>
    </div>
    <?php include '../includes/footer_betreuer.inc.php' ?>
  </body>
</html>
