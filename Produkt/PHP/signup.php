<!DOCTYPE html>
<html lang="de">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	 <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
	integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <title>Registrierung</title>

</head>

<style>

main{
	align-items: center;
	padding-top: 20px;
	text-align: center;
}

header {
  border-bottom: 2px maroon solid;
}

.form-group{
	display: flex;
	align-items: center;
	justify-content: center;
}

h1{
	font-weight: 300;
}

h4{
	font-weight: 300;
}

label{
	text-align: left;
}

</style>


<?php
 //Check, ob die vorherige Seite bearbeitet wurde.
if(isset($_POST['signupcheck-submit'])) {
	$rolle = $_POST['rolle'];

	//Angezeigte Felder sind abhängig von der Rolle.

	if ($rolle == 'betreuer') {
		echo '
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
			<a class="nav-link" href="../php/index_betreuer.php">Zurück zur Startseite<span class="sr-only">(current)</span></a>
		  </li>
		</ul>
		</div>
		<div class="w-100"><!--spacer--></div>
		</header>

			<main>
				<h1>Neuen Bewährungshelfer anlegen</h1>
				<p>Bitte füllen Sie alle Felder aus.</p>
				<form action="signup.inc.php" method="POST">
					<input type="hidden" name="rolle" value="betreuer">
					<br>
					
					<div class="form-group row">
				<label for="username" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 col-form-label">Username:</label>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<input type="text" class="form-control" id="username" name="uid" placeholder="Username">
				</div>
				</div>
			<div class="form-group row">
				<label for="email" class="col-lg-2 col-md-4 col-sm-4 col-xs-4 col-form-label">E-Mail:</label>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<input type="email" class="form-control" id="email" name="mail" placeholder="E-mail">
				</div>
			</div>
			<div class="form-group row">
				<label for="password" class="col-lg-2 col-md-4 col-sm-4 col-xs-4 col-form-label">Passwort:</label>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<input type="password" class="form-control" id="password" name="pwd" placeholder="Passwort">
				</div>
			</div>
			<div class="form-group row">
				<label for="password-repeat" class="col-lg-2 col-md-4 col-sm-4 col-xs-4 col-form-label">Passwort bestätigen:</label>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<input type="password" class="form-control" id="password-repeat" name="pwd-repeat" placeholder="Passwort bestätigen">
				</div>
			</div>
			<div class="form-group row">
				<label for="vorname" class="col-lg-2 col-md-4 col-sm-4 col-xs-4 col-form-label">Vorname:</label>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<input type="text" class="form-control" id="vorname" name="vorname" placeholder="Vorname">
				</div>
			</div>
			<div class="form-group row">
				<label for="nachname" class="col-lg-2 col-md-4 col-sm-4 col-xs-4 col-form-label">Nachname:</label>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<input type="text" class="form-control" id="nachname" name="nachname" placeholder="Nachname">
				</div>
			</div>
			<div class="form-group row">
				<label for="telnr" class="col-lg-2 col-md-4 col-sm-4 col-xs-4 col-form-label">Telefonnummer:</label>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<input type="text" class="form-control" id="telnr" name="telnr" placeholder="Telefonnummer">
				</div>
			</div>
			<div class="form-group row">
				<label for="zimmernr" class="col-lg-2 col-md-4 col-sm-4 col-xs-4 col-form-label">Zimmernummer:</label>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<input type="text" class="form-control" id="zimmernr" name="zimmernr" placeholder="Zimmernummer">
				</div>
			</div>
						<div class="form-group row">
				<label for="sz" class="col-lg-2 col-md-4 col-sm-4 col-xs-4 col-form-label">Stellenzeichen:</label>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<input type="text" class="form-control" id="sz" name="sz" placeholder="Stellenzeichen">
				</div>
			</div>
						<div class="form-group row">
				<label for="vertretung" class="col-lg-2 col-md-4 col-sm-4 col-xs-4 col-form-label">Vertretungs-ID:</label>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<input type="number" class="form-control" id="vertretung" name="vertretung" placeholder="Vertretungs-ID">
				</div>
			</div>
									<div class="form-group row">
				<label for="ag" class="col-lg-2 col-md-4 col-sm-4 col-xs-4 col-form-label">Arbeitsgruppen-ID:</label>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<input type="number" class="form-control" id="ag" name="ag" placeholder="Arbeitsgruppen-ID">
				</div>
			</div>
			
			<br>
			
					<button type="submit" class="btn btn-outline-danger" name="signup-submit">Registrieren</button>
				</form>
			</main>
		</body>';
		}
		else if ($rolle == 'admin') {
			echo '
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
				<a class="nav-link" href="../php/index_betreuer.php">Zurück zur Startseite<span class="sr-only">(current)</span></a>
			  </li>
			</ul>
			</div>
			<div class="w-100"><!--spacer--></div>
			</header>

			<main>
			<h1>Neuen Admin anlegen</h1>
			<p>Bitte füllen Sie alle Felder aus.</p>
			<form  action="signup.inc.php" method="POST">

				<input type="hidden" name="rolle" value="admin">
				<br>

				<div class="form-group row">
				<label for="username" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 col-form-label">Username:</label>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<input type="text" class="form-control" id="username" name="uid" placeholder="Username">
				</div>
				</div>
			<div class="form-group row">
				<label for="email" class="col-lg-2 col-md-4 col-sm-4 col-xs-4 col-form-label">E-Mail:</label>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<input type="email" class="form-control" id="email" name="mail" placeholder="E-mail">
				</div>
			</div>
			<div class="form-group row">
				<label for="password" class="col-lg-2 col-md-4 col-sm-4 col-xs-4 col-form-label">Passwort:</label>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<input type="password" class="form-control" id="password" name="pwd" placeholder="Passwort">
				</div>
			</div>
			<div class="form-group row">
				<label for="password-repeat" class="col-lg-2 col-md-4 col-sm-4 col-xs-4 col-form-label">Passwort bestätigen:</label>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<input type="password" class="form-control" id="password-repeat" name="pwd-repeat" placeholder="Passwort bestätigen">
				</div>
			</div>
			<div class="form-group row">
				<label for="vorname" class="col-lg-2 col-md-4 col-sm-4 col-xs-4 col-form-label">Vorname:</label>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<input type="text" class="form-control" id="vorname" name="vorname" placeholder="Vorname">
				</div>
			</div>
			<div class="form-group row">
				<label for="nachname" class="col-lg-2 col-md-4 col-sm-4 col-xs-4 col-form-label">Nachname:</label>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<input type="text" class="form-control" id="nachname" name="nachname" placeholder="Nachname">
				</div>
			</div>
			<div class="form-group row">
				<label for="telnr" class="col-lg-2 col-md-4 col-sm-4 col-xs-4 col-form-label">Telefonnummer:</label>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<input type="text" class="form-control" id="telnr" name="telnr" placeholder="Telefonnummer">
				</div>
			</div>
			<div class="form-group row">
				<label for="zimmernr" class="col-lg-2 col-md-4 col-sm-4 col-xs-4 col-form-label">Zimmernummer:</label>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<input type="text" class="form-control" id="zimmernr" name="zimmernr" placeholder="Zimmernummer">
				</div>
			</div>
						<div class="form-group row">
				<label for="sz" class="col-lg-2 col-md-4 col-sm-4 col-xs-4 col-form-label">Stellenzeichen:</label>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<input type="text" class="form-control" id="sz" name="sz" placeholder="Stellenzeichen">
				</div>
			</div>
						<div class="form-group row">
				<label for="vertretung" class="col-lg-2 col-md-4 col-sm-4 col-xs-4 col-form-label">Vertretungs-ID:</label>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<input type="number" class="form-control" id="vertretung" name="vertretung" placeholder="Vertretungs-ID">
				</div>
			</div>
									<div class="form-group row">
				<label for="ag" class="col-lg-2 col-md-4 col-sm-4 col-xs-4 col-form-label">Arbeitsgruppen-ID:</label>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<input type="number" class="form-control" id="ag" name="ag" placeholder="Arbeitsgruppen-ID">
				</div>
			</div>
			
			<br>

			<button type="submit" class="btn btn-outline-danger" name="signup-submit">Registrieren</button>

			</form>
			</main>
		</body>';
	}

	//elseif ($rolle == 'proband') {
else if ($rolle == 'proband'){
	echo '
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
        <a class="nav-link" href="../php/index_betreuer.php">Zurück zur Startseite<span class="sr-only">(current)</span></a>
      </li>
    </ul>
    </div>
    <div class="w-100"><!--spacer--></div>
	</header>
	<main>
		<h1>Neuen Proband anlegen</h1>
		<p>Bitte füllen Sie alle Felder aus.</p>
		<form  action="signup.inc.php" method="POST">

			<input type="hidden" name="rolle" value="proband">
			<br>

			<div class="form-group row">
				<label for="username" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 col-form-label">Username:</label>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<input type="text" class="form-control" id="username" name="uid" placeholder="Username">
				</div>
			</div>
			<div class="form-group row">
				<label for="email" class="col-lg-2 col-md-4 col-sm-4 col-xs-4 col-form-label">E-Mail:</label>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<input type="email" class="form-control" id="email" name="mail" placeholder="E-mail">
				</div>
			</div>
			<div class="form-group row">
				<label for="password" class="col-lg-2 col-md-4 col-sm-4 col-xs-4 col-form-label">Passwort:</label>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<input type="password" class="form-control" id="password" name="pwd" placeholder="Passwort">
				</div>
			</div>
			<div class="form-group row">
				<label for="password-repeat" class="col-lg-2 col-md-4 col-sm-4 col-xs-4 col-form-label">Passwort bestätigen:</label>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<input type="password" class="form-control" id="password-repeat" name="pwd-repeat" placeholder="Passwort bestätigen">
				</div>
			</div>
			<div class="form-group row">
				<label for="vorname" class="col-lg-2 col-md-4 col-sm-4 col-xs-4 col-form-label">Vorname:</label>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<input type="text" class="form-control" id="vorname" name="vorname" placeholder="Vorname">
				</div>
			</div>
			<div class="form-group row">
				<label for="nachname" class="col-lg-2 col-md-4 col-sm-4 col-xs-4 col-form-label">Nachname:</label>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<input type="text" class="form-control" id="nachname" name="nachname" placeholder="Nachname">
				</div>
			</div>
			<div class="form-group row">
				<label for="telnr" class="col-lg-2 col-md-4 col-sm-4 col-xs-4 col-form-label">Telefonnummer:</label>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<input type="text" class="form-control" id="telnr" name="telnr" placeholder="Telefonnummer">
				</div>
			</div>
			<div class="form-group row">
				<label for="az" class="col-lg-2 col-md-4 col-sm-4 col-xs-4 col-form-label">Aktenzeichen:</label>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<input type="text" class="form-control" id="az" name="az" placeholder="Aktenzeichen">
				</div>
			</div>
			<div class="form-group row">
				<label for="ende" class="col-lg-2 col-md-4 col-sm-4 col-xs-4 col-form-label">Betreuungsende:</label>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<input type="date" class="form-control" id="ende" name="ende" placeholder="Betreuungsende">
				</div>
			</div>
			<div class="form-group row">
				<label for="betreuer" class="col-lg-2 col-md-4 col-sm-4 col-xs-4 col-form-label">Betreuer-ID:</label>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<input type="number" class="form-control" id="betreuer" name="betreuer" placeholder="Betreuer-ID">
				</div>
			</div>

			<br>

			<button type="submit" class="btn btn-outline-danger" name="signup-submit">Registrieren</button>
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
