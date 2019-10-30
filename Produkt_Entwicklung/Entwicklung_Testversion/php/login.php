<?php
//require "header_Betreuer.php";
//include ("includes/login.inc.php");


// Die Login Seite.
 ?>

<!DOCTYPE html>
<html>
	<head>
	
	<?php include '../includes/header.html';
   	 ?>
    
	<link rel="stylesheet" href="../CSS/loginstyle.css">

	</head>

	<body>
	<header>
        <div class="menubar">
            <div class="logo">
                <img src="../CSS/image/1000-Berliner_Baer.svg.png" alt="logo" class="berlin_logo">
            </div>
            <ul class="menu">
                <li>
                    <a href="index.html" class="nav-link">Über Uns1</a>
                </li>
                <li>
                        <a href="#kontakt" class="nav-link">Kontakt</a>
                </li>
                <li>
                        <a href="#fragen" class="nav-link">Fragen</a>
                </li>
            </ul>
		</div>
	</header>
    <section class="soziale">
        <h1>Herzlich Willkommen</h1>
        <h2>bei den Sozialen Diensten Berlin</h2>
    </section>

	<main>
			<div class="login">
				<h1>Login</h1>
			</div>

			<div id="message"></div>
				<br>
        		<div class="loginfenster">

				<span>Sind Sie ein Betreuer?</span>

				<input type="checkbox" class="checkbox" name="rolle" id="betreuer" value="betreuer">
				<br><br>
				<div id="error"></div>
				<input type="text" name="mailuid" id="mailuid" placeholder="Geben Sie bitte Ihren Bernutzernamen ein. (Beispiel: MaxMueller)">
				<br><br>
				<input type="password" name="passwort" id="passwort" placeholder="Geben Sie bitte Ihr Passwort ein.">
				<br><br><br>
				<input type="button"  name="login" id="login_btn" value="Login">
            </div>

			<br>
			<br>
		<!--	<div>
				Neu hier?
				<a href="signupcheck.php">Registrierung</a>
			</div>-->

	</main>
	</body>
</html>


<script src="../javascript/jquery-3.4.1.js"></script>
<script src="../javascript/scriptLogin.js"></script>

<?php
//require 'footer.php';
?>
