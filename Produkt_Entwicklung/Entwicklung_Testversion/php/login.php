<?php
//require "header_Betreuer.php";
//include ("includes/login.inc.php");


// Die Login Seite.
 ?>

<!DOCTYPE html>
<html>

	<head>

	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Style CSS -->
  <link rel="stylesheet" href="loginstyle.css">
  <!--Bootstrap CSS-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <!-- Fontawesome icon library -->
   <script src="https://kit.fontawesome.com/5d0d55aa82.js"></script>
  <!-- LINK TEST -->
  <script src="../javascript/button.js"></script>

  <title>Startseite</title>
  <link rel="icon" type="image/x-icon" href="../css/image/sodibaer.png" >
		
	</head>

<body>
<!-- Header -->
<header>
<nav class="navbar navbar-expand-lg navbar-light bg-light flex-nowrap">

<a class="navbar-brand w-100" href="#">
  <img src="../CSS/image/logoohneschatten.png"  width="50" height="50" alt="Logo" > &nbsp;&nbsp;SoDi4U
</a>
<div class="w-100"><!--spacer--></div>
<div class="w-100"><!--spacer--></div>
<div class="w-100"><!--spacer--></div>
<div class="w-100"><!--spacer--></div>
<div class="w-100"><!--spacer--></div>
 <div class="navbar-collapse collapse w-100" id="navbar5">
    <ul class="navbar-nav mx-auto">
<!-- Aktuelle Seite -->
  <li class="nav-item active">
    <a class="nav-link" href="../php/index_betreuer.php">Startseite<span class="sr-only">(current)</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="login.php">Abmelden</a>
  </li>
</ul>
</div>
<div class="w-100"><!--spacer--></div>
</header>

	<!-- LOGIN CONTAINER -->
	<div class="container login-container text-align-center d-flex justify-content-center">
    <div class="row">
      <div class="col-lg-12">
        <form class="login-form">
            <div class="form-check">
              <h2>Anmeldung</h2>
              <input type="checkbox" class="form-check-input checkbox"  id="betreuer" >
              <label for="betreuer">Betreuer</label>
            </div>
        </form>
        <form class="form-signin">
          <div class="form-label-group">
              <input type="text" id="mailuid" class="form-control" placeholder="Bitte Geben Sie Ihren Benutzernamen ein"
                  name="mailuid" required autofocus>
          </div>
          <br>
          <div class="form-label-group input-group">
              <input type="password" id="passwort" class="form-control" placeholder="Bitte geben Sie Ihr Passwort ein"
                  name="password" required>
              <div class="input-group-append">
                <span class="input-group-text">
                  <i id="eye" class="far fa-eye-slash" onclick="showHidePwd();"></i>
                </span>
              </div>
          </div>
          <br>
          <button class="btn btn-lg btn-danger btn-block" type="button" name="login" id="login_btn" value="Login">LOGIN</button>
        </form>
      </div>
    </div>
  </div>
        <div class = "message" id = "message" style= "text-align: center"></div>

	<!-- FOOTER -->
 	<footer id="sticky-footer" class="py-2 bg-dark text-white-50">
    <div class="container footer-container">
      <li>
        <a href="datenschutz.html">Datenschutz</a>
      </li>
      <li>
        <a href="impressum.html">Impressum</a>
      </li>
      <li>
        <a href="kontakt.html">Kontakt</a>
      </li>
    </div>
  </footer>
</body>
</html>

	<script src="../javascript/jquery-3.4.1.js"></script>
	<script src="../javascript/scriptLogin.js"></script>
