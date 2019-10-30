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

include "Nachrichten_menu.php";

if(!isset($_SESSION['prodID'])){
$_SESSION['probID'] = $probID;}

else {
	$probID = $_POST['terPID'];
}

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
    <?php include '../includes/header.html'; ?>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Proband: Nachrichten und Termine</title>
    <link rel="stylesheet" href="../CSS/probinfo.css" >
    <link rel="stylesheet" href="../CSS/sidebar.css">
    <script src="../javascript/jquery-3.4.1.js"></script>
    <script src="../javascript/sidebar.js"></script>
  </head>

  <body>
    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <?php
        echo $alteNachrichten;
        echo "<br>";
        echo $neueNachrichten;
        ?>
    </div>

    <div id="main">
      <div class="zuruck">
        <form action="index_betreuer.php" method="post">
            <input type="submit"  value="Zurück">
        </form>
      </div>
      <div>
        <!-- <details> ist ein HTML5-Element, das das Ausklappen ermöglicht. Kein Button notwendig. <summary> legt den Text fest, der vor dem Ausklappen sichtbar ist. -->
        <details>
  			<summary> Termin anlegen </summary>
  			<form action = "terminetest_insert.php" method = "post">
  			  <p>
          Titel: <input name = "terTitel" type = "text" size = "50" placeholder = "Titel">&nbsp;&nbsp;&nbsp;
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

      <div class="toggle" onclick="openNav()">
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

  </body>
</html>
