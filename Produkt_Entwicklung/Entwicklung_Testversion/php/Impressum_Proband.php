<!-- IMPRESSUM PROBAND-->
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

// logout
if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: login.php');
}
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

    <title>SoDi4U - Impressum</title>

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
          		  <img src="../CSS/image/Baericon.jpeg"  width="30" height="30" alt="Logo" > &nbsp;&nbsp;SoDi4U
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

<!--Inhalt der Seite-->
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
<h6>Anbieter:</h6>
<p>Soziale Dienste der Justiz Berlin <br>
          Zentrale in Berlin-Schöneberg <br>
          Salzburger Str. 21-25 <br>
          10825 Berlin</p>
		  
		  <h6>Bei redaktionellen Inhalten:</h6>
		  <p>Verantwortlich nach § 55 Abs.2 RStV <br>
          Max Mustermann <br>
          Musterstraße 2 <br>
          12345 Berlin <br></p>
		  
		  
		  <h6>Allgemeine Hinweise</h6>
		  <p> Das Informationsangebot der Berliner Justiz/Verbraucherschutz/Antidiskriminierung ist Teil des
          Stadtinformationssystems von Berlin. Inhalte und Layout des Web-Auftritts werden von der in der jeweiligen
          Seitenüberschrift genannten Justizeinrichtung oder der Senatsverwaltung für Justiz, Verbraucherschutz und
          Antidiskriminierung eigenverantwortlich betreut.
          Das Copyright für Bilder und Texte liegt, soweit nicht anders vermerkt, bei der Berliner
          Justiz/Verbraucherschutz/Antidiskriminierung. Vor einer öffentlichen oder gewerblichen Nutzung wenden Sie
          sich bitte an die Senatsverwaltung für Justiz, Verbraucherschutz und Antidiskriminierung</p>
		  
		  <h6>Erfordernis der Schriftform</h6>
		  <p>Rechtsverbindliche Erklärungen, die eine schriftliche Form oder eine elektronische Signatur erfordern,
          können gegenüber der Senatsverwaltung für Justiz, Verbraucherschutz und Antidiskriminierung, den Gerichten,
          Staats- und Amtsanwaltschaften, Justizvollzugsanstalten sowie sonstigen Justizeinrichtungen nicht per E-Mail
          abgegeben werden. Benutzen Sie daher bitte für solche Erklärungen ausnahmslos die Briefpost, das Telefax
          oder das EGVP. Die Senatsverwaltung für Justiz, Verbraucherschutz und Antidiskriminierung ist keine zentrale
          Postverteilungsstelle der Berliner Justiz. Wir bitten um Verständnis, dass an andere Justizeinrichtungen
          adressierte E-Mails nicht weitergeleitet werden können.</p>
		  
		  <h6>Haftungshinweis</h6>
        <p>Die Berliner Justiz/Verbraucherschutz/Antidiskriminierung übernimmt keine Verantwortung für die Inhalte
          fremder Internetseiten, auf die per Link verwiesen wird. Eine kontinuierliche Prüfung der von anderen
          veröffentlichten Internetseiten ist weder beabsichtigt noch möglich. Die Berliner
          Justiz/Verbraucherschutz/Antidiskriminierung distanziert sich ausdrücklich von allen Inhalten, die straf-
          oder haftungsrechtlich relevant sind oder gegen die guten Sitten verstoßen.
         
          Trotz sorgfältiger Auswahl der auf unseren Seiten angebotenen Informationen kann keine Gewähr für deren
          Richtigkeit übernommen werden. Rechtliche Hinweise, Empfehlungen und Auskünfte sind daher unverbindlich.
          Eine Rechtsberatung findet nicht statt. Eine Haftung für Schäden, die sich aus der Verwendung der
          abgerufenen Informationen und Dienste ergeben, durch das Land Berlin oder die jeweiligen Justizeinrichtungen
          ist – soweit gesetzlich zulässig – ausgeschlossen.</p>
        
        <h6>Urheberrecht</h6>
        <p>Das Layout der Seiten der Senatsverwaltung für Justiz, Verbraucherschutz und Antidiskriminierung, die
          verwendeten Grafiken sowie die Sammlung der Beiträge sind urheberrechtlich geschützt. Die Seiten dürfen
          ausschließlich zu privatem Gebrauch vervielfältigt werden. Textliche und grafische Änderungen sowie die
          öffentliche Verbreitung sind nicht erlaubt.</p>
		  
		 
	
	
	

	
	
	
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
