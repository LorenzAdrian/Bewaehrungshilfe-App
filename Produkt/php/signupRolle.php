<?php
//require 'header_Betreuer.php';
?>

<!-- Check, ob ein Proband oder ein Betreuer (in der Datenbank) registriert werden soll.-->
<!DOCTYPE html>
<html>
    <head>
	</head>

	<body>
		<main>
			<h1>Registrierung</h1>
			<h3>Als Betreuer, Admin oder  Proband registrieren?</h3>
			<br>
			<form  action="signup.php" method="POST">
			   <input type="radio" name="rolle" value="admin" checked>Admin
				<br> 
				<input type="radio" name="rolle" value="betreuer" checked>Betreuer
				<br> 
				<input type="radio" name="rolle" value="proband">Proband
				<br>
				<br>
				<button type="submit" name="signupRolle-submit" value="Select a Radio Button">Weiter</button>
			</form>
			<br>
			<a href="Login.php">Zurück zum Login</a>
		</main>

	</body>
</html>

<?php
//require 'footer.php';
?>

