<?php
include '../database/dbh.inc.php';
session_start();

// Check user login or not
if(!isset($_SESSION['userId'])){
    header('Location: Login.php');
}

// logout

if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: Login.php');
}
?>



<!DOCTYPE html>
<html lang="de" dir="ltr">
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	 <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
	integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<!--- Pfad zur style.css--------------------------->
    <link rel="stylesheet" href="../CSS/index_proband.css">
<link rel="stylesheet" href="../CSS/header_prob.css"> 
		<link rel="stylesheet" href="../CSS/footer_pro.css">
<!--	<link rel="stylesheet" href="../CSS/footer.css">-->
    <!--Schriftart aus google fonts------------------>
    <link href="https://fonts.googleapis.com/css?family=Assistant:200,300,400,600,700&display=swap"  rel="stylesheet">
    <!-- Stylesheet für Icons-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Startseite</title>

</head>



<nav class="navbar navbar-expand-lg navbar-sodi bg-light flex-nowrap nav-h">
   
   <a class="navbar-brand w-100" href="#">
          		  <img src="../CSS/image/Baericon.jpeg"  width="30" height="30" alt="Logo" > &nbsp;&nbsp;SoDi 4u
			</a>
   
     <div class="navbar-collapse collapse w-100" id="navbar5">
        <ul class="navbar-nav mx-auto">

<!-- Aktuelle Seite -->
      <li class="nav-item active">
        <a class="nav-link" href="../php/index_proband.php">Startseite<span class="sr-only">(current)</span></a>
      </li>
<!-- Weiterführung zu allen anderen Seiten -->
      <li class="nav-item "> 
        <a class="nav-link" href="../php/termine_proband.php">Termine</a>
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

	    <li class="nav-item">
        <a class="nav-link" href="Notfall.php">Notfall</a>
      </li>
	  
	   <li class="nav-item">
        <a class="nav-link" href="passwortAendern.php">Passwort&nbsp;ändern</a>
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


<!-- Überschrift der Seite -->
<div class="container-fluid">

	<div class="row">
		<div class="col-12 text-center">
			   <h4>Startseite</h4>      	   
		</div>
	</div>
<!--Links zu den anderen Seiten-->	
	<div class="row">
	
		<div class="col-xs-0 col-sm-1 col-md-3 col-lg-3">
		</div>
		
		<div class="col-xs-6 col-sm-5 col-md-3 col-lg-3">
     		<a href="MeineNachrichten.php">
				<div class="icon">
					<i class="fa fa-envelope" style="font-size:80px"></i></div>
				<div class="name">Nachrichten</div>
			</a>
		</div>
		
		<div class="col-xs-6 col-sm-5 col-md-3 col-lg-3">
			<a href="termine_proband.php">
				<div class="icon">
					<i class="fa fa-calendar" style="font-size:80px"></i></div>
				<div class="name">Termine</div>
			</a>
		</div>
	
		<div class="col-xs-0 col-sm-1 col-md-3 col-lg-3">
		</div>
	
	</div>
	
	<div class="row">
	
		<div class="col-xs-0 col-sm-1 col-md-3 col-lg-3">
		</div>

		<div class="col-xs-6  col-sm-5 col-md-3 col-lg-3">
			<a href="Informationen.php">
				<div class="icon">
					<i class="fa fa-info-circle" style="font-size:80px"></i></div>
				<div class="name">Informationen</div>
			</a>
		</div>
   
		<div class="col-xs-6  col-sm-5 col-md-3 col-lg-3">
			<a href="Dokumente.php">
				<div class="icon">
					<i class="fa fa-file" style="font-size:80px"></i></div>
				<div class="name">Dokumente</div>
			</a>
		</div>
	
		<div class="col-xs-0 col-sm-1 col-md-3 col-lg-3">
		</div>
	
	</div>

	<div class="row">

		<div class="col-xs-0 col-sm-1 col-md-3 col-lg-3">
		</div>

		<div class="col-xs-6  col-sm-5 col-md-3 col-lg-3">
      		<a href="Notfall.php">
				<div class="icon">
					<i class="fa fa-ambulance" style="font-size:80px"></i></div>
				<div class="name">Notfall</div>
			</a>
		</div>
		
		<div class="col-xs-6 col-sm-5 col-md-3 col-lg-3">
	 		<a href="To_Do_Liste.php">
				<div class="icon">
					<i class="fa fa-list-alt" style="font-size:80px"></i></div>
				<div class="name">Leitfaden</div>
			</a>
		</div>
		
		<div class="col-xs-0 col-sm-1 col-md-3 col-lg-3">
		</div>

  </div> 
  </div>
   <!--
  <footer>
<ul class="footer-nav">
<li>
    <a href="Datenschutz_Proband.php" class="footer-datenschutz">Datenschutz</a>
</li>

<li>
        <a href="Impressum_Proband.php" class="footer-impressum">Impressum</a>
</li>

<li>
        <a href="Kontakt_Proband.php" class="footer-kontakt">Kontakt</a>
</li>

</ul>
</footer>
-->

 <!--Footer-->
   
       <footer id="sticky-footer" class="py-4 bg-light text-white-50">
      <div class="container text-center">

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
  
</body>

</html>
