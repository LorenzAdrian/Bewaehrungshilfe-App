<?php
include '../database/dbh.inc.php';
session_start();

// Check user login or not
if(!isset($_SESSION['userId'])){
  $_SESSION['probID'] = $_SESSION['userId'];
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
	<!--- Pfad zu den CSS Dateien--------------------------->
    <link rel="stylesheet" href="../CSS/termine_proband.css">
		<link rel="stylesheet" href="../CSS/header_prob.css">
    <!--Schriftart aus google fonts------------------>
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet"> 

    <title>Notfälle</title>

     <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
	integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>


<body>

<nav class="navbar navbar-expand-lg navbar-sodi bg-light flex-nowrap nav-h">
   
   <a class="navbar-brand w-100" href="#">
          		  <img src="../CSS/image/Baericon.jpeg"  width="30" height="30" alt="Logo" > &nbsp;&nbsp;SoDi 4u
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
        <a class="nav-link" href="To_Do_Liste.php">Leitfaden</a>
      </li>
	  <!-- Aktuelle Seite -->
	    <li class="nav-item active">
        <a class="nav-link" href="Notfall.php">Notfall<span class="sr-only">(current)</span></a>
      </li>
	  
	   <li class="nav-item">
        <a class="nav-link" href="passwortAendern.php">Passwort&nbsp;ändern</a>
      </li>
			   
        </ul>	
		<form class="form-inline my-2 my-lg-0">
            <button class="button-sodi btn-outline-sodi my-1 my-sm-0" type="submit">Abmelden</button>
		</form>
    </div>
    <div class="w-100">

	</div>
				
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar5" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  </nav>

  <hr class="hr-sodi"> <!-- Gehört zum Header -->


hier ist Platz für Notfälle

<?php include '../includes/footer_proband.inc.php' ?>
</body>

</html>
