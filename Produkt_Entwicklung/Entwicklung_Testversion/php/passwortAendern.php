<?php
#Seite um ein Passwort zu ändern

// -- REFERENZEN --
//https://tryphp.w3schools.com/showphp.php?filename=demo_form_validation_required
//https://steemit.com/utopian-io/@atan26/how-to-make-simple-sign-up-form-with-validation-php-mysqli

include 'dbh.inc.php';

if(!isset($_SESSION))
{
    session_start();
}

// Check user login or not
if(!isset($_SESSION['userId'])){
    header('Location: login.php');
}

// logout
if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: login.php');
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

	<title>SoDi4U - Passwort ändern</title>
	<link rel="icon" type="image/x-icon" href="../CSS/image/sodibaer.png" >

	<!-- Meldungen rot bzw. grün markieren -->
	<style>
	.error {color: #FF0000;}
	.success {color: #00CC00;}
	</style>

</head>
<header>
  <nav class="navbar navbar-expand-lg navbar-sodi bg-light flex-nowrap nav-h">
   <a class="navbar-brand w-100" href="#">
  <img src="../CSS/image/LogoOhneSchatten.png"  width="50" height="50" alt="Logo" > &nbsp;&nbsp;SoDi4U
	 </a>

   <div class="navbar-collapse collapse w-100" id="navbar5">
    <ul class="navbar-nav mx-auto">
      <li class="nav-item">
        <a class="nav-link" href="../php/index_proband.php">Startseite</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../php/termine_proband.php">Termine </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../php/MeineNachrichten.php">Nachrichten</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../php/Dokumente.php">Dokumente</a>
      </li>
	    <li class="nav-item">
        <a class="nav-link" href="Informationen.php">Informationen</a>
      </li>
	    <li class="nav-item">
        <a class="nav-link" href="Leitfaden_Proband.pdf">Leitfaden</a>
      </li>
	    <li class="nav-item">
        <a class="nav-link" href="Notfall.php">Notfall</a>
      </li>
	<!-- Aktuelle Seite -->
	  <li class="nav-item active">
        <a class="nav-link" href="passwortAendern.php">Passwort&nbsp;ändern<span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" method='post' action="">
        <button class="button-sodi btn-outline-sodi my-1 my-sm-0" name="but_logout" type="submit">Abmelden</button>
	</form> 
  </div>
  
  <div class="w-100">
  </div>
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar5" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
</nav>
  <hr class="hr-sodi"> <!-- Gehört zum Header -->
</header>

<?php
$passwortNeu = "";
$passwortRepeat = "";
$passwortAlt = "";
$userID = $_SESSION['userId'];
$pwdAltLeer = $pwdNeuLeer = $pwdRptLeer = "";
$pwdAltErr = $pwdRptErr = $pwdTatErr = "";
$pwdErfolg = "";

//Funktion, um förmliche Korrekheit zu prüfen. Schutz auch gegen Angriffe
  function test_input ($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlentities($data);
    return ($data);
  }

//Leere Felder und formliche Korrekheit prüfen
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST['pwd-alt'])) {
    //$pwdAltLeer = "Bitte ausfüllen!";
  } else {
    $passwortAlt = test_input($_POST['pwd-alt']);
  }

  if (empty($_POST['pwd-neu'])) {
    //$pwdNeuLeer = "Bitte ausfüllen!";
  } else {
    $passwortNeu = test_input($_POST['pwd-neu']);
  }

  if (empty($_POST['pwd-repeat'])) {
    //$pwdRptLeer = "Bitte ausfüllen!";
  } else {
    $passwortRepeat = test_input($_POST['pwd-repeat']);
  }

  //"Neues Passwort" und "Neues Passwort wiederholen" stimmen überein?
  if ($passwortNeu !== $passwortRepeat){
    $pwdRptErr = "Eingaben müssen übereinstimmen!";
  }

  //Prüft, ob "Neues Passwort" tatsächlich neu ist (eigentlich prüft nur, ob "passwortNeu" und "passwortAlt" identisch sind)
  if ($passwortNeu == $passwortAlt){
    $pwdTatErr = "Neues Passwort muss tatsächlich neu sein";
  }

  //Überprüfung des alten Passworts
    $sql = "SELECT * FROM proband WHERE PID = $userID";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
       while($row = mysqli_fetch_assoc($result)) {
         $pwdCheck = password_verify($passwortAlt, $row['Passwort']);
       }
    }
    if ($pwdCheck == false){
      $pwdAltErr = "Falsches Passwort";
  }

  //Gab es Fehlermeldungen?
  if ($pwdAltLeer!="" OR $pwdNeuLeer!="" OR $pwdRptLeer!="" OR $pwdTatErr!="" OR $pwdAltErr!="" OR $pwdRptErr!=""){
  }
  //Wenn nicht, dann Passwort aktualisieren
  else {
    $sql = "UPDATE proband SET Passwort = ? WHERE PID = ?";
    $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        }
      else{
        //Passwort wird gehasht (verschlüsselt)
        $hashedPwd = password_hash($passwortNeu, PASSWORD_DEFAULT);
        //Passwort wird aktualisiert
        mysqli_stmt_bind_param($stmt, 'si', $hashedPwd, $userID);
        mysqli_stmt_execute($stmt);
        $pwdErfolg = "Passwort erfolgreich geändert";
      }
    }
  }
