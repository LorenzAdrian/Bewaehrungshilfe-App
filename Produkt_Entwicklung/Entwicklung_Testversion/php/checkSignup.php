<?php
//if(isset($_POST['signup-submit'])) {

require 'dbh.inc.php';

#Variablen aus Formular von signup.php
$rolle = $_POST['rolle'];
$username = $_POST['username'];
$email = $_POST['mail'];
$passwort= $_POST['pwd'];
$passwortRepeat = $_POST['pwdrepeat'];
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
$bid = $_POST['bid']; //BetreuerID


/*
//Check, ob alle wichtigen (d.h. NOT NULL) Felder gefüllt sind.
if ($rolle=="betreuer") {
	if (empty($username) || empty($email) || empty($passwort) || empty($passwortRepeat)
				|| empty($vorname) || empty($nachname) || empty($telnr) || empty($zimmernr) || empty($sz)
				|| empty($ag)){
		//header("Location: ../signup.php?error=emptyfields");
		echo 0;
	}
}
elseif ($rolle=='proband'){
	if (empty($username) || empty($email) || empty($passwort) || empty($passwortRepeat)
				|| empty($vorname) || empty($nachname) || empty($telnr) || empty($az) || empty($ende)
				|| empty($bid)){
		//header("Location: ../signup.php?error=emptyfields");
		echo 0;
	}
}
else{
	//header("Location: ../signup.php?error=emptyfieldsnorole");
	echo 0;
}
*/

//Check, ob E-Mail/Username im richtigen Format eingegeben wurde.
if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
	echo "username, e-mail"; //Fehlermeldung für Skript
}
elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	echo "e-mail"; //Fehlermeldung für Skript
}
elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
	echo "username"; //Fehlermeldung für Skript
}
elseif ($passwort !== $passwortRepeat) {
	echo "pwd"; //Fehlermeldung für Skript
}
else{
	$sql = "SELECT username FROM " .$rolle. " WHERE username = ?";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt, $sql)){
		echo 0; //SQL-Error
		//header("Location: ../signup.php?error=usertaken&mail=)";
	}

	//stmt wird ausgeführt
	else{
		mysqli_stmt_bind_param($stmt, "s", $username);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_store_result($stmt);
		$resultCheck = mysqli_stmt_num_rows($stmt);

		//Check, ob Username schon vergeben.
		if ($resultCheck > 0) {
			echo "usertaken"; //Fehlermeldung für Skript
		}
		else {
			$sql = "SELECT email FROM " .$rolle. " WHERE email = ?";
			$stmt = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt, $sql)){
			echo 0; //SQL-Error
			}
			//stmt wird ausgeführt
			else{
				mysqli_stmt_bind_param($stmt, "s", $email);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);
				$resultCheck = mysqli_stmt_num_rows($stmt);

				//Check, ob E-Mail schon vergeben.
				if ($resultCheck > 0) {
					//header("Location: ../signup.php?error=usertaken&mail=".$email);
					echo "mailtaken"; //Fehlermeldung für Skript
				}
				elseif ($rolle == "betreuer"){
					$sql = "SELECT stellenzeichen FROM " .$rolle. " WHERE stellenzeichen = ?";
					$stmt = mysqli_stmt_init($conn);
					if(!mysqli_stmt_prepare($stmt, $sql)){
					echo 0; //SQL-Error
					}
					//stmt wird ausgeführt
					else{
						mysqli_stmt_bind_param($stmt, "s", $sz);
						mysqli_stmt_execute($stmt);
						mysqli_stmt_store_result($stmt);
						$resultCheck = mysqli_stmt_num_rows($stmt);

						//Check, ob E-Mail schon vergeben.
						if ($resultCheck > 0) {
							//header("Location: ../signup.php?error=usertaken&mail=".$email);
							echo "sztaken";
						}

						//Eintragung in Datenbank: Betreuer
						else{
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
								//header("Location: ../signup.php?error=sqlerror");
								echo 0;
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
								echo 1;
							}
						}
					}
				}
				//Eintragung in Datenbank: Proband.
				elseif ($rolle=="proband"){
					$sql = "SELECT aktenzeichen FROM " .$rolle. " WHERE aktenzeichen = ?";
					$stmt = mysqli_stmt_init($conn);
					if(!mysqli_stmt_prepare($stmt, $sql)){
					echo 0; //SQL-Error
					}
					//stmt wird ausgeführt
					else{
						mysqli_stmt_bind_param($stmt, "s", $sz);
						mysqli_stmt_execute($stmt);
						mysqli_stmt_store_result($stmt);
						$resultCheck = mysqli_stmt_num_rows($stmt);

						//Check, ob E-Mail schon vergeben.
						if ($resultCheck > 0) {
							//header("Location: ../signup.php?error=usertaken&mail=".$email);
							echo "sztaken";
						}
					$sql = "INSERT INTO proband(vorname, nachname, email, username, passwort,
						telnr, aktenzeichen, betreuungsende, bid) VALUES (?,?,?,?,?,?,?,?,?)";
					$stmt = mysqli_stmt_init($conn);
					if (!mysqli_stmt_prepare($stmt, $sql)) {
						//trigger_error(mysqli_error($conn), E_USER_ERROR);
						//header("Location: ../signup.php?error=sqlerror2");
						echo 0;
					}
					else {
						//Paswort wird gehasht.
						$hashedPwd = password_hash($passwort, PASSWORD_DEFAULT);
						mysqli_stmt_bind_param($stmt, "sssssissi", $vorname, $nachname, $email, $username, $hashedPwd,
						$telnr, $az, $ende, $bid);
						mysqli_stmt_execute($stmt);
						echo 1;
					}
				}
			}
		}
	}
}
mysqli_stmt_close($stmt);
mysqli_close($conn);
/*
}
else {
	header("Location:../signup.php");
	exit();
}*/
}
