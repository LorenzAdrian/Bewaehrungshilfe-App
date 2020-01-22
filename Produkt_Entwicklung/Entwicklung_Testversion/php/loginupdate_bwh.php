<?php
include 'dbh.inc.php';

if(!isset($_SESSION))
{
    session_start();
}

// Check user login or not
if(!isset($_SESSION['userId'])){
    header('Location: login.php');
}

// Check, ob User ein Admin
$check = $_SESSION['rolle'];
if ($check !== "admin") {
  header('Location:login.php');
}

?>

<!DOCTYPE html>
<html lang="de" dir="ltr">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!--- Pfad zu den CSS Dateien--------------------------->
    <link rel="stylesheet" href="../CSS/termine_proband.css">
		<link rel="stylesheet" href="../CSS/header_prob.css">
		<link rel="stylesheet" href="../CSS/footer_pro.css">
		<link rel="stylesheet" href="../CSS/passwortAendern.css">
    <!--Schriftart aus google fonts------------------------->
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

	 <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
	integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<!-- Fontawesome icon library -->
   <script src="https://kit.fontawesome.com/5d0d55aa82.js"></script>

	<!-- Funktion, um Passwort anzuzeigen -->
	<script src="../javascript/passwortAendernAuge.js"></script>

	<!--- Pfad zur style.css--------------------------->
	<link rel="stylesheet" href="../CSS/index_proband.css">
	<link rel="stylesheet" href="../CSS/header_prob.css">
		<link rel="stylesheet" href="../CSS/passwortAendern.css">
	<!--Schriftart aus google fonts------------------>
	<link href="https://fonts.googleapis.com/css?family=Assistant:200,300,400,600,700&display=swap"  rel="stylesheet">
	<!-- Stylesheet für Icons-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<title>SoDi4U - Login-Info ändern</title>
	<link rel="icon" type="image/x-icon" href="../CSS/image/sodibaer.png" >

	<!-- Meldungen rot bzw. grün markieren -->
	<style>
  main{
  align-items: center;
  padding-top: 20px;
  text-align: center;
}
form{
  width: 50%;
  margin-left : 25%
}

	.error {color: #FF0000;}
	.success {color: #00CC00;}
	</style>

</head>
<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light flex-nowrap">
  <a class="navbar-brand w-100" href="#">
    <img src="../CSS/image/LogoOhneSchatten.png"  width="50" height="50" alt="Logo" > &nbsp;&nbsp;SoDi4U
    </a>
  <div class="w-100"><!--spacer--></div>
  <div class="w-100"><!--spacer--></div>
  <div class="w-100"><!--spacer--></div>
  <div class="w-100"><!--spacer--></div>
   <div class="navbar-collapse collapse w-100" id="navbar5">
    <ul class="navbar-nav mx-auto">
    <!-- Aktuelle Seite -->
    <li class="nav-item active">
    <a class="nav-link" href="../php/index_admin.php">Zurück zur Startseite<span class="sr-only">(current)</span></a>
    </li>
  </ul>
  </div>
  <div class="w-100"><!--spacer--></div>
  </header>
  </nav>
  <!--<hr class="hr-sodi"> --> <!-- Gehört zum Header -->

<?php

$passwortNeu = "";
$passwortRepeat = "";
if (isset ($_POST['loginfo-aendern-bet-submit'])){
  $bid = $_POST['bid'];
  $username = $_POST['username'];
}
$pwdErfolg = "";
$pwdRptErr = "";

//Funktion, um förmliche Korrekheit zu prüfen. Schutz auch gegen Angriffe
  function test_input ($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlentities($data);
    return ($data);
  }

if (isset ($_POST['loginInfoAendern'])) {
  $username = test_input($_POST['username']);
  $bid = test_input($_POST['bid']);
  $passwortNeu = test_input($_POST['pwd-neu']);
  $passwortRepeat = test_input($_POST['pwd-repeat']);

  //"Neues Passwort" und "Neues Passwort wiederholen" stimmen überein?
  if ($passwortNeu !== $passwortRepeat){
    $pwdRptErr = "Eingaben müssen übereinstimmen!";
  }
  else {
    $sql = "UPDATE betreuer SET passwort = ?, username = ? WHERE bid = ?";
    $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: loginupdate_bwh.php?error=sqlerror");
        exit();
        } else {
          //Passwort wird gehasht (verschlüsselt)
          $hashedPwd = password_hash($passwortNeu, PASSWORD_DEFAULT);
          //Passwort wird aktualisiert
          mysqli_stmt_bind_param($stmt, 'ssi', $hashedPwd, $username, $bid);
          mysqli_stmt_execute($stmt);
          $erfolg = "Information für Benutzer mit ID $bid wurde erfolgreich geändert!";
          echo "<script type='text/javascript'>alert('$erfolg'); window.location = 'index_admin.php'</script>";
          //header("Location: index_proband.php?passwortAendern=success");
          //exit();
        }
      }
}

?>

<main>
  <h1 style="text-align: center;">Bearbeiten</h1>
  <p style="text-align: center;">Login-Info (BWH)</p>
  <!--<p><span class="error">* erforderliche Eingabe</span></p>-->
<form action="<?php echo ($_SERVER["PHP_SELF"]);?>" method="POST">
	<!--<input type="hidden" name="uid" value="<?php echo $userID;?>">-->

        <h2>Login-Info ändern</h2>
        <br>


<div class="form-row">
<div class="form-group col-lg-12 ">
        <label>ID-Nummer:&nbsp</label>
          <input type="text" class="form-control" name="bid" autocomplete="off" value="<?php if (isset($bid)) {echo $bid;} ?>" readonly>
		 </div>
     </div>
     <div class="form-row">
       <div class="form-group col-lg-12 ">
          <label>Username:&nbsp</label>
            <input type="text" class="form-control" name="username" autocomplete="off" value="<?php if (isset($username)) {echo $username;} ?>" required>
      </div>
    </div>
    <br>
    <div class="form-row">
      <div class="form-group col-lg-12 ">
        <div class="form-label-group input-group">
          <input type="password" class="form-control"  name="pwd-neu" id="pwd-neu"
              placeholder="Geben Sie das neue Passwort ein." size="50" required>
        <div class="input-group-append">
            <span class="input-group-text">
              <i id="eye2" class="far fa-eye-slash" onclick="showHidePwd2();"></i>
            </span>
    </div>
  </div>
</div>
</div>
  <br>
  <div class="form-row">
    <div class="form-group col-lg-12 ">
      <div class="form-label-group input-group">
        <input type="password" class="form-control"  name="pwd-repeat" id="pwd-repeat"
            placeholder="Wiederholen Sie bitte das neue Passwort." size="50" required>
      <div class="input-group-append">
          <span class="input-group-text">
              <i id="eye3" class="far fa-eye-slash" onclick="showHidePwd3();"></i>
          </span>
          </div>
    </div>
  </div>
		</div>
		  <br>
			<button class="btn btn-lg btn-danger btn-block" type="submit" name="loginInfoAendern" id="loginInfoAendern">Login-Info ändern</button>

		<div class="error4"><?php echo $pwdRptErr;?></div>


</form>
</main>
