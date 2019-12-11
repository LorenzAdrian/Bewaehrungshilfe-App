<!DOCTYPE html>
<html lang="de">
<!-- Vorlage: https://www.w3schools.com/howto/tryit.asp?filename=tryhow_js_topnav --> 
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
	<title>Dropdown</title>
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../CSS/header_1.css" > 
   	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script>
	function myFunction() {
		var x = document.getElementById("myTopnav");
		var y = document.getElementById("baer");
		
		if (x.className === "topnav") {
		x.className += " responsive";
		y.style.display = 'none';
  
		document.getElementById("icon").setAttribute("style", "Color:white;");
		} else {
		x.className = "topnav";
		y.style.display = 'block';
		
		document.getElementById("icon").setAttribute("style", "Color:black;");
	  }
	}
		</script>
	

  </head>
  <body>
    
	<header>
<div class="topnav" id="myTopnav">
			<div class="logo" id="baer">
          		  <img src="../CSS/image/1000-Berliner_Baer.svg.png" alt="logo" class="berlin_logo" >
			</div>		
						
					
			
						<a href="../php/index_proband.php">Startseite</a>
						<a href="../php/termine_proband.php">Termine</a>
						<a href="../php/MeineNachrichten.php">Nachrichten</a>
						<a href="../php/Dokumente.php">Dokumente</a>
						<a href="../php/Informationen.php">Informationen</a>
						<a href="../php/">Leitfaden</a>
						<a href="../php/Notfall.php">Notfall</a>
						<a href="../php/Login.php">Abmelden</a>
						<a href="javascript:void(0);" class="icon" id="icon" onclick="myFunction()"> Sodi - Menü
						<i class="fa fa-bars"></i></a>
</div>

<hr>
</header>
  </body>
</html>