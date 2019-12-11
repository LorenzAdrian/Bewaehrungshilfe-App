<?php
/*
Diese Seite:
Code aus "MeineNachrichten.php", der von das Ajax ".load"-Kommando in "message.js" abgerufen werden muss,
um die automatische Aktualisierung von Nachrichten zu ermöglichen
*/

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

//Dieser Teil wurde in meineNachrichtenAnzeigen.php verlagert
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
$result = mysqli_query($conn, $event_sql);*/

/*Durch die Ajax-Funktion soll eine Nachricht nicht auf gelesen gesetzt werden können
$sql = "UPDATE nachricht SET Status='gelesen'
WHERE PID = ".$_SESSION['userId']." AND BSender=1";

if ($conn->query($sql) != TRUE) {
    echo "Es ist ein Fehler aufgetreten: ".$conn->error;
}
*/

include 'meineNachrichtenAnzeigen.php';

?>

<!DOCTYPE html>
<html lang="de">
  <link rel="stylesheet" href="../CSS/meineNachrichten.css">
</html>
