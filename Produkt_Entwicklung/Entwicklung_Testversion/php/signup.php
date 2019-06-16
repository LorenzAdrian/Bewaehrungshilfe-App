<?php
//require 'header_Betreuer.php';
 ?>

 <?php
 //Check, ob die vorherige Seite bearbeitet wurde.
//if(isset($_POST['signupRolle-submit'])) {
	$rolle = $_POST['rolle'];

	//Angezeigte Felder sind abhängig von der Rolle.
?>
	<!DOCTYPE html>
	<html>
		<head>
			<script type="text/javascript" src="js/jquery-3.4.1.js"></script>
			<script type="text/javascript" src="js/scriptSignup.js"></script>
		</head>
		<body>
			<main>
				<div>
					<h1>Registrierung</h1>
				</div>
				<br>
				<span id='pflichtfeld'>Mit * markierte Felder sind Pflichtfelder</span>
				<br>

				<?php
				if ($rolle == 'betreuer') {
					echo '<h3>Betreuer</h3>
						<div id="general_err"></div>
						<br>
						<input type="text" name="uid" id="uid" placeholder="Username">
						<span id="uid*">*</span>
						<div id="uid_err"></div>
						<br>
						<input type="text" name="mail" id="mail" placeholder="E-Mail">
						<span id="mail*">*</span>
						<div id="mail_err"></div>
						<br>
						<input type="password" name="pwd" id="pwd" placeholder="Passwort">
						<span id="pwd*">*</span>
						<div id="pwd_err"></div>
						<br>
						<input type="password" name="pwd-repeat" id="pwd-repeat" placeholder="Passwort bestätigen">
						<span id="pwd-repeat*">*</span>
						<div id="pwd-repeat_err"></div>
						<br>
						<br>
						<input type="text" name="vorname" id="vorname" placeholder="Vorname">
						<span id="vorname*">*</span>
						<br>
						<br>
						<input type="text" name="nachname" id="nachname" placeholder="Nachname">
						<span id="nachname*">*</span>
						<br>
						<br>
						<input type="text" name="telnr" id="telnr" placeholder="Telefonnummer">
						<span id="telnr*">*</span>
						<br>
						<br>
						<input type="text" name="zimmernr" id="zimmernr" placeholder="Zimmernummer">
						<span id="zimmernr*">*</span>
						<br>
						<br>
						<input type="text" name="sz" id="sz" placeholder="Stellenzeichen">
						<span id="sz*">*</span>
						<div id="sz_err"></div>
						<br>
						<input type="number" name="vertretung" id="vertretung" placeholder="Vertretungs-ID">
						<span id="vertretung*"></span>
						<br>
						<br>
						<input type="number" name="ag" id="ag" placeholder="Arbeitsgruppen-ID">
						<span id="ag*">*</span>
						<br>
						<br>
						<input type="hidden" name="rolle" id="rolle" value="betreuer">
						<input type="button" name="signup_betreuer_btn" id="signup_betreuer_btn" value="Registrierung abschließen">
						';
				}

				elseif ($rolle == 'proband') {
					echo '<h3>Proband</h3>
						<div id="general_err"></div>
						<br>
						<input type="text" name="uid" id="uid" placeholder="Username">
						<span id="uid*">*</span>
						<div id="uid_err"></div>
						<br>
						<input type="text" name="mail" id="mail" placeholder="E-Mail">
						<span id="mail*">*</span>
						<div id="mail_err"></div>
						<br>
						<input type="password" name="pwd" id="pwd" placeholder="Passwort">
						<span id="pwd*">*</span>
						<div id="pwd_err"></div>
						<br>
						<input type="password" name="pwd-repeat" id="pwd-repeat" placeholder="Passwort bestätigen">
						<span id="pwd-repeat*">*</span>
						<div id="pwd-repeat_err"></div>
						<br>
						<br>
						<input type="text" name="vorname" id="vorname" placeholder="Vorname">
						<span id="vorname*">*</span>
						<br>
						<br>
						<input type="text" name="nachname" id="nachname" placeholder="Nachname">
						<span id="nachname*">*</span>
						<br>
						<br>
						<input type="text" name="telnr" id="telnr" placeholder="Telefonnummer">
						<span id="telnr*">*</span>
						<br>
						<br>
						<input type="text" name="az" id="az" placeholder="Aktenzeichen">
						<span id="az*">*</span>
						<br>
						<br>
						<input type="text" name="ende" id="ende" placeholder="Betreuungsende">
						<span id="ende*">*</span>
						<br>
						<br>
						<input type="number" name="bid" id="bid" placeholder="Betreuer-ID">
						<span id="betreuer*">*</span>
						<br>
						<br>
						<input type="hidden" name="rolle" id="rolle" value="proband">
						<input type="button" name="signup_proband_btn" id="signup_proband_btn" value="Registrierung abschließen">
						';
				}

	//Bei fehlender Auswahl (Betreuer/Proband) wird Auswahlseite (signupcheck.php) neu geladen.
	//Es gibt eine Fehlermeldung (noch: JavaScript)
	/*else {
		echo '<script>alert("Wählen Sie bitte eine der Optionen");</script>
		<meta http-equiv="refresh" content="0;URL=signupcheck.php" />';
	}*/
				?>

				<br>
				<br>
				<a href=signupRolle.php>Zurück</a>
			</main>
		</body>
	</html>

<?php
//}
//else{
	//echo '<meta http-equiv="refresh" content="0;URL=signupRolle.php" />';
//}

//<script src="jquery-3.4.1.js"></script>
//<script src="scriptSignup.js"></script>
?>
<?php
//require 'footer.php';
?>