?>

<main>
  <!--<p><span class="error">* erforderliche Eingabe</span></p>-->
<form action="<?php echo ($_SERVER["PHP_SELF"]);?>" method="POST">
	<input type="hidden" name="uid" value="<?php echo $userID;?>">
		
<div class="container passwortAendern-container text-align-center d-flex justify-content-center">
<div class="row"> 
<div class="col-lg-12 ">
		
		<div class="form-group">
        <div class="form-check">
          <h2>Passwort ändern</h2>
		  <br>
        </div>
		<div class="form-label-group input-group">
          <input type="text" class="form-control" name="username" autocomplete="off" value="<?php echo htmlspecialchars($_SESSION['username']); ?>" readonly>
		  </div>
		 <br>
		<div class="form-label-group input-group"> 
          <input type="password" class="form-control"  name="pwd-alt" id="pwd-alt"
          placeholder="Geben Sie bitte Ihr altes Passwort ein." size="50" required autofocus>
		  <!--<span class="error">* <?php //echo $pwdAltLeer;?></span>-->
		<div class="input-group-append">
                <span class="input-group-text">
                  <i id="eye1" class="far fa-eye-slash" onclick="showHidePwd1();"></i>
                </span>
				
        </div>
		</div>
		<br>
		<div class="form-label-group input-group">
		  <input type="password" class="form-control"  name="pwd-neu" id="pwd-neu"
          placeholder="Geben Sie bitte Ihr neues Passwort ein." size="50" required>
		<div class="input-group-append">
                <span class="input-group-text">
                  <i id="eye2" class="far fa-eye-slash" onclick="showHidePwd2();"></i>
                </span>
				
        </div>
		</div>
		<br>
		<div class="form-label-group input-group">
		  <input type="password" class="form-control"  name="pwd-repeat" id="pwd-repeat"
          placeholder="Wiederholen Sie bitte Ihr neues Passwort." size="50" required>
		<div class="input-group-append">
                <span class="input-group-text">
                  <i id="eye3" class="far fa-eye-slash" onclick="showHidePwd3();"></i>
                </span>
				
        </div>
		</div>
		  <br>
			<button class="btn btn-lg btn-danger btn-block" type="submit" name="passwortAendern" id="passwortAendern" >Passwort ändern</button>
		
		<div class="success"> <?php echo $pwdErfolg;?></div>
		<div class="error"><?php echo $pwdTatErr;?></div>
		<div class="error2"><?php echo $pwdAltErr;?></div>
		<div class="error3"><?php echo $pwdNeuLeer;?></div>
		<div class="error4"><?php echo $pwdRptErr;?></div>
		
		</div>
</form>
</main>
		
	<!--Footer-->
	<footer id="sticky-footer" class="mb-0 mt-footer py-4 bg-light text-white-50">
      <div class="pt-2 container text-center">

              <ul>
                <li>
                  <a href="Impressum_Proband.php">Impressum</a>
                </li>
                <li>
                    <a href="Datenschutz_Proband.php">Datenschutz</a>
                </li>
                <li>
                  <a href="Kontakt_Proband.php">Kontakt</a>
                </li>
              </ul>

      </div>
    </footer>
</html>

