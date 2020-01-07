<?php
#Es wird geprüft, ob die beim Login eingegebenen Daten mit denen in der Datenbank übereinstimmen.

require 'dbh.inc.php';

#Variablen
$rolle;
if($_POST['rolle']=='betreuer') {
	$rolle = 'betreuer';
}
else if($_POST['rolle']=='proband') {
	$rolle = 'proband';
}
$mailuid = mysqli_real_escape_string($conn,$_POST['mailuid']);
$passwort = mysqli_real_escape_string($conn,$_POST['passwort']);

#Betreuer oder Admin?
if ($rolle == 'betreuer') {
$sqlbet = "SELECT * FROM betreuer WHERE Username = ? OR Email = ?;";
$stmtbet = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmtbet, $sqlbet)) {
		//echo '<script>alert("SQL Fehler BET")</script>';
		echo 0;
	}
	else {
		mysqli_stmt_bind_param($stmtbet, "ss", $mailuid, $mailuid);
		mysqli_stmt_execute($stmtbet);
		$result = mysqli_stmt_store_result($stmtbet);
		$resultcheck = mysqli_stmt_num_rows($stmtbet);
		if ($resultcheck < 1) {
			$rolle = 'admin';
		}
	}
}

#Query für die Überprüfung
$sql = "SELECT * FROM " .$rolle. " WHERE Username = ? OR Email = ?;";
$stmt = mysqli_stmt_init($conn);

//Check, ob das stmt vorbereitet (prepared) werden konnte.
#Rückgabewert (echo) ist für scriptLogin.js wichtig. (Also 0/Fehler oder 1/Erfolg)
if (!mysqli_stmt_prepare($stmt, $sql)) {
	//echo '<script>alert("SQL Fehler")</script>';
	echo 0;
}

//Eingaben (Username/Email/Passwort) werden auf Korrektheit geprüft.
//Sind alle Angaben in der Datenbank zu finden, dann erfolgt der Login.
else {
	mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
	if ($row = mysqli_fetch_assoc($result)) {
		$pwdCheck = password_verify($passwort, $row['Passwort']);
		if ($pwdCheck == false) {
			echo 0;
		}
		else if ($pwdCheck == true) {
			session_start();
			//$_SESSION['userId'] = '';
			if ($rolle == 'betreuer'){
				$_SESSION['userId'] = $row['BID'];
				echo 1;
			}
			else if ($rolle == 'admin'){
				$_SESSION['userId'] = $row['ADID'];
				echo 2;
			}
			else if ($rolle == 'proband') {
				$_SESSION['userId'] = $row['PID'];
				echo 3;
			}
			$_SESSION['username'] = $row['Username'];
			$_SESSION['rolle'] = $rolle;
			$_SESSION['vorname'] = $row['Vorname'];
			$_SESSION['nachname'] = $row['Nachname'];
		}
		else {
			echo 0;
		}
	}
	else {
		echo 0;
	}
}
