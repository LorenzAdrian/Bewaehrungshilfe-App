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
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Proband: Nachrichten und Termine</title>
    <!-- STYLESHEET CSS -->
    <link rel="stylesheet" href="../CSS/probinfo.css" >
    <link rel="stylesheet" href="../CSS/meineNachrichten.css">
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

</header>

    <!-- Hier wird der Inhalt der Nachrichten-Sidebar erstellt -->
    <div class="container">
      <div class="row">
        <div class="col">
          <div id="mySidenav" class="sidenav bg-light" style="z-index:1000000">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          <div id='msgdiv'></div>
          <form  id="msgform" method="POST">
				  <span>Nachrichten</span>
				  <br>
				  <textarea name="textarea1" rows="5" cols="40" value=""></textarea>
				  <input name="hiddenProbID" type='hidden' value="<?php echo $probID?>">
				  <br>
				  <button type="submit" name="signup-submit">Abschicken</button>
				  <br><br><br><br><br><br>
		      </form>
          </div>
        </div>
      </div>
    </div>


     <!-- Element zum Einblenden der Nachrichten-Sidebar -->
    <div class="container message-container">
      <div class="row">
        <div class="col">
          <div class="toggle"  id="msgbar">
            &#9776; Nachrichten
          </div>
        </div>
      </div>
    </div>

        <!-- <details> ist ein HTML5-Element, das das Ausklappen ermöglicht. Kein Button notwendig. <summary> legt den Text fest, der vor dem Ausklappen sichtbar ist. -->
         <div class="container first-container">
           <div class="row">
             <div class="col-lg-9 col-md-9 col-sm-6">
                <details>
                  <summary class="btn btn-outline-danger" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"> Termin anlegen </summary>
                  <form class="form" action = "terminetest_insert.php" method = "post">
                    <br>
                    <p>
                    Titel: <input name = "terTitel" type = "text" size = "20" placeholder = "Titel">&nbsp;&nbsp;&nbsp;
                    Beschreibung: <input name="terBeschreibung" type="text" size="30" placeholder="Beschreibung"
                    </p>
                    <p> Datum: <input name = "terDatum" type = "date">&nbsp;&nbsp;&nbsp;
                    Beginn: <input name = "terStart" type = "time">&nbsp;&nbsp;&nbsp;
                    Ende: <input name = "terEnde" type = "time"></p>
                    <p> </P>
                    <p><!-- Status: --><input name = "terStatus" type = "hidden" value="2">  </p>
                    <p><!-- PID: --><input name = "terPID" type = "hidden" value="<?php echo $probID ?>"></p>
                    <p><!-- BID: --><input name = "terBID" type = "hidden" value="<?php echo $betrID ?>"> </p>
                    <p>
                    <input class="btn btn-outline-danger" type = "submit" value = "Termin speichern"></p>
                    </form>
                  </details>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-back">
                  <form action="index_betreuer.php" method="post">
                    <button class="btn btn-outline-danger" type="submit" value="Zurück">Zurück</button>
                  </form>
                </div>
            </div>
          </div>

      <!-- Kalender -->
      <div class="container container-calender">
        <div class="row">
          <div class="col-lg-6 col-md-8">
            <h1>
            <?php
            // Info des ausgewählten Probandes
            foreach ($probInfo as $info) {
            echo "Proband: ".$info['Vorname']." ".$info['Nachname'];
            }
            ?>
            </h1>
            <?php include 'FullCalendarProband.php';?>
          </div>
          <div class="col-lg-6 col-md-8">
            <h1>Mein Kalender</h1>
            <?php include 'FullCalendar.php';?>
          </div>
        </div>
      </div>

      <!--Footer-->
      <footer id="sticky-footer" class="py-2 bg-dark text-white-50">
        <div class="container footer-container">
          <small>Datenschutz</small>
          <small>Impressum</small>
          <small>Kontakt</small>
        </div>
      </footer>

  </body>
</html>
