 <?php
 //Check, ob die vorherige Seite bearbeitet wurde.
if(isset($_POST['signupcheck-submit'])) {
	$rolle = $_POST['rolle'];
	
	//Angezeigte Felder sind abhängig von der Rolle.
	
	if ($rolle == 'betreuer') {
		echo '<main>
		<h1>Registrierung</h1>
		<br>
		<h3>Betreuer</h3>
		<form  action="signup.inc.php" method="POST">
		
			<input type="hidden" name="rolle" value="betreuer">
			<br>

			<input type="text" name="uid" placeholder="Username">
			<br>
			<input type="text" name="mail" placeholder="E-mail">
			<br>
			<input type="password" name="pwd" placeholder="Passwort">
			<br>
			<input type="password" name="pwd-repeat" placeholder="Passwort bestätigen">
			<br>
			<br>
			<input type="text" name="vorname" placeholder="Vorname">
			<br>
			<input type="text" name="nachname" placeholder="Nachname">
			<br>
			<input type="number" name="telnr" placeholder="Telefonnummer">
			<br>
			<input type="text" name="zimmernr" placeholder="Zimmernummer">
			<br>
			<input type="text" name="sz" placeholder="Stellenzeichen">
			<br>
			<input type="number" name="vertretung" placeholder="Vertretungs-ID">
			<br>
			<input type="number" name="ag" placeholder="Arbeitsgruppen-ID">
			<br>
			<br>
			<button type="submit" name="signup-submit">Registrieren</button>
		</form>
		</main>';
	}

	elseif ($rolle == 'proband') {
		echo '<main>
		<h1>Registrierung</h1>
		<br>
		<h3>Proband</h3>
		<form  action="signup.inc.php" method="POST">

			<input type="hidden" name="rolle" value="proband">
			<br>

			<input type="text" name="uid" placeholder="Username">
			<br>
			<input type="text" name="mail" placeholder="E-mail">
			<br>
			<input type="password" name="pwd" placeholder="Passwort">
			<br>
			<input type="password" name="pwd-repeat" placeholder="Passwort bestätigen">
			<br>
			<br>
			<input type="text" name="vorname" placeholder="Vorname">
			<br>
			<input type="text" name="nachname" placeholder="Nachname">
			<br>
			<input type="number" name="telnr" placeholder="Telefonnummer">
			<br>
			<input type="text" name="az" placeholder="Aktenzeichen">
			<br>
			<input type="text" name="ende" placeholder="Betreuungsende">
			<br>
			<input type="number" name="betreuer" placeholder="Betreuer-ID">
			<br>
			<br>
			<button type="submit" name="signup-submit">Registrieren</button>
		</form>
		</main>';
	}

	//Bei fehlender Auswahl (Betreuer/Proband) wird Auswahlseite (signupcheck.php) neu geladen.
	//Es gibt eine Fehlermeldung (noch: JavaScript)
	else {
		echo '<script>alert("Wählen Sie bitte eine der Optionen");</script>
		<meta http-equiv="refresh" content="0;URL=signupcheck.php" />';
	}
}
?>

