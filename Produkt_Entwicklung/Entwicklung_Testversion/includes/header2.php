<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">  
  <title>Document</title>
  <link rel="stylesheet" href="../CSS/header2.css" > 
  
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- dropdown -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><!-- Add icon library -->

 <script>
		/* When the user clicks on the button, 
		toggle between hiding and showing the dropdown content */
		function myFunction() {
		  document.getElementById("myDropdown").classList.toggle("show");
		}

		// Close the dropdown if the user clicks outside of it
		window.onclick = function(event) {
		  if (!event.target.matches('.dropbtn')) {
			var dropdowns = document.getElementsByClassName("dropdown-content");
			var i;
			for (i = 0; i < dropdowns.length; i++) {
			  var openDropdown = dropdowns[i];
			  if (openDropdown.classList.contains('show')) {
				openDropdown.classList.remove('show');
			  }
			}
		  }
		}
</script>
</head>
<body>
    <header>
        <div class="menubar">
          <div class="logo">
              <img src="../CSS/image/1000-Berliner_Baer.svg.png" alt="logo" class="berlin_logo">
          </div>

          <ul class="menu">
              
              <li>
                      <p>Sodi App</p>
              </li>

           
					<div class="dropdown">
				 		<div class="dropbtn" onclick="myFunction()"><i class="fa fa-bars"></i></div>
			<!--	 <button onclick="myFunction()" class="dropbtn">Funktionen</button> -->
					  <div id="myDropdown" class="dropdown-content">
						<a href="../php/index_proband.php">Startseite</a>
						<a href="../php/termine_proband.php">Termine</a>
						<a href="../php/MeineNachrichten.php">Nachrichten</a>
						<a href="../php/Dokumente.php">Dokumente</a>
						<a href="../php/Informationen.php">Informationen</a>
						<a href="../php/">Leitfaden</a>
						<a href="../php/Notfall.php">Notfall</a>
						<a href="../php/Login.php">Logout</a> </div>
						
					  </div>
					</div>

          </ul>

        </div>
       <hr>
      </header>
</body>
</html>
