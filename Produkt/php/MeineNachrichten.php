<?php

#Seite für die Nachrichten des Probanden

/*require '../database/dbh.inc.php';*/

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

/*if($_SESSION['rolle'] == 'proband') {
	$personenID = 'PID';
  $sender = 'betreuer';
  $bsender = 1;
}
else {
	$personenID = 'BID';
  $sender ='empfaenger';
  $bsender = 0;
}

$event_sql =
"SELECT N.NID, N.Zeitstempel, N.Text, N.Status, N.BSender, N.dateiname, S.Vorname AS vorname_sender, S.Nachname AS nachname_sender FROM nachricht AS N INNER JOIN ".$sender." AS S ON N.BID = S.BID WHERE N.".$personenID." = ".$_SESSION['userId']." ORDER BY Zeitstempel";

//Mit mysqli_query wird die SQL-Abfrage ausgeführt. Die Methode liefert ein Objekt der Klasse mysqli_result zurück. $result enthält die Referenz auf dieses Objekt.
$result = mysqli_query($conn, $event_sql);

//Jetzt wird der Status der Nachrichten auf 'gelesen' gesetzt
$sql = "UPDATE nachricht SET Status='gelesen'
WHERE ".$personenID." = ".$_SESSION['userId']." AND BSender=".$bsender;
if ($conn->query($sql) != TRUE) {
    echo "Es ist ein Fehler aufgetreten: ".$conn->error;
}*/
?>

<!DOCTYPE html>
<html lang="de">

	<head>
    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!--- Pfad zu den CSS Dateien--------------------------->
		<link rel="stylesheet" href="../CSS/header_prob.css">
		<link rel="stylesheet" href="../CSS/footer_pro.css">
		<link rel="stylesheet" href="../CSS/meineNachrichtenPage.css">
		<!-- Stylesheet für Darstellung der Nachrichten -->
		<link rel="stylesheet" href="../CSS/meineNachrichten_pro.css">
		<!--Schriftart aus google fonts------------------>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway&display=swap">
		<!-- Stylesheet für Icons-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


  	<script src="../javascript/jquery-3.4.1.js"></script>
    <script src="../javascript/message.js"></script>

    <!--Bootstrap Layout -->
  	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
   	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<script src="../javascript/feather.js"></script>

  	<title>SoDi4U - Nachrichten</title>
	<link rel="icon" type="image/x-icon" href="../CSS/image/sodibaer.png" >

<!--<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>-->

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
<div id="seite">

<nav class="navbar navbar-expand-lg navbar-sodi bg-light flex-nowrap nav-h">

   <a class="navbar-brand w-100" href="#">
          		  <img src="../CSS/image/LogoOhneSchatten.png"  width="50" height="50" alt="Logo" > &nbsp;&nbsp;SoDi4U
			</a>

     <div class="navbar-collapse collapse w-100" id="navbar5">
        <ul class="navbar-nav mx-auto">
      <li class="nav-item">
        <a class="nav-link" href="../php/index_proband.php">Startseite</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../php/termine_proband.php">Termine </a>
      </li>
	  <!-- Aktuelle Seite -->
      <li class="nav-item active">
        <a class="nav-link" href="../php/MeineNachrichten.php">Nachrichten<span class="sr-only">(current)</span></a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="../php/Dokumente.php">Dokumente</a>
      </li>

	    <li class="nav-item">
        <a class="nav-link" href="Informationen.php">Informationen</a>
      </li>

	    <li class="nav-item">
        <a class="nav-link" href="Leitfaden_Proband.pdf">Leitfaden</a>
      </li>

	    <li class="nav-item">
        <a class="nav-link" href="Notfall.php">Notfall</a>
      </li>

	   <li class="nav-item">
        <a class="nav-link" href="passwortAendern.php">Passwort&nbsp;ändern</a>
      </li>

        </ul>
		<form class="form-inline my-2 my-lg-0" method='post' action="">
            <button class="button-sodi btn-outline-sodi my-1 my-sm-0" name="but_logout" type="submit">Abmelden</button>
		</form>
	</div>
    <div class="w-100">

	</div>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar5" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  </nav>

  <hr class="hr-sodi"> <!-- Gehört zum Header -->
<div class="container-fluid">
	<div class="row">
				<div class="col-xs-1 col-sm-1 col-md-2 col-lg-4 bg-color">

			</div>
			<div class="col-xs-10 col-sm-10 col-md-8 col-lg-4 text-center bg-color2">
			   <h4>Meine Nachrichten</h4>
			</div>

<div class="col-xs-1 col-sm-1 col-md-2 col-lg-4 bg-color">

			</div>

	</div>

  <div class="row">

			<div class="col-xs-1 col-sm-1 col-md-2 col-lg-4 bg-color">

			</div>
			<div class="col-xs-10 col-sm-10 col-md-8 col-lg-4 bg-color2">

		<main class="meinenachrichten">
      <div>
				<table class="nachrichten">
					<tr>
            <td id="probNachrichtenFenster">
              <?php
              include 'meineNachrichtenAnzeigen.php';
              ?>
             </td>
					</tr>
          <tr>
            <td>
              <?php include 'meineNachrichtenAbschicken.php'; ?>
            <!--
              <table class="" id="textfeld">
                <tr>
                  <form  id="msgform" method="POST">
                  <td class="feldnachricht">
            				<textarea class="nachrichtenfeld" name="textarea1" value="" placeholder="Meine Nachricht"></textarea>
                  </td>
                  <td>
            				<button class="abschicken" type="submit" name="signup-submit">Abschicken</button>
                  </td>
                  </form>
                </tr>
              </table>
            -->
            </td>
          </tr>
            <td>
              <tr>
                <?php include 'meineNachrichtenBild.php'; ?>
              <!--
                <table class="">
                  <tr>
        						<form class="" action="upload.php" method="POST" name="DAFORM" enctype="multipart/form-data" target="_self">
                    <input id="upload" name="upload" class="" type="file" >

        						<p class="textend"></p>
        						<button type="submit" class="">Absenden</button>
        						<button type="reset" class="">Zurücksetzen</button>
        					  </form>
                  </tr>
  				    </table>
            -->
					<br>
					<br>
					<br>
					<br>
            </tr>
          </td>
          <tr>
            <td>
              <form id="saveMsgFeed" method='POST' action ="messageFeed.php">
                <input type="submit" value='Nachrichtenfeed herunterladen'>
                <input type='hidden' value='<?php echo $_SESSION['userId'] ?>' name='userID'>
                <input type='hidden' value='<?php echo $_SESSION['probID'] ?>' name='probID'>
                <input type='hidden' value='<?php echo $_SESSION['rolle'] ?>' name='rolle'>
              </form>
            </td>
          </tr>
			</div>
		</main>
  </div>

<div class="col-xs-1 col-sm-1 col-md-2 col-lg-4 bg-color">

			</div>
	</div>

</div>


  <!--Footer-->
 <footer id="sticky-footer" class="mb-0 mt-footer py-4 bg-light text-white-50">
      <div class="pt-2 container text-center">

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
