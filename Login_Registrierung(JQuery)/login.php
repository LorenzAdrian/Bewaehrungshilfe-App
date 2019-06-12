<?php
//require "header_Betreuer.php";
//include ("includes/login.inc.php");
 ?>

<!DOCTYPE html>
<html>
	<head>
	</head>

	<body>
		<main>
			<div id="message"></div>
			<br>			
			<input type="radio" name="rolle" id="betreuer" value="betreuer" checked>Betreuer
			<br> 
			<input type="radio" name="rolle" id="proband" value="proband">Proband
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
				<a href="signupRolle.php">Registrierung</a>
			</div>
		</main>
	</body>
</html>

<script src="js/jquery-3.4.1.js"></script>
<script src="js/scriptLogin.js"></script>

<?php
//require 'footer.php';
?>


