<?php
#Seite für die Nachrichten des Probanden

require '../database/dbh.inc.php';

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
    header('Location: Login.php');
}

if($_SESSION['rolle'] == 'proband') {
	$personenID = 'PID';
}
else {
	$personenID = 'BID';
}

$event_sql =
"SELECT N.NID, N.Zeitstempel, N.Text, N.Status, N.BSender, B.Vorname AS vorname_betreuer, B.Nachname AS nachname_betreuer FROM nachricht AS N INNER JOIN betreuer AS B ON N.BID = B.BID WHERE N.PID = ".$_SESSION['userId']." ORDER BY Zeitstempel";

$event_imgsql = "SELECT dateiname FROM fileupload WHERE PID = ".$_SESSION['userId']." ORDER BY Zeitstempel";

//Mit mysqli_query wird die SQL-Abfrage ausgeführt. Die Methode liefert ein Objekt der Klasse mysqli_result zurück. $result enthält die Referenz auf dieses Objekt.
$result = mysqli_query($conn, $event_sql);

$result1 = mysqli_query($conn, $event_imgsql);

$sql = "UPDATE nachricht SET Status='gelesen'
WHERE PID = ".$_SESSION['userId']." AND BSender=1";

if ($conn->query($sql) != TRUE) {
    echo "Es ist ein Fehler aufgetreten: ".$conn->error;
}

/*
#Alle Nachrichten des Gesprächspartners auf "gelesen" setzen.
if ($_SESSION['rolle'] == 'proband'){
	$sql = "UPDATE nachricht SET Status='gelesen'
	WHERE ".$personenID."=".$_SESSION['userId']."
	AND BSender= 1";
}
else if($_SESSION['rolle'] == 'betreuer'){
	$sql = "UPDATE nachricht SET Status='gelesen'
	WHERE ".$personenID."=".$_SESSION['userId']."
	AND BSender= 0";
}
if ($conn->query($sql) != TRUE) {
    echo "Es ist ein Fehler aufgetreten: ".$conn->error;
}
*/

 ?>

<!DOCTYPE html>
<html lang="de">
	<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!--- Pfad zur style.css--------------------------->
		<link rel="stylesheet" href="../CSS/style.css">
		<!--Schriftart aus google fonts------------------>
		<link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
		<!-- Stylesheet für Icons-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="../javascript/jquery-3.4.1.js"></script>
    <script src="../javascript/message.js"></script>
    <link rel="stylesheet" href="../CSS/meineNachrichten.css">

    <!-- Header-->
  	<script src="../javascript/header_pro.js"></script>
  	<?php include '../includes/header_pro.inc.php';?>
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  	<link rel="stylesheet" href="../CSS/header_pro.css" >
   	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

	   <title>Meine Nachrichten</title>

    <!--
    Kommentar: Style-CSS-Code befinden sich jetzt in "meineNachrichten.css"
    <style>
    .meinenachrichten {
      font-family: 'Assistant', sans-serif;
    }
    .nachrichten {
      min-width: 300px;
      max-width: 40%;
    }
    .nachricht {
      margin-top: 1em;
      margin-bottom: 1em;
      width: 80%;
      padding: 0.5em;
      border-radius: 1em;
    }
    .proband {
      margin-left: 3em;
    }
    .betreuer {
      margin-right: 3em;
    }
    .betreuer.nachricht.neu {
      background-color: darkred;
      color: ivory;
    }
    .betreuer.nachricht {
      background-color: darkblue;
      color: ivory;
    }
    .proband.nachricht{
      background-color: darkgrey;
    }
    .betreuername {
      font-weight: bold;
    }
    .datumuhrzeit {
      font-size: 0.8em;
      text-align: right;
    }
    .datumuhrzeit.betreuer {
      color: silver;
    }
    .datumuhrzeit.proband {
      color: dimgray;
    }
    .nachrichtenfeld {
      border-width: thin;
      border-style: solid;
      border-color: darkgrey;
      border-radius: 1em;
      padding: 0.5em;
      width: 100%;
      height: 3em;
      font-family: 'Assistant', sans-serif;
    }
    .feldnachricht {
      min-width: 80%;
    }

    .abschicken{
      margin-left: 50px;
    }
  </style>-->

	</head>
	<body>
		<main class="meinenachrichten">
      <div>
				<table class="nachrichten">
					<tr>
            <td id="probNachrichtenFenster">
              <?php

              while ($dsatz = mysqli_fetch_assoc($result))
              {
                //Erzeugt aus der Zeichenkette des Zeitstempels ein DateTime-Objekt
                setlocale(LC_ALL, "");
                $datum = date_create($dsatz['Zeitstempel'])->getTimestamp();
                //Wenn der Betreuer der Sender der Nachricht und die Nachricht neu ist.
                if($dsatz['BSender'] == 1 && $dsatz['Status'] == 'neu')
                  {
                  echo '<table class="betreuer nachricht neu"><tr class="betreuername"><td>'.$dsatz['vorname_betreuer'].' '.$dsatz['nachname_betreuer'].'</td></tr><tr class="nachricht"><td>'
                      .$dsatz['Text'].'</td></tr><tr class="datumuhrzeit betreuer"><td>'
                      .strftime('%a %e. %b %g, %H:%M', $datum).'</td></tr></table>';
                  }
                //Wenn der Betreuer der Sender der schon gelesenen Nachricht ist.
                elseif($dsatz['BSender'] == 1)
                  {
                    echo '<table class="betreuer nachricht"><tr class="betreuername"><td>'.$dsatz['vorname_betreuer'].' '.$dsatz['nachname_betreuer'].'</td></tr><tr class="nachricht"><td>'
                        .$dsatz['Text'].'</td></tr><tr class="datumuhrzeit betreuer"><td>'
                        .strftime('%a %e. %b %g, %H:%M', $datum).'</td></tr></table>';
                  }
                //Wenn die Nachricht vom Probanden stammt.
                else
                  {
                    echo '<table class="proband nachricht"><tr class="nachricht"><td>'.$dsatz['Text'].'</td></tr><tr class="datumuhrzeit proband"><td>'
                    .strftime('%a %e. %b %g, %H:%M', $datum).'</td></tr></table>';
                  }
              };
              ?>
             </td>
					</tr>
          <!--
          <tr>
            <td>
              <?php
              while ($img = mysqli_fetch_assoc($result1))
              {
                echo '<table class="proband nachricht"><tr class="nachricht"><td>'.$img['dateiname'].'</td></tr></table>';
              }
              ?>
            </td>
          </tr>
          -->
          <tr>
            <td>
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
            </td>
          </tr>
            <td>
              <tr>
                <table class="">
                  <tr>
        						<form class="w3-container" action="upload.php" method="POST" name="DAFORM" enctype="multipart/form-data" target="_self">
                    <input id="upload" name="upload" class="w3-input" type="file" >

                    <!-- CAPTCHA -->
        						<p class="textend"></p>
        						<button type="submit" class="w3-btn w3-blue-grey">Absenden</button>
        						<button type="reset" class="w3-btn w3-red">Zurücksetzen</button>
        					  </form>
                  </tr>
  				    </table>
					<br>
					<br>
					<br>
					<br>
            </tr>
          </td>
			</div>
		</main>
    <br>
    <br>
    <br>
    <br>
    <?php include '../includes/footer_proband.inc.php' ?>
    <?php mysqli_close($conn); ?>
	</body>
</html>
