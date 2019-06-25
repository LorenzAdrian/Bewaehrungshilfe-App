<?php
//require "header_Betreuer.php";
//include ("includes/login.inc.php");
 ?>

<!DOCTYPE html>
<html>
	<head>
        <link rel="stylesheet" href="loginstyle.css">
        
            <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
	</head>
    <title>Login</title>

	<body>
		<main>
            <div class="logo"></div>
			<div class="login">
				<h1>LOGIN</h1>
			</div>
			<div id="message"></div>
			<br>
            <div class="loginfenster">
			<span>Sind Sie ein Betreuer?</span>
			<input type="checkbox" name="rolle" id="betreuer" value="betreuer">
			<br> 
			<br>
			<div id="error"></div>
			<input type="text" name="mailuid" id="mailuid" placeholder="Username/Email">
            
            <br>
			<input type="password" name="passwort" id="passwort" placeholder="Passwort">
			<br>
			<br>
			<input type="button"  name="login" id="login_btn" value="Login">
            </div>
			<!--
			<br>
			<br>			
			<div>
				Neu hier?
				<a href="signupRolle.php">Registrierung</a>
			</div>
			-->
		</main>
	</body>
</html>

<script src="js/jquery-3.4.1.js"></script>
<script src="js/scriptLogin.js"></script>

<?php
//require 'footer.php';
?>
