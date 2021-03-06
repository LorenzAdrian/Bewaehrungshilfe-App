<?php
include '../database/dbh.inc.php';
session_start();

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

    <title>SoDi4U - Startseite</title>
	<link rel="icon" type="image/x-icon" href="../CSS/image/sodibaer.png" >

</head>

<body>
<div id="seite"> 


<nav class="navbar navbar-expand-lg navbar-sodi bg-light flex-nowrap nav-h">
   
   <a class="navbar-brand w-100" href="#">
          		  <img src="../CSS/image/LogoOhneSchatten.png"  width="50" height="50" alt="Logo" > &nbsp;&nbsp;SoDi4U
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
        <a class="nav-link" href="Leitfaden_Proband.pdf">Leitfaden</a>
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

 <div id="inhalt"> 
	<!-- Überschrift der Seite -->
    <!--Begrüßungscontainer -->
  <div class="container hallo-container">
    <div class="row hallo-row">
      <div class="col-lg-12 hallo-col text-center">
        <h2>Guten Tag <?php echo $_SESSION['vorname']; echo " "; echo $_SESSION['nachname'] ?> </h2>
      </div>
    </div>
  </div>
 


<div class="container-fluid">
<!--Links zu den anderen Seiten-->	
	<div class="row">

		<div class="col">
     		<a href="MeineNachrichten.php">
				<div class="icon rounded-top">
					<i class="fa fa-envelope " ></i></div>
					
				<div class="name rounded-bottom">Nachrichten</div>
			</a>
		</div>
		
		<div class="col">
			<a href="termine_proband.php">
				<div class="icon rounded-top">
					<i class="fa fa-calendar"></i></div>
				<div class="name rounded-bottom">Termine</div>
			</a>
		</div>
	
	<div class="w-100 d-block d-md-none"></div>
	
		<div class="col">
			<a href="Informationen.php">
				<div class="icon rounded-top">
					<i class="fa fa-info-circle"></i></div>
				<div class="name rounded-bottom">Informationen</div>
			</a>
		</div>
		
		<div class="w-100 d-none d-md-block"></div>
		
		<div class="col">
			<a href="Dokumente.php">
				<div class="icon rounded-top">
					<i class="fa fa-file"></i></div>
				<div class="name rounded-bottom">Dokumente</div>
			</a>
		</div>

		<div class="w-100 d-block d-md-none"></div>
		
	
		<div class="col">
			<a href="Notfall.php">
				<div class="icon rounded-top">
					<i class="fa fa-ambulance " ></i></div>
				<div class="name rounded-bottom">Notfall</div>
			</a>
		</div>
   
		<div class="col">
			<a href="Leitfaden_Proband.pdf">
				<div class="icon rounded-top">
					<i class="fa fa-list-alt " ></i></div>
				<div class="name rounded-bottom">Leitfaden</div>
			</a>

		</div>

		</div>
	
  </div>
   </div>
 
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
  </div>
</body>

</html>
