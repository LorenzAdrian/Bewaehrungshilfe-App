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

    <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
	integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<!-- Bootstrap -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<!-- Style CSS -->
	<link rel="stylesheet" href="loginstyle.css">

  <!-- LINK TEST -->
  <script src="../javascript/button.js"></script>

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
          <input type="checkbox" class="form-check-input checkbox" id="betreuer">
          <label for="remember">Betreuer?</label> <br>
		  <input type="checkbox" class="form-check-input checkbox" id="admin">
          <label for="remember">Admin?</label> 
          <input type="text" class="form-control rounded-pill form-control-md" name="mailuid" id="mailuid"
          placeholder="Geben Sie bitte Ihren Benutzernamen ein.">
          <input type="password" class="form-control rounded-pill form-control-md"  name="passwort" id="passwort"
          placeholder="Geben Sie bitte Ihr Passwort ein." size="100">
        </div>
        <div class="form-button">
          <button type="button" class="btn btn-info rounded-pill btn-block" name="showpassword" id="showpassword" value="Passwort anzeigen">Passwort anzeigen</button> 
          <button type="button" class="btn btn-danger rounded-pill btn-block" name="login" id="login_btn" value="Login">Einloggen</button>
        </div>
        <div class = "message" id = "message"></div>
      </div>
    </form>
    </div>
    </div>
	</div>
  

	<!-- FOOTER -->
 	<footer id="sticky-footer" class="py-2 bg-dark text-white-50">
    <div class="container footer-container">
      <small>Datenschutz</small>
      <small>Impressum</small>
      <small>Kontakt</small>
    </div>
  </footer>

</body>
</html>


	<script src="../javascript/jquery-3.4.1.js"></script>
	<script src="../javascript/scriptLogin.js"></script>
