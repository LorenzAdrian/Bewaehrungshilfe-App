<?php
require 'dbh.inc.php';

$rolle;
if($_POST['rolle']=='betreuer') {
	$rolle = 'betreuer';
}
elseif($_POST['rolle']=='proband') {
	$rolle = 'proband';
}
$mailuid = mysqli_real_escape_string($conn,$_POST['mailuid']);
$passwort = mysqli_real_escape_string($conn,$_POST['passwort']);


$sql = "SELECT * FROM " .$rolle. " WHERE Username = ? OR Email = ?;";
$stmt = mysqli_stmt_init($conn);

//Check, ob das stmt vorbereitet (prepared) werden konnte.
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
			}
			elseif ($rolle == 'proband') {
				$_SESSION['userId'] = $row['PID'];
			}
			$_SESSION['username'] = $row['UserName'];
			//header("Location: login.php?login=success");
			echo 1;
		}
		else {
			//header("Location: login.php?wrongpswd");
			echo 0;
		}
	}
	else {
		//header("Location: login.php?nouser");
		echo 0;
	}
}
