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

	</head>

	<body>
	<!-- HEADER -->
	<header>
      <div class="icon">
          <img src="../CSS/image/Baericon.jpeg" alt="">
      </div>
      <div class="icon-text">
          <h4 class="mb-5 font-weight-light text-uppercase">Herzlich Willkommen bei SoDi</h4>
      </div>
	</header>

	<!-- LOGIN CONTAINER -->
	<div class="login-container d-flex justify-content-center align-items-center">
        <form class="login-form text-center">
          <h5 class="mb-5 font-weight-light text-uppercase">Anmeldung</h5>
          <div class="form-group">
          	<div class="form-check">
              <label for="remember">Betreuer?</label>
              <input type="checkbox" class="form-check-input checkbox" id="betreuer">
          	</div>
				<input type="text" class="form-control rounded-pill form-control-lg" name="mailuid" id="mailuid"
				placeholder="Geben Sie bitte Ihren Benutzernamen ein. (Beispiel: MaxMueller)">
          	</div>
            <div class="form-group">
              <table>
                <tr>
                  <td>
                    <input type="password" class="form-control rounded-pill form-control-lg"  name="passwort" id="passwort"
                    placeholder="Geben Sie bitte Ihr Passwort ein." size="45">
                  </td>
                  <td>
                    <input type="checkbox" onclick="pwdShow()" id="checkPwd" hidden>
                    <label for="checkPwd">&#128065;</label>
                  </td>
                </tr>
              </table>
            </div>
            <button type="button" class="btn-btn-primary btn-block rounded-pill button-lg" name="login" id="login_btn" value="Login">Login</button>
            <div class = "message" id = "message"></div>
        </form>
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
