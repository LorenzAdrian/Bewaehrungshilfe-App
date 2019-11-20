<?php
/*
Diese Seite:
Code aus "MeineNachrichten.php", der von das Ajax ".load"-Kommando in "message.js" abgerufen werden muss,
um die automatische Aktualisierung von Nachrichten zu ermöglichen
*/

include '../database/dbh.inc.php';
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
"SELECT N.NID, N.Zeitstempel, N.Text, N.Status, N.BSender, N.image, N.dateiname, B.Vorname AS vorname_betreuer, B.Nachname AS nachname_betreuer FROM nachricht AS N INNER JOIN betreuer AS B ON N.BID = B.BID WHERE N.PID = ".$_SESSION['userId']." ORDER BY Zeitstempel";

//Mit mysqli_query wird die SQL-Abfrage ausgeführt. Die Methode liefert ein Objekt der Klasse mysqli_result zurück. $result enthält die Referenz auf dieses Objekt.
$result = mysqli_query($conn, $event_sql);

$sql = "UPDATE nachricht SET Status='gelesen'
WHERE PID = ".$_SESSION['userId']." AND BSender=1";

if ($conn->query($sql) != TRUE) {
    echo "Es ist ein Fehler aufgetreten: ".$conn->error;
}

while ($dsatz = mysqli_fetch_assoc($result))
{
  //Erzeugt aus der Zeichenkette des Zeitstempels ein DateTime-Objekt
  setlocale(LC_ALL, "");
  $datum = date_create($dsatz['Zeitstempel'])->getTimestamp();

  //Wenn die Nachricht ein String ist
  if(!$dsatz['dateiname']){
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
    }
    //Wenn die Nachricht eine Datei ist
    else{
    //Wenn der Betreuer der Sender der Nachricht und die Nachricht neu ist.
    //$filename = $dsatz['dateiname'];
    //file_put_contents($filename,$dsatz['image']);
      if($dsatz['BSender'] == 1 && $dsatz['Status'] == 'neu')
        {
          echo '<table class="betreuer nachricht neu">
          <tr class="betreuername"><td>'.$dsatz['vorname_betreuer'].' '.$dsatz['nachname_betreuer'].'</td></tr>
          <tr class="nachricht"><td><a href="">'.$dsatz['dateiname'].'</a></td></tr>
          <tr class="datumuhrzeit betreuer"><td>'.strftime('%a %e. %b %g, %H:%M', $datum).'</td></tr></table>';
          }
        //Wenn der Betreuer der Sender der schon gelesenen Nachricht ist.
        elseif($dsatz['BSender'] == 1)
          {
            echo '<table class="betreuer nachricht">
            <tr class="betreuername"><td>'.$dsatz['vorname_betreuer'].' '.$dsatz['nachname_betreuer'].'</td></tr>
            <tr class="nachricht"><td><a href="">'.$dsatz['dateiname'].'</a></td></tr>
            <tr class="datumuhrzeit betreuer"><td>'.strftime('%a %e. %b %g, %H:%M', $datum).'</td></tr>
            </table>';
          }
        //Wenn die Nachricht vom Probanden stammt.
        else
          {
            echo '<table class="proband nachricht">
            <tr class="nachricht"><td><a href="">'.$dsatz['dateiname'].'</a></td></tr>
            <tr class="datumuhrzeit proband"><td>'.strftime('%a %e. %b %g, %H:%M', $datum).'</td></tr>
            </table>';

          }
      }
}

?>

<!DOCTYPE html>
<html lang="de">
  <link rel="stylesheet" href="../CSS/meineNachrichten.css">
</html>
