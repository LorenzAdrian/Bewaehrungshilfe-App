<!DOCTYPE html>
<html>
	<head>
	</head>

	<body>
		<main>
			<div>
				<h1>Login</h1>
			</div>
			<div id="message"></div>
			<br>	
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

<script src="../JS/jquery-3.4.1.js"></script>
<script src="../JS/scriptLogin.js"></script>



