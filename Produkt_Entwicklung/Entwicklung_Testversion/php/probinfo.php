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

$_SESSION['probID'] = $probID;
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
    $pid = $row['PID'];
    $vorname = $row['Vorname'];
    $nachname = $row['Nachname'];
    $username = $row['Username'];
    $email = $row['Email'];
    $telnr = $row['TelNr'];
    $akte = $row['Aktenzeichen'];
    $betanfang = $row['Betreuungsanfang'];
    $betende = $row['Betreuungsende'];
    $bid = $row['BID'];
  }
}
?>

<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Nachrichten und Termine</title>
    <link rel="icon" type="image/x-icon" href="../css/image/sodibaer.png" >
    <!-- STYLESHEET CSS -->
    <link rel="stylesheet" href="../CSS/probinfo.css" >
    <link rel="stylesheet" href="../CSS/meineNachrichten.css">
    <!-- Stylesheet für Darstellung der Nachrichten -->
    <link rel="stylesheet" href="../CSS/meineNachrichten_bet.css">
    <!-- STYLESHEET SIDEBAR -->
    <link rel="stylesheet" href="../CSS/sidebar.css">
    <!-- SCRIPT SIDEBAR -->
    <script src="../javascript/jquery-3.4.1.js"></script>
    <script src="../javascript/sidebar.js"></script>
	  <script src="../javascript/message_bet.js"></script>
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
	  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="../javascript/feather.js"></script>
    <!--BOOTSRTRAP ANIMATION-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">

    <!-- BOOTSTRAP SCRIPT-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
	/* Style von Detei upload*/

	 $("#bild-absenden").hide();

    $(document).ready(function(){

        $('input[type="file"]').change(function(e){

            var fileName = e.target.files[0].name;

			var neu = fileName;
			document.getElementById('file-anzeige')
			.innerHTML = neu;

			document.getElementById("bild-absenden").classList.remove("btn-unsichtbar");
			document.getElementById("bild-absenden").classList.add("btn-outline-success");
        });

    });

</script>
  </head>

  <body>
  <header>

  <nav class="navbar navbar-expand-lg navbar-light flex-nowrap">

   <a class="navbar-brand w-100" href="#">
      <img src="../CSS/image/logoohneschatten.png"  width="50" height="50" alt="Logo" > &nbsp;&nbsp;SoDi4U
		</a>
    <div class="w-100"><!--spacer--></div>
    <div class="w-100"><!--spacer--></div>
    <div class="w-100"><!--spacer--></div>
    <div class="w-100"><!--spacer--></div>
    <div class="w-100"><!--spacer--></div>
     <div class="navbar-collapse collapse w-100" id="navbar5">
        <ul class="navbar-nav mx-auto">
		<!-- Aktuelle Seite -->
      <li class="nav-item active">
        <a class="nav-link" href="../php/index_betreuer.php">Startseite<span class="sr-only">(current)</span></a>
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
          <table class="">
            <tr>
              <form  id="msgform" method="POST">
                <td>
                  <textarea class="nachrichtenfeld" id="textfeld" name="textarea1" value="" placeholder="Meine Nachricht"></textarea>
                  <input id="terPID" name="hiddenProbID" type='hidden' value="<?php echo $probID?>">
                </td>
                <td>
          		    <button class="abschicken button-sodi btn-outline-sodi margin rounded-pill" type="submit" name="signup-submit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg> </button>
          		  </td>
          	   </form>
            </tr>
           </table>
          <!--
          <table class="">
            <form id="fileform" method="POST" enctype="multipart/form-data">
              <tr>
                <td>
                  <input id="upload" name="upload" type="file" >
                   <input id="terPID" name="hiddenProbID" type='hidden' value="<?php echo $probID?>">
                </td>
              </tr>
              <tr>
                <td>
                  <button type="submit" class="">Absenden</button>
                </td>
              </tr>
            </form>
          </table>
          -->
          <table class="">
            <form class="" action="upload_bet.php" method="POST" name="DAFORM" enctype="multipart/form-data" target="_self">
              <tr>
                <td>
                 <!-- <input id="upload" name="upload" class="" type="file" >-->
				  <label for="file-upload" class="custom-file-upload">
					<i class="fa fa-cloud-upload"> </i> Datei hochladen
					</label>

					<input id="file-upload" id="dateien" name="upload" type="file"/>

					<font id="file-anzeige"> </font>

                   <input id="terPID" name="hiddenProbID" type='hidden' value="<?php echo $probID?>">
                </td>
              </tr>
              <tr>
                <td>
                  <button id="bild-absenden" type="submit" class="btn btn-unsichtbar"><i data-feather="send"></i> &nbsp; Datei absenden</button>
                </td>
              </tr>
            </form>
          </table>
		  <script>
			feather.replace()
		  </script>
          <form id="saveMsgFeed" method='POST' action ="messageFeed.php">
            <input type="submit" value='Nachrichtenfeed herunterladen'>
            <input type='hidden' value='<?php echo $_SESSION['userId'] ?>' name='userID'>
            <input type='hidden' value='<?php echo $_SESSION['probID'] ?>' name='probID'>
            <input type='hidden' value='<?php echo $_SESSION['rolle'] ?>' name='rolle'>
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
             <div class="col-lg-8 col-md-9 col-sm-6">
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
                        <form action="probinfo_verwalten.php" method="post">
                          <input type = "hidden" name = "pid" value = "<?php echo $pid; ?>">
                          <input type = "hidden" name = "vorname" value = "<?php echo $vorname; ?>">
                          <input type = "hidden" name = "nachname" value = "<?php echo $nachname; ?>">
                          <input type = "hidden" name = "username" value = "<?php echo $username; ?>">
                          <input type = "hidden" name = "email" value = "<?php echo $email; ?>">
                          <input type = "hidden" name = "telnr" value = "<?php echo $telnr; ?>">
                          <input type = "hidden" name = "akte" value = "<?php echo $akte; ?>">
                          <input type = "hidden" name = "betanfang" value = "<?php echo $betanfang; ?>">
                          <input type = "hidden" name = "betende" value = "<?php echo $betende; ?>">
                          <input type = "hidden" name = "bid" value = "<?php echo $bid; ?>">
                          <button class="btn btn-outline-danger" type="submit">Proband bearbeiten</button>
                        </form>
                      </div>
                <div class="col-lg-1 col-md-3 col-sm-6 col-back">
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
          <h1 class="animated fadeInRight	 delay-1s">
            <?php
            // Info des ausgewählten Probandes
            foreach ($probInfo as $info) {
            echo "".$info['Vorname']." ".$info['Nachname'];
            }
            ?>
            </h1>
            <?php include 'FullCalendarProband.php';?>
          </div>
          <div class="col-lg-6 col-md-8">
          <h1 class="animated fadeInRight	 delay-0.5s">Mein Kalender</h1>
            <?php include 'FullCalendar.php';?>
          </div>
        </div>
      </div>

      <!--Footer-->
      <footer id="sticky-footer" class="py-2 bg-dark text-white-50">
        <div class="container footer-container">
          <li>
            <a href="datenschutz.html">Datenschutz</a>
          </li>
          <li>
            <a href="impressum.html">Impressum</a>
          </li>
          <li>
            <a href="kontakt.html">Kontakt</a>
          </li>
        </div>
      </footer>

  </body>
</html>
