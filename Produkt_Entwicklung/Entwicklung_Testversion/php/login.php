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
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
   <!-- Fontawesome icon library -->
   <script src="https://kit.fontawesome.com/5d0d55aa82.js"></script>
  <!-- LINK TEST -->
  <script src="../javascript/button.js"></script>

  <title>Startseite</title>

	</head>

<body>
<!-- Header -->
<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light flex-nowrap">
    <a class="navbar-brand" href="#">
      <img src="../CSS/image/Baericon.jpeg"  width="30" height="30" alt="Logo" > &nbsp;&nbsp;Sodi 4u
    </a>
    <h4>Herzlich Willkommen</h4>
  </nav>
</header>

	<!-- LOGIN CONTAINER -->
	<div class="container-fluid login-container d-flex justify-content-center align-items-center">
    <div class="row">
      <div class="col-lg-12 col-md-12">
    <form class="login-form d-flex text-center">
      <div class="form-group">
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
          <div class="form-label-group input-group">
              <input type="password" id="passwort" class="form-control" placeholder="Bitte geben Sie Ihr Passwort ein"
                  name="password" required>
              <div class="input-group-append">
                <span class="input-group-text">
                  <i id="eye" class="far fa-eye-slash" onclick="showHidePwd();"></i>
                </span>
              </div>
          </div>
          <button class="btn btn-lg btn-danger btn-block" type="button" name="login" id="login_btn" value="Login">LOGIN</button>
      </form>
      
        <div class = "message" id = "message"></div>
      </div>
    
    </div>
    </div>
	</div>


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
