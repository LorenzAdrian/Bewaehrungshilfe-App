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
if ($check !== "betreuer") {
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

  <title>Registrierung Proband</title>

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
  <a class="nav-link" href="../php/index_betreuer.php">Zurück zur Startseite<span class="sr-only">(current)</span></a>
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

if (isset ($_POST['prob-self-submit'])){

  include 'dbh.inc.php';

  $rolle = "proband";
  $username = test_input($_POST['uid']);
  $email = test_input($_POST['mail']);
  $passwort= test_input($_POST['pwd']);
  $passwortRepeat = test_input($_POST['pwd-repeat']);
  $vorname = test_input($_POST['vorname']);
  $nachname= test_input($_POST['nachname']);
  $telnr = test_input($_POST['telnr']);

  //nur Proband
  $az = test_input($_POST['az']); //Aktenzeichen
  $ende = test_input($_POST['ende']); //Betreuungsende
  $betreuer = test_input($_POST['betreuer']); //BetreuerID

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
  else{
    $sql = "SELECT username FROM " .$rolle. " WHERE username = ?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: anlegen_bet.php?error=sqlerror");
      exit();
    }

    //stmt wird ausgeführt
    else{
      mysqli_stmt_bind_param($stmt, "s", $username);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resultCheck = mysqli_stmt_num_rows($stmt);

      //Check, ob Username schon vergeben.
      if ($resultCheck > 0) {
        header("Location: anlegen_bet.php?error=usertaken&mail=".$email);
        //exit();
        $usernamevergeben = "Username schon vergeben!";
      }

      //Eintragung in Datenbank: Proband.
			elseif ($rolle=="proband"){
				$sql = "INSERT INTO proband(vorname, nachname, email, username, passwort,
					telnr, aktenzeichen, betreuungsende, bid) VALUES (?,?,?,?,?,?,?,?,?)";
				$stmt = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($stmt, $sql)) {
					//trigger_error(mysqli_error($conn), E_USER_ERROR);
					header("Location: anlegen_prob.php?error=sqlerror2");
					exit();
				}
				else {
					//Paswort wird gehasht.
					$hashedPwd = password_hash($passwort, PASSWORD_DEFAULT);
					mysqli_stmt_bind_param($stmt, "ssssssssi", $vorname, $nachname, $email, $username, $hashedPwd,
					$telnr, $az, $ende, $betreuer);
					mysqli_stmt_execute($stmt);
          $erfolg = "$username erfolgreich angelegt!";
          echo "<script type='text/javascript'>alert('$erfolg'); window.location = 'anlegen_prob.php'</script>";
					//header("Location: login.php?signup=success.$username");
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
  <h1>Neuen Proband anlegen</h1>
  <p>Bitte füllen Sie alle Felder aus.</p>
  <form  action="<?php echo ($_SERVER["PHP_SELF"]);?>" method="POST">

    <input type="hidden" name="rolle" value="proband">
    <br>

    <div class="form-group row">
      <label for="username" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 col-form-label">Username:</label>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <input type="text" class="form-control" id="username" name="uid" placeholder="Username" value="<?php if ( isset($username) ) {echo $username;} ?>" required>
        <span class = "error"><?php echo $usernameerr; ?></span>
        <span class = "error"><?php echo $usernamevergeben; ?></span>
      </div>
    </div>
    <div class="form-group row">
      <label for="email" class="col-lg-2 col-md-4 col-sm-4 col-xs-4 col-form-label">E-Mail:</label>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <input type="email" class="form-control" id="email" name="mail" placeholder="E-mail" value="<?php if ( isset($email) ) {echo $email;} ?>" required>
        <span class = "error"><?php echo $emailerr; ?></span>
      </div>
    </div>
    <div class="form-group row">
      <label for="password" class="col-lg-2 col-md-4 col-sm-4 col-xs-4 col-form-label">Passwort:</label>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <input type="password" class="form-control" id="password" name="pwd" placeholder="Passwort" required>
        <span class = "error"><?php echo $pwdrpterr; ?></span>
      </div>
    </div>
    <div class="form-group row">
      <label for="password-repeat" class="col-lg-2 col-md-4 col-sm-4 col-xs-4 col-form-label">Passwort bestätigen:</label>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <input type="password" class="form-control" id="password-repeat" name="pwd-repeat" placeholder="Passwort bestätigen" required>
        <span class = "error"><?php echo $pwdrpterr; ?></span>
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
      <label for="az" class="col-lg-2 col-md-4 col-sm-4 col-xs-4 col-form-label">Aktenzeichen:</label>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <input type="text" class="form-control" id="az" name="az" placeholder="Aktenzeichen" value="<?php if ( isset($az) ) {echo $az;} ?>" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="ende" class="col-lg-2 col-md-4 col-sm-4 col-xs-4 col-form-label">Betreuungsende:</label>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <input type="date" class="form-control" id="ende" name="ende" placeholder="Betreuungsende" value="<?php if ( isset($ende) ) {echo $ende;} ?>" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="betreuer" class="col-lg-2 col-md-4 col-sm-4 col-xs-4 col-form-label">Betreuer-ID:</label>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <input type="number" class="form-control" id="betreuer" name="betreuer" placeholder="Betreuer-ID" value="<?php if ( isset($betreuer) ) {echo $betreuer;} ?>" required>
      </div>
    </div>
    <br>
    <button type="submit" class="btn btn-outline-danger" name="prob-self-submit">Registrieren</button>
  </form>
  </main>
