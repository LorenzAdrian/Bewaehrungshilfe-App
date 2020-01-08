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
<html lang="de">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	 <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
	integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <title>Registrierung Betreuer</title>

</head>

<style>

main{
	align-items: center;
	padding-top: 20px;
	text-align: center;
}

header {
  border-bottom: 2px maroon solid;
}

.form-group{
	display: flex;
	align-items: center;
	justify-content: center;
}

h1{
	font-weight: 300;
}

h4{
	font-weight: 300;
}

label{
	text-align: left;
}

.error {color: #FF0000;}
.success {color: #00CC00;}

</style>

<header>
<nav class="navbar navbar-expand-lg navbar-light bg-light flex-nowrap">
<a class="navbar-brand w-100" href="#">
  <img src="../CSS/image/logoohneschatten.png"  width="50" height="50" alt="Logo" > &nbsp;&nbsp;SoDi4U
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

<?php
//Variablen für Fehler- bzw. Erfolgmeldungen
$emailerr = "";
$usernameerr = "";
$pwdrpterr = "";
$usernamevergeben = "";
$erfolg = "";

//Funktion, um förmliche Korrekheit zu prüfen. Schutz auch gegen Angriffe
  function test_input ($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlentities($data);
    return ($data);
  }

if (isset ($_POST['bet-self-submit'])) {

  include 'dbh.inc.php';

  $rolle = "betreuer";
  $username = test_input($_POST['uid']);
  $email = test_input($_POST['mail']);
  $passwort= test_input($_POST['pwd']);
  $passwortRepeat = test_input($_POST['pwd-repeat']);
  $vorname = test_input($_POST['vorname']);
  $nachname= test_input($_POST['nachname']);
  $telnr = test_input($_POST['telnr']);

  //nur Betreuer
  $zimmernr = test_input($_POST['zimmernr']);
  $sz = test_input($_POST['sz']); //Stellenzeichen
  $vertretung = test_input($_POST['vertretung']);
  $ag = test_input($_POST['ag']);

  if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    //header("Location: anlegen_bet.php?error=invalidusername&mail".$email);
    //exit();
    $usernameerr = "Ungültiger Username!";
  }
  elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //header("Location: anlegen_bet.php?error=invalidmail&uid".$username);
    //exit();
    $emailerr = "Ungültige Email-Adresse!";
  }
  elseif ($passwort !== $passwortRepeat) {
    //header("Location: anlegen_bet.php?error=passwortcheck&uid=".$username."&mail=".$email);
    //exit();
    $pwdrpterr = "Eingaben müssen übereinstimmen!";
  }
  //Check, ob Username schon vergeben
  else{
    $sql = "SELECT username FROM " .$rolle. " WHERE username = ?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: anlegen_bet.php?error=sqlerror");
      exit();
    }
    else{
      mysqli_stmt_bind_param($stmt, "s", $username);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resultCheck = mysqli_stmt_num_rows($stmt);
      if ($resultCheck > 0) {
        //header("Location: anlegen_bet.php?error=usertaken&mail=".$email);
        //exit();
        $usernamevergeben = "Username schon vergeben!";
      }

      //Eintragung in Datenbank: Betreuer
      elseif ($rolle=="betreuer"){
        $sql = "INSERT INTO betreuer(vorname, nachname, email, username, passwort, telnr,
          zimmernr, stellenzeichen, agid) VALUES (?,?,?,?,?,?,?,?,?)";

        //Vetrtretung ist NULL Feld, deshalb extra Check.
        if(!empty($vertretung)){
          $sql = "INSERT INTO betreuer(vorname, nachname, email, username, passwort, telnr,
          zimmernr, stellenzeichen, vertretung, agid) VALUES (?,?,?,?,?,?,?,?,?,?)";
        }
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          //trigger_error(mysqli_error($conn), E_USER_ERROR);
          header("Location: anlegen_bet.php?error=sqlerror");
          exit();
        }
        else {
          //Paswort wird gehasht (! Hash != Verschlüsselung).
          $hashedPwd = password_hash($passwort, PASSWORD_DEFAULT);
          //Vetrtretung ist NULL Feld, deshalb extra Check.
          if (!empty($vertretung)){
            mysqli_stmt_bind_param($stmt, "ssssssssii", $vorname, $nachname, $email, $username, $hashedPwd,
                $telnr, $zimmernr, $sz, $vertretung, $ag);
          }
            else {
            mysqli_stmt_bind_param($stmt, "ssssssssi", $vorname, $nachname, $email, $username, $hashedPwd,
            $telnr, $zimmernr, $sz, $ag);
            }
          if (mysqli_stmt_execute($stmt) == TRUE){
            $erfolg = "$username erfolgreich angelegt!";
            echo "<script type='text/javascript'>alert('$erfolg'); window.location = 'anlegen_bet.php'</script>";
          } else {
            echo "ERROR: ";
            echo mysqli_stmt_error($stmt);
          }
          //header("Location: anlegen_bet.php?signup=success".$username);
          //exit();
          mysqli_stmt_close($stmt);
          mysqli_close($conn);
        }
      }
    }
  }
}
?>
		<main>
			<h1>Neuen Betreuer anlegen</h1>
			<p>Bitte füllen Sie alle Felder aus.</p>
			<form action="<?php echo ($_SERVER["PHP_SELF"]);?>" method="POST">
				<input type="hidden" name="rolle" value="betreuer">
				<br>
				    <div class="form-group row">
      <label for="username" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 col-form-label">Username:</label>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <input type="text" class="form-control" id="username" name="uid" placeholder="Username" value="<?php if ( isset($username) ) {echo $username;} ?>" required>
        <!--<span class = "error"><?php //echo $usernameerr; ?></span>
        <span class = "error"><?php //echo $usernamevergeben; ?></span> -->
      </div>
    </div>
			     <div class="form-group row">
				<label for="email" class="col-lg-2 col-md-4 col-sm-4 col-xs-4 col-form-label">E-Mail:</label>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<input type="email" class="form-control" id="email" name="mail" placeholder="E-mail" value="<?php if ( isset($email) ) {echo $email;} ?>" required>
				<!-- <span class = "error"><?php //echo $emailerr; ?></span> -->
				</div>
			</div>
   <div class="form-group row">
      <label for="password" class="col-lg-2 col-md-4 col-sm-4 col-xs-4 col-form-label">Passwort:</label>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <input type="password" class="form-control" id="password" name="pwd" placeholder="Passwort" required>
        <!--<span class = "error"><?php //echo $pwdrpterr; ?></span>
      </div>
    </div>
    <div class="form-group row">
      <label for="password-repeat" class="col-lg-2 col-md-4 col-sm-4 col-xs-4 col-form-label">Passwort bestätigen:</label>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <input type="password" class="form-control" id="password-repeat" name="pwd-repeat" placeholder="Passwort bestätigen" required>
        <span class = "error"><?php //echo $pwdrpterr; ?></span>
      </div>
    </div>
		<div class="form-group row">
				<label for="vorname" class="col-lg-2 col-md-4 col-sm-4 col-xs-4 col-form-label">Vorname:</label>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<input type="text" class="form-control" id="vorname" name="vorname" placeholder="Vorname" value="<?php if ( isset($vorname) ) {echo $vorname;} ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label for="nachname" class="col-lg-2 col-md-4 col-sm-4 col-xs-4 col-form-label">Nachname:</label>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<input type="text" class="form-control" id="nachname" name="nachname" placeholder="Nachname" value="<?php if ( isset($nachname) ) {echo $nachname;} ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label for="telnr" class="col-lg-2 col-md-4 col-sm-4 col-xs-4 col-form-label">Telefonnummer:</label>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<input type="text" class="form-control" id="telnr" name="telnr" placeholder="Telefonnummer" value="<?php if ( isset($telnr) ) {echo $telnr;} ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label for="zimmernr" class="col-lg-2 col-md-4 col-sm-4 col-xs-4 col-form-label">Zimmernummer:</label>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<input type="text" class="form-control" id="zimmernr" name="zimmernr" placeholder="Zimmernummer" value="<?php if ( isset($zimmernr) ) {echo $zimmernr;} ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label for="sz" class="col-lg-2 col-md-4 col-sm-4 col-xs-4 col-form-label">Stellenzeichen:</label>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<input type="text" class="form-control" id="sz" name="sz" placeholder="Stellenzeichen" value="<?php if ( isset($sz) ) {echo $sz;} ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label for="vertretung" class="col-lg-2 col-md-4 col-sm-4 col-xs-4 col-form-label">Vertretungs-ID:</label>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<input type="number" class="form-control" id="vertretung" name="vertretung" placeholder="Vertretungs-ID" value="<?php if ( isset($vertretung) ) {echo $vertretung;} ?>">
				</div>
			</div>
			<div class="form-group row">
				<label for="ag" class="col-lg-2 col-md-4 col-sm-4 col-xs-4 col-form-label">Arbeitsgruppen-ID:</label>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<input type="number" class="form-control" id="ag" name="ag" placeholder="Arbeitsgruppen-ID" value="<?php if ( isset($ag) ) {echo $ag;} ?>" required>
				</div>
			</div>
			<br>
				<button type="submit" class="btn btn-outline-danger" name="bet-self-submit">Betreuer Registrieren</button>

				<div class = "error"><?php echo $usernameerr; ?></div>
				<div class = "error"><?php echo $usernamevergeben; ?></div>
				<div class = "error"><?php echo $emailerr; ?></div>
				<div class = "error"><?php echo $pwdrpterr; ?></div>
			</form>
      <br>
      <!--<div class = "success"><?php //echo $erfolg; ?></div>-->
		</main>
