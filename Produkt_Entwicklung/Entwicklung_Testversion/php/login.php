


<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="../CSS/styleAnmeldung.css">
 <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
 <meta charset="utf-8">
	</head>

	<body>
		<main>

			<div>
				<h1>Login</h1>
			</div>
			<div id="message"></div>
			<br>
				<div class=Menue>
			<span>Sind Sie ein Betreuer?</span>
			<input type="checkbox" name="rolle" id="betreuer" value="betreuer">
			<br>
			<br>
			<div id="error"></div>
			<input type="text" name="mailuid" id="mailuid" placeholder="Username/Email">
			<input type="password" name="passwort" id="passwort" placeholder="Passwort">
			<br>
			<br>
			<input type="button"  name="login" id="login_btn" value="Login">
  </div>
			<br>
			<br>
			<div>
				Neu hier?
				<a href="signupcheck.php">Registrierung (nur zur Befüllung der Datenbank, wegen gehashtem Passwort)</a>
				<!-- <a href="signupRolle.php"> für JQuery Registrierung  -->
			</div>

		</main>
	</body>
</html>

<script src="../javascript/jquery-3.4.1.js"></script>
<script src="../javascript/scriptLogin.js"></script>
