<?php
if(isset($_POST['signup-submit'])) {

	require 'dbh.inc.php';

	$rolle = $_POST['rolle'];
	$username = $_POST['uid'];
	$email = $_POST['mail'];
	$passwort= $_POST['pwd'];
	$passwortRepeat = $_POST['pwd-repeat'];
	$vorname = $_POST['vorname'];
	$nachname= $_POST['nachname'];
	$telnr = $_POST['telnr'];

	//nur Betreuer
	$zimmernr = $_POST['zimmernr'];
	$sz = $_POST['sz']; //Stellenzeichen
	$vertretung = $_POST['vertretung'];
	$ag = $_POST['ag'];

	//nur Proband
	$az = $_POST['az']; //Aktenzeichen
	$ende = $_POST['ende']; //Betreuungsende
	$betreuer = $_POST['betreuer']; //BetreuerID


	//Check, ob alle wichtigen (d.h. NOT NULL) Felder gefüllt sind.
	if ($rolle=="betreuer") {
		if (empty($username) || empty($email) || empty($passwort) || empty($passwortRepeat)
					|| empty($vorname) || empty($nachname) || empty($telnr) || empty($zimmernr) || empty($sz)
					|| empty($ag)){
			header("Location: signup.php?error=emptyfields");
			exit();
		}
	}
	else if ($rolle=="admin") {
		if (empty($username) || empty($email) || empty($passwort) || empty($passwortRepeat)
					|| empty($vorname) || empty($nachname) || empty($telnr) || empty($zimmernr) || empty($sz)
					|| empty($ag)){
			header("Location: signup.php?error=emptyfields");
			exit();
		}
	}
	elseif ($rolle=='proband'){
		if (empty($username) || empty($email) || empty($passwort) || empty($passwortRepeat)
					|| empty($vorname) || empty($nachname) || empty($telnr) || empty($az) || empty($ende)
					|| empty($betreuer)){
			header("Location: signup.php?error=emptyfields");
			exit();
		}
	}
	else{
		header("Location: signup.php?error=emptyfieldsnorole");
		exit;
	}

	//Check, ob E-Mail/Username im richtigen Format eingegeben wurde.
	if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		header("Location: signup.php?error=invalidmailuid&uid");
		exit();
	}
	elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		header("Location: signup.php?error=invalidmail&uid".$username);
		exit();
	}
	elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		header("Location: signup.php?error=invalidusername&mail".$email);
		exit();
	}
	elseif ($passwort !== $passwortRepeat) {
		header("Location: signup.php?error=passwortcheck&uid=".$username."&mail=".$email);
		exit();
	}
	else{
		$sql = "SELECT username FROM " .$rolle. " WHERE username = ?";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)){
			header("Location: signup.php?error=sqlerror");
			exit();
		}

		//stmt wird ausgeführt
		else{
			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);

			//Check, ob Username schon vergeben.
			if ($resultCheck > 0) {
				header("Location: signup.php?error=usertaken&mail=".$email);
				exit();
			}

			//Eintragung in Datenbank: Betreuer
			elseif ($rolle=="betreuer"){
				$sql = "INSERT INTO betreuer(vorname, nachname, email, username, passwort, telnr,
					zimmernr, stellenzeichen, agid) VALUES (?,?,?,?,?,?,?,?,?)";

				//Vetrtretung ist NULL Feld, deshalb extra Check.
				if(!empty($vertretung)){
					$sql = "INSERT INTO betreuer(vorname, nachname, email, username, passwort, telnr,
					zimmernr, stellenzeichen, vertretung, agid) VALUES (?,?,?,?,?,?,?,?,?,?)";
				}
				$stmt = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($stmt, $sql)) {
					//trigger_error(mysqli_error($conn), E_USER_ERROR);
					header("Location: signup.php?error=sqlerror");
					exit();
				}
				else {
					//Paswort wird gehasht (! Hash != Verschlüsselung).
					$hashedPwd = password_hash($passwort, PASSWORD_DEFAULT);
					mysqli_stmt_bind_param($stmt, "sssssissi", $vorname, $nachname, $email, $username, $hashedPwd,
					$telnr, $zimmernr, $sz, $ag);

					//Vetrtretung ist NULL Feld, deshalb extra Check.
					if (!empty($vertretung)){
						mysqli_stmt_bind_param($stmt, "sssssissii", $vorname, $nachname, $email, $username, $hashedPwd,
								$telnr, $zimmernr, $sz, $vertretung, $ag);
					}
					mysqli_stmt_execute($stmt);
					header("Location: login.php?signup=success".$username);
					exit();
				}
			}
			//Eintragen in die Datenbank: Admin
			elseif ($rolle=="admin"){
				$sql = "INSERT INTO admin(vorname, nachname, email, username, passwort, telnr,
					zimmernr, stellenzeichen, agid) VALUES (?,?,?,?,?,?,?,?,?)";

				//Vetrtretung ist NULL Feld, deshalb extra Check.
				if(!empty($vertretung)){
					$sql = "INSERT INTO admin(vorname, nachname, email, username, passwort, telnr,
					zimmernr, stellenzeichen, vertretung, agid) VALUES (?,?,?,?,?,?,?,?,?,?)";
				}
				$stmt = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($stmt, $sql)) {
					//trigger_error(mysqli_error($conn), E_USER_ERROR);
					header("Location: signup.php?error=sqlerror");
					exit();
				}
				else {
					//Paswort wird gehasht (! Hash != Verschlüsselung).
					$hashedPwd = password_hash($passwort, PASSWORD_DEFAULT);
					mysqli_stmt_bind_param($stmt, "sssssissi", $vorname, $nachname, $email, $username, $hashedPwd,
					$telnr, $zimmernr, $sz, $ag);

					//Vetrtretung ist NULL Feld, deshalb extra Check.
					if (!empty($vertretung)){
						mysqli_stmt_bind_param($stmt, "sssssissii", $vorname, $nachname, $email, $username, $hashedPwd,
								$telnr, $zimmernr, $sz, $vertretung, $ag);
					}
					mysqli_stmt_execute($stmt);
					header("Location: login.php?signup=success".$username);
					exit();
				}
			}
			//Eintragung in Datenbank: Proband.
			elseif ($rolle=="proband"){
				$sql = "INSERT INTO proband(vorname, nachname, email, username, passwort,
					telnr, aktenzeichen, betreuungsende, bid) VALUES (?,?,?,?,?,?,?,?,?)";
				$stmt = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($stmt, $sql)) {
					//trigger_error(mysqli_error($conn), E_USER_ERROR);
					header("Location: signup.php?error=sqlerror2");
					exit();
				}
				else {
					//Paswort wird gehasht.
					$hashedPwd = password_hash($passwort, PASSWORD_DEFAULT);
					mysqli_stmt_bind_param($stmt, "sssssissi", $vorname, $nachname, $email, $username, $hashedPwd,
					$telnr, $az, $ende, $betreuer);
					mysqli_stmt_execute($stmt);
					header("Location: login.php?signup=success.$username");
					exit();
				}
			}
		}
	}

	mysqli_stmt_close($stmt);
	mysqli_close($conn);

}
else {
	header("Location:signup.php");
	exit();
}
