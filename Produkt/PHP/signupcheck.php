<!-- Check, ob ein Proband oder ein Betreuer (in der Datenbank) registriert werden soll.-->
<!DOCTYPE html>
<html>
   	<head>
	</head>

	<body>
		<main>
			<h1>Registrierung</h1>
			<h3>Als Betreuer oder als Proband registrieren?</h3>
			<br>
			<form  action="signup.php" method="POST">
				<input type="radio" name="rolle" value="betreuer">Betreuer
				<br> 
				<input type="radio" name="rolle" value="proband">Proband
				<br>

				<button type="submit" name="signupcheck-submit" value="Select a Radio Button">Weiter</button>
			</form>
		</main>

	</body>
</html>


