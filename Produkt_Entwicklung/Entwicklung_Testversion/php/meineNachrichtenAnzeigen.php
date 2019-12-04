<?php
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
  $sender = 'betreuer';
  $bsender = 1;
}
else {
	$personenID = 'BID';
  $sender ='proband';
  $bsender = 0;
}

$event_sql =
"SELECT N.NID, N.Zeitstempel, N.Text, N.Status, N.BSender, N.dateiname, S.Vorname AS vorname_sender, S.Nachname AS nachname_sender FROM nachricht AS N INNER JOIN ".$sender." AS S ON N.BID = S.BID WHERE N.".$personenID." = ".$_SESSION['userId']." ORDER BY Zeitstempel";

//echo $event_sql;

//Mit mysqli_query wird die SQL-Abfrage ausgeführt. Die Methode liefert ein Objekt der Klasse mysqli_result zurück. $result enthält die Referenz auf dieses Objekt.
$res = mysqli_query($conn, $event_sql);

//Jetzt wird der Status der Nachrichten auf 'gelesen' gesetzt
$sql = "UPDATE nachricht SET Status='gelesen'
WHERE ".$personenID." = ".$_SESSION['userId']." AND BSender=".$bsender;
if ($conn->query($sql) != TRUE) {
    echo "Es ist ein Fehler aufgetreten: ".$conn->error;
}

while ($dsatz = mysqli_fetch_assoc($res))
{
  //Erzeugt aus der Zeichenkette des Zeitstempels ein DateTime-Objekt
  setlocale(LC_ALL, "");
  $datum = date_create($dsatz['Zeitstempel'])->getTimestamp();

  //Wenn die Nachricht ein String ist
  if(!$dsatz['dateiname']){
  //Wenn der eingeloggte Benutzer der Empfänger der Nachricht und die Nachricht neu ist.
    if($dsatz['BSender'] == $bsender && $dsatz['Status'] == 'neu')
      {
        echo '<table class="sender nachricht neu"><tr class="sendername"><td>'.$dsatz['vorname_sender'].' '.$dsatz['nachname_sender'].'</td></tr><tr class="nachricht"><td>'
            .$dsatz['Text'].'</td></tr><tr class="datumuhrzeit sender"><td>'
            .strftime('%a %e. %b %g, %H:%M', $datum).'</td></tr></table>';
        }
      //Wenn der eingeloggte Benutzer der Empfänger der schon gelesenen Nachricht ist.
      elseif($dsatz['BSender'] == $bsender)
        {
          echo '<table class="sender nachricht"><tr class="sendername"><td>'.$dsatz['vorname_sender'].' '.$dsatz['nachname_sender'].'</td></tr><tr class="nachricht"><td>'
              .$dsatz['Text'].'</td></tr><tr class="datumuhrzeit sender"><td>'
              .strftime('%a %e. %b %g, %H:%M', $datum).'</td></tr></table>';
        }
      //Wenn der eingeloggte Benutzer der Sender der Nachricht ist.
      else
        {
          echo '<table class="empfaenger nachricht"><tr class="nachricht"><td>'.$dsatz['Text'].'</td></tr><tr class="datumuhrzeit empfaenger"><td>'
          .strftime('%a %e. %b %g, %H:%M', $datum).'</td></tr></table>';
        }
    }
    //Wenn die Nachricht eine Datei ist
    else{
    //Wenn der eingeloggte Benutzer der Empfänger der Nachricht und die Nachricht neu ist.
      if($dsatz['BSender'] == $bsender && $dsatz['Status'] == 'neu')
        {
          echo '<table class="sender nachricht neu">
          <tr class="sendername"><td>'.$dsatz['vorname_sender'].' '.$dsatz['nachname_sender'].'</td></tr>
          <tr class="nachricht"><td><a class="download" href="datei_download.php?nid='.$dsatz['NID'].'" download="'.$dsatz['dateiname'].'">'.$dsatz['dateiname'].'</a></td></tr>
          <tr class="datumuhrzeit sender"><td>'.strftime('%a %e. %b %g, %H:%M', $datum).'</td></tr></table>';
          }
        //Wenn der eingeloggte Benutzer der Empfänger der schon gelesenen Nachricht ist.
        elseif($dsatz['BSender'] == $bsender)
          {
            echo '<table class="sender nachricht">
            <tr class="sendername"><td>'.$dsatz['vorname_sender'].' '.$dsatz['nachname_sender'].'</td></tr>
            <tr class="nachricht"><td><a class="download" href="datei_download.php?nid='.$dsatz['NID'].'" download="'.$dsatz['dateiname'].'">'.$dsatz['dateiname'].'</a></td></tr>
            <tr class="datumuhrzeit sender"><td>'.strftime('%a %e. %b %g, %H:%M', $datum).'</td></tr>
            </table>';
          }
        //Wenn der eingeloggte Benutzer der Sender der Nachricht ist.
        else
          {
            echo '<table class="empfaenger nachricht">
            <tr class="nachricht"><td><a class="download" href="datei_download.php?nid='.$dsatz['NID'].'" download="'.$dsatz['dateiname'].'">'.$dsatz['dateiname'].'</a></td></tr>
            <tr class="datumuhrzeit empfaenger"><td>'.strftime('%a %e. %b %g, %H:%M', $datum).'</td></tr>
            </table>';

          }
      }
}
mysqli_close($conn);
?>
