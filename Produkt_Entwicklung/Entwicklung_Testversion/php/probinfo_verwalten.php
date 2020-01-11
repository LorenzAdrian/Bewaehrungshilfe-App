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

  <title>ProbandIn-Info verwalten</title>

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


h1{
	font-weight: 300;
}

h4{
	font-weight: 300;
}

.form-group{
  text-align:left;
}


.error {color: #FF0000;}
.success {color: #00CC00;}

</style>

<header>
<nav class="navbar navbar-expand-lg navbar-light flex-nowrap">
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

//if (isset ($_POST['bet-self-submit'])) {

  include 'dbh.inc.php';
  //$typ = ($_POST['typ']);
  $rolle = "bwh";
  //folgenden POST-Info von probinfo.php
  $pid = ($_POST['pid']);
  $vorname = test_input($_POST['vorname']);
  $nachname= test_input($_POST['nachname']);
  $username = test_input($_POST['username']);
  $email = test_input($_POST['email']);
  $telnr = test_input($_POST['telnr']);
  $akte = test_input($_POST['akte']);
  $betanfang = test_input($_POST['betanfang']);
  $betende = test_input($_POST['betende']);
  $bid = test_input($_POST['bid']);
  //$passwort= test_input($_POST['pwd']);
  //$passwortRepeat = test_input($_POST['pwd-repeat']);



  /*
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
  //elseif ($passwort !== $passwortRepeat) {
    //header("Location: anlegen_bet.php?error=passwortcheck&uid=".$username."&mail=".$email);
    //exit();
  //  $pwdrpterr = "Eingaben müssen übereinstimmen!";
  //}
  //Check, ob Username schon vergeben
  /*else{
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
      */

      //Eintragung in Datenbank: Prob-Info ändern
      if (isset ($_POST['prob-aendern-submit'])){
        $sql = "UPDATE proband SET vorname = ?, nachname = ?, email = ?, telnr = ?,
          aktenzeichen = ?, betreuungsanfang = ?, betreuungsende = ?, bid = ? WHERE pid = ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          //trigger_error(mysqli_error($conn), E_USER_ERROR);
          header("Location: index_betreuer.php?error=sqlerror");
          exit();
        }
        else {
          mysqli_stmt_bind_param($stmt, "sssssssii", $vorname, $nachname, $email, $telnr, $akte, $betanfang, $betende, $bid, $pid);
          }
          mysqli_stmt_execute($stmt);
          //header("Location: anlegen_bet.php?signup=success".$username);
          //exit();
          $erfolg = "Information für $username (ID = $pid) erfolgreich geändert!";
          echo "<script type='text/javascript'>alert('$erfolg'); window.location = 'index_betreuer.php'</script>";
        }
      //}
    //}
  //}
//}

?>
		<main>
			<h1>Bearbeiten</h1>
			<p>ProbandIn-Info</p>
			<form action="<?php echo ($_SERVER["PHP_SELF"]);?>" method="POST">
				<input type="hidden" name="rolle" value="prob">
        <input type="hidden" name="pid" value="<?php echo $pid; ?>">
				<br>
        <form>
				    <div class="form-row">
            <div class="form-group col-lg-3">
            </div>
            <div class="form-group col-lg-3">
                <label for="vorname">Vorname:</label>
				        <input type="text" class="form-control" id="vorname" name="vorname" placeholder="Vorname" value="<?php if ( isset($vorname) ) {echo $vorname;} ?>" required>
              </div>
              <div class="form-group col-lg-3">
                <label for="nachname">Nachname:</label>
                <input type="text" class="form-control" id="nachname" name="nachname" placeholder="Nachname" value="<?php if ( isset($nachname) ) {echo $nachname;} ?>" required>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-lg-3">
              </div>
              <div class="form-group col-lg-3">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php if ( isset($username) ) {echo $username;} ?>" required readonly>
                <!-- <span class = "error"><?php echo $usernameerr; ?></span>
                <span class = "error"><?php echo $usernamevergeben; ?></span> -->
              </div>
              <div class="form-group col-lg-1">
                <label for="pid">ID:</label>
                <input type="text" class="form-control" id="pid" name="pid" placeholder="id" value="<?php if ( isset($pid) ) {echo $pid;} ?>" required readonly>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-lg-3">
              </div>
              <div class="form-group col-lg-3">
                <label for="email">E-Mail:</label>
				        <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" value="<?php if ( isset($email) ) {echo $email;} ?>" required>
				        <span class = "error"><?php echo $emailerr; ?></span>
              </div>
              <div class="form-group col-lg-3">
                <label for="telnr">Telefonnummer:</label>
                <input type="text" class="form-control" id="telnr" name="telnr" placeholder="Telefonnummer" value="<?php if ( isset($telnr) ) {echo $telnr;} ?>" required>
              </div>
            </div> 
            <div class="form-row">
              <div class="form-group col-lg-3">
              </div>
              <div class="form-group col-lg-3">
                <label for="betanfang">Betreuungsanfang:</label> 
					      <input type="date" class="form-control" id="betanfang" name="betanfang" placeholder="Betreuungsanfang" value="<?php if ( isset($betanfang) ) {echo $betanfang;} ?>" required>
				      </div>
              <div class="form-group col-lg-3">
                <label for="betende">Betreuungsende:</label>
                <input type="date" class="form-control" id="betende" name="betende" placeholder="Betreuungsende" value="<?php if ( isset($betende) ) {echo $betende;} ?>">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-lg-3">
              </div>
              <div class="form-group col-lg-3">
                <label for="bid">Bewährungshelfer:</label>
					      <input type="number" class="form-control" id="bid" name="bid" placeholder="Bewährungshelfer-ID" value="<?php if ( isset($bid) ) {echo $bid;} ?>" required>
				      </div>
              <div class="form-group col-lg-1">
                <label for="akte">Aktenzeichen:</label>
					      <input type="text" class="form-control" id="akte" name="akte" placeholder="Aktenzeichen" value="<?php if ( isset($akte) ) {echo $akte;} ?>" required>
				      </div>
            </div>
          </form>

  <!--
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
  -->
	
			<br>
      <form>
        <div class="form-row">
        <div class="form-group col-lg-6">
        </div>
         <div class="form-group col-lg-1">
            <button type="submit" class="btn btn-primary" name="prob-aendern-submit">Änderungen speichern</button>
          </div>
          <div class="form-group col-lg-1">
            <form action= "loginupdate_proband.php" method = "POST">
              <input type = "hidden" name = "pid" value = "<?php echo $pid; ?>">
              <input type = "hidden" name = "username" value = "<?php echo $username; ?>">
              <button type="submit" class="btn btn-primary" name="loginfo-aendern-proband-submit">Login-Info ändern</button>
            </form>
              <?php
              echo "<script type='text/javascript'>
              function warnung(){
              return confirm ('Wollen Sie NutzerIn \"$username\" wirklich löschen?')} </script>";
              ?>
      	    </div>
            <div class="form-group col-lg-1">
              <form action= "delete_prob.php" method = "POST" onsubmit = "return warnung(this);">
                <input type = "hidden" name = "pid" value = "<?php echo $pid; ?>">
                <input type = "hidden" name = "username" value = "<?php echo $username; ?>">
                <input type = "hidden" name = "gruppe" value = "prob">
                <button type="submit" class="btn btn-danger" name="delete-prob-submit">ProbandIn löschen</button>
              </form>
            </div>
            <div class="form-group col-lg-4">
              </div>
          </div>
        </form>
      <br>
      <!--<div class = "success"><?php //echo $erfolg; ?></div>-->
		</main>
