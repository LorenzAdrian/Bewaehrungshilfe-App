<!DOCTYPE html>
<<<<<<< HEAD
<html>

	<head>

	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
	integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<!-- Bootstrap -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	
	</head>
	<style>
	h4{
		font-weight: 300;
	}
	main{
		padding-top: 20px;
		text-align: center;
	}
	</style>
=======
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
	padding-top: 50px;
	text-align: center;
}

form{
	text-align: center;
}

h1{
	font-weight: 300;
}

h4{
	font-weight: 300;
}

</style>


>>>>>>> parent of 8c319b8... Revert "Merge branch 'master' of https://github.com/LorenzAdrian/Bewaehrungshilfe-App"
<?php
 //Check, ob die vorherige Seite bearbeitet wurde.
if(isset($_POST['signupcheck-submit'])) {
	$rolle = $_POST['rolle'];

	//Angezeigte Felder sind abhängig von der Rolle.

	if ($rolle == 'betreuer') {
		echo '
<<<<<<< HEAD
		<header>
  			<nav class="navbar navbar-expand-lg navbar-light bg-light flex-nowrap">
				<a class="navbar-brand" href="#">
				<img src="../CSS/image/Baericon.jpeg"  width="30" height="30" alt="Logo" > &nbsp;&nbsp;Sodi 4u
				</a>
    			<h4>Registrierung</h4>
  			</nav>
		</header>
		<main>
		<h3>Betreuer</h3>
		<p>Bitte füllen Sie alle Felder aus.</p>
		<form  action="signup.inc.php" method="POST">
=======
		<body>
			<header>
			<nav class="navbar navbar-expand-lg navbar-light bg-light flex-nowrap">
				<a class="navbar-brand" href="#">
				<img src="../CSS/image/Baericon.jpeg"  width="30" height="30" alt="Logo" > &nbsp;&nbsp;Sodi 4u
				</a>
				<h4>Registrierung</h4>
			</nav>
			</header>
			
			<main>
				<h1>Betreuer</h1>
				<p>Bitte füllen Sie alle Felder aus.</p>
				<form action="signup.inc.php" method="POST">
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
				<a class="navbar-brand" href="#">
				<img src="../CSS/image/Baericon.jpeg"  width="30" height="30" alt="Logo" > &nbsp;&nbsp;Sodi 4u
				</a>
				<h4>Registrierung</h4>
			</nav>
			</header>
>>>>>>> parent of 8c319b8... Revert "Merge branch 'master' of https://github.com/LorenzAdrian/Bewaehrungshilfe-App"

			<main>
			<h1>Admin</h1>
			<p>Bitte füllen Sie alle Felder aus.</p>
			<form  action="signup.inc.php" method="POST">

<<<<<<< HEAD
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
			<button type="submit" class="btn btn-outline-danger" name="signup-submit">Registrieren</button>
		</form>
		</main>';
	}
	else if ($rolle == 'admin') {
		echo '
		<header>
  			<nav class="navbar navbar-expand-lg navbar-light bg-light flex-nowrap">
				<a class="navbar-brand" href="#">
				<img src="../CSS/image/Baericon.jpeg"  width="30" height="30" alt="Logo" > &nbsp;&nbsp;Sodi 4u
				</a>
    			<h4>Registrierung</h4>
  			</nav>
		</header>
		<main>
		<h3>Admin</h3>
		<p>Bitte füllen Sie alle Felder aus.</p>
		<form  action="signup.inc.php" method="POST">

			<input type="hidden" name="rolle" value="admin">
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
			<button type="submit" class="btn btn-outline-danger" name="signup-submit">Registrieren</button>
		</form>
		</main>';
=======
				<input type="hidden" name="rolle" value="admin">
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
				<button type="submit" class="btn btn-outline-danger" name="signup-submit">Registrieren</button>
			</form>
			</main>
		</body>';
>>>>>>> parent of 8c319b8... Revert "Merge branch 'master' of https://github.com/LorenzAdrian/Bewaehrungshilfe-App"
	}

	//elseif ($rolle == 'proband') {
else if ($rolle == 'proband'){
	echo '
<<<<<<< HEAD
		<header>
			<nav class="navbar navbar-expand-lg navbar-light bg-light flex-nowrap">
				<a class="navbar-brand" href="#">
				<img src="../CSS/image/Baericon.jpeg"  width="30" height="30" alt="Logo" > &nbsp;&nbsp;Sodi 4u
				</a>
				<h4>Registrierung</h4>
			</nav>
		</header>
		<main>
		<h3>Proband</h3>
=======
	<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-light bg-light flex-nowrap">
			<a class="navbar-brand" href="#">
			<img src="../CSS/image/Baericon.jpeg"  width="30" height="30" alt="Logo" > &nbsp;&nbsp;Sodi 4u
			</a>
			<h4>Registrierung</h4>
		</nav>
	</header>	
	<main>
		<h1>Proband</h1>
>>>>>>> parent of 8c319b8... Revert "Merge branch 'master' of https://github.com/LorenzAdrian/Bewaehrungshilfe-App"
		<p>Bitte füllen Sie alle Felder aus.</p>
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