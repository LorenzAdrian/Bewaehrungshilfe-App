<?php
/*Diese Datei dient dem Test des Eintrags von Nachrichten in die Datenbank. Sie arbeitet mit statischen Daten.
*/

require 'dbh.inc.php'; //Prüft die Datenbankverbindung. Besteht diese nicht, wird eine Fehlermeldung ausgegeben und das Programm nicht weiter ausgeführt.
//Mit require wird wie mit include der Inhalt der angegebenen Datei eingefügt. Wird die Datei nicht gefunden oder entsteht bei der Ausführung des Codes ein Fehler, wird die Programmausführung beendet. Bei include wird in diesem Fall nur eine Warnung ausgegeben, das Programm aber weiter ausgeführt. Auf Variablen aus der eingebundenen Datei kann im weiteren Verlauf zugegriffen werden, genauso wie der eingebundene Code die bis hierhin deklarierten Variablen der einbindenden Datei nutzen kann.

$timestamp = time(); //time() liefert die aktuelle Zeit in Sekunden seit 01.01.1970 00:00:00 (UNIX)
$datum =  date("Y.m.d H:i:s", $timestamp); //date() wandelt den timestamp in ein Datum im angegebenen Format um
//$nachricht = $_POST['textarea1']; //zur Übernahme von Daten aus dem Input-Element mit dem Namen textarea1 aus einem per POST übermittelten Request
$nachricht='Meine Nachricht';//hier statischer Text statt des obigen dynamischen Textes
//$bezugID = 'NULL'; //Wie kann NULL übergeben werden?
$status = 'neu';
$bid =  1;
$pid = 1;
$bsender = 0;

print "<h2>Dies ist ein Test mit statischen Daten</h2>Zeitstempel: $datum<br>Text: $nachricht<br>Status: $status<br>BID: $bid<br>PID: $pid<br>BSender: $bsender";

$sql = "INSERT INTO nachricht(Zeitstempel, Text, Status, BID, PID, BSender) VALUES ('$datum', '$nachricht', '$status', '$bid', '$pid', '$bsender')";//Zeichenketten als Werte einer INSERT-Anweisung müssen in Hochkommata gesetzt werden. Bei Integer-Werten können die Hochkommata auch weggelassen werden. Weil die SQL-Anweisung in Anführungszeichen eingeschlossen ist, müssen die Variablen nicht verknüpft werden. Variablen zwischen Anführungszeichen werden in php interpretiert.
mysqli_query($conn, $sql); //$conn wurde durch dbh.inc.php eingeführt
mysqli_close($conn);

?>
