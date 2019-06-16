<?php

//Wird ausgeführt, wenn in header.php ein Login abgeschickt wurde.
if(isset($_POST['login'])) {

	require 'dbh.inc.php';

	$rolle = "proband";
	if (isset($_POST['rolle'])) {
		$rolle = "betreuer";
	}
	$mailuid = $_POST['mailuid'];
	$passwort = $_POST['pwd'];

	//Fehlermeldung bei fehlender Rolle
	if($rolle!='betreuer' && $rolle!='proband'){
		echo '<script>alert("Wählen Sie bitte die Rolle aus, als welche Sie sich anmelden möchten")</script>';
		//header("Location:../login.php?error=rolenotchosen");
		exit();
	}

	//Fehlermeldung bei leeren Feldern
	if (empty($mailuid) || empty($passwort)) {
		echo '<script>alert("Leere Felder")</script>';
		exit();
	}

	else {
		$sql = "SELECT * FROM " .$rolle. " WHERE Username = ? OR Email = ?;";
		$stmt = mysqli_stmt_init($conn);
		
		//Check, ob das stmt vorbereitet (prepared) werden konnte.
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			echo '<script>alert("SQL Fehler")</script>';
			exit();
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
					header("Location:../login.php?wrongpswd");
					exit();
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
					$_SESSION['userUid'] = $row['Username'];
					header("Location:../login.php?login=success");
					exit();
				}
				else {
					header("Location:../login.php?wrongpswd");
					exit();
				}
			}
			else {
				header("Location:../login.php?nouser");
				exit();
			}
		}
	}
}
