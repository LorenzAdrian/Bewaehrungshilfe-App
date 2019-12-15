<?php
if(!isset($_POST['bet-anlegen'])) {
  header('Location:login.php');
}
?>

	<body>
	<header>
	<nav class="navbar navbar-expand-lg navbar-light bg-light flex-nowrap">
	<a class="navbar-brand w-100" href="#">
	  <img src="../CSS/image/logoohneschatten.png"  width="50" height="50" alt="Logo" > &nbsp;&nbsp;SoDi4U
	  </a>
	<div class="w-100"><!--spacer--></div>
	<div class="w-100"><!--spacer--></div>
	<div class="w-100"><!--spacer--></div>
	<div class="w-100"><!--spacer--></div>
	 <div class="navbar-collapse collapse w-100" id="navbar5">
		<ul class="navbar-nav mx-auto">
		<!-- Aktuelle Seite -->
	  <li class="nav-item active">
		<a class="nav-link" href="../php/index_admin.php">Zurück zur Startseite<span class="sr-only">(current)</span></a>
	  </li>
	</ul>
	</div>
	<div class="w-100"><!--spacer--></div>
	</header>

		<main>
			<h1>Betreuer</h1>
			<p>Bitte füllen Sie alle Felder aus.</p>
			<form action="<?php echo ($_SERVER["PHP_SELF"]);?>" method="POST">
				<input type="hidden" name="rolle" value="betreuer">
				<br>
				<input type="text" name="uid" placeholder="Username" required>
				<br>
				<input type="text" name="mail" placeholder="E-mail" required>
				<br>
				<input type="password" name="pwd" placeholder="Passwort" required>
				<br>
				<input type="password" name="pwd-repeat" placeholder="Passwort bestätigen" required>
				<br>
				<br>
				<input type="text" name="vorname" placeholder="Vorname" required>
				<br>
				<input type="text" name="nachname" placeholder="Nachname" required>
				<br>
				<input type="number" name="telnr" placeholder="Telefonnummer" required>
				<br>
				<input type="text" name="zimmernr" placeholder="Zimmernummer" required>
				<br>
				<input type="text" name="sz" placeholder="Stellenzeichen" required>
				<br>
				<input type="number" name="vertretung" placeholder="Vertretungs-ID">
				<br>
				<input type="number" name="ag" placeholder="Arbeitsgruppen-ID" required>
				<br>
				<br>
				<button type="submit" class="btn btn-outline-danger" name="signup-submit">Betreuer Registrieren</button>
			</form>
		</main>
	</body>';
	}
