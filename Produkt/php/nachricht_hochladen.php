<?php
#Die eingegebene Nachricht wird verschickt, also in die Datenbank eingetragen.

require '../database/dbh.inc.php';
if(!isset($_SESSION))
{
      session_start();
}

// Check user login or not
if(!isset($_SESSION['userId'])){
    header('Location: login.php');
}

#Variablen für die Datenbank
$timestamp = time();
$datum =  /*'2019.10.14 10:00:00';*/date("Y.m.d H:i:s", $timestamp);
$nachricht = $_POST['textarea1'];
$status = 'neu';
$bid;
$pid;
#Prüfen, welche Rolle angemeldet ist.
if($_SESSION['rolle'] == 'betreuer') {
	$bid = $_SESSION['userId'];
	$pid = $_POST['hiddenProbID'];
	$bsender = 1; #Weil Betreuer.
}
else {
	$pid = $_SESSION['userId'];
	#BID wird aus der Datenbank ausgelesen.
	$query = "SELECT BID FROM proband WHERE PID =".$_SESSION['userId']." LIMIT 1";
	$result = mysqli_query($conn, $query);
	while($row = mysqli_fetch_assoc($result)) {
		$bid = $row['BID'];
	}
	$bsender = 0;#Weil Proband.
}
/*
#bezugID wird aus der Datenbank ausgelesen.
$query = "SELECT NID FROM nachricht WHERE PID=".$pid." AND BID=".$bid." ORDER BY Zeitstempel DESC LIMIT 1"; #AND WHERE BID = $bid funktioniert bei Betreuer nicht.
echo("<script>console.log('PHP: " . $query . "');</script>");
$result = mysqli_query($conn, $query);
while($row = mysqli_fetch_assoc($result)) {
		$bezugID = $row['NID'];
	}
  */

#Daten werden in Datenbanktabelle nachricht übertragen.
$sql = "INSERT INTO nachricht (Zeitstempel, Text, Status, PID, BID, BSender) VALUES (?, ?, ?, ?, ?,?)";
$stmt = mysqli_stmt_init($conn);
if (mysqli_stmt_prepare($stmt, $sql)) {
  mysqli_stmt_bind_param($stmt, "ssssss", $datum, $nachricht, $status, $pid, $bid, $bsender);
  mysqli_stmt_execute($stmt);
  //header('Location: index_betreuer.php');
}
else {
	echo "Fehler: " .$sql . "<br>" .mysqli_error($conn);
}

/*
#Die Seite wird neu geladen. Ggf. besser mit ajax zu lösen.
header("Location: MeineNachrichten.php#textfeld");
*/
?>
