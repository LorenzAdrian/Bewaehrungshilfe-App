<!-- KONTAKT PROBAND -->
<?php 


?>

<!DOCTYPE html>
<html>
	<head>
		 <meta charset="utf-8">
	<!--- Pfad zu den CSS Dateien--------------------------->
    <link rel="stylesheet" href="../CSS/termine_proband.css">
		<link rel="stylesheet" href="../CSS/header_prob.css">
		<link rel="stylesheet" href="../CSS/footer_pro.css">
    <!--Schriftart aus google fonts------------------>
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet"> 

    <title>SoDi4U - Kontakt</title>

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
	
	<main>
	
<!--Inhalt der Seiten-->

	 <div id="inhalt"> 
		
	<div class="container-fluid">
	<div class="row">
			
			<div class="col-xs-1 col-sm-1 col-md-2 col-lg-2 bg-color">        	   
			</div>
			
			<div class="col-xs-10 col-sm-10 col-md-8 col-lg-8 bg-color2">
			   <br> <b> <h4 id="ds">Impressum</h4> </b> <br>    	   
			</div>
			
			<div class="col-xs-1 col-sm-1 col-md-2 col-lg-2 bg-color">
			</div>			
	</div>
  
  <div class="row">
  
			<div class="col-xs-1 col-sm-1 col-md-2 col-lg-2 bg-color">
			</div>
			
			<div class="col-xs-10 col-sm-10 col-md-8 col-lg-8 bg-color2">
			<h6>Kontaktinformationen</h6>
<p>Telefon: (030) 9013-2800<br>
          Telefax: (030) 9013-2810<br>
          E-Mail: poststelle@sozdj.berlin.de<br>
          Website: https://www.berlin.de/sen/justiz/soziale-dienste-der-justiz<br>
		  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </p>
		
			</div>


			<div class="col-xs-1 col-sm-1 col-md-2 col-lg-2 bg-color">
			</div>
	</div>
	
</div>

</div>
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
	</body>
	
</html>