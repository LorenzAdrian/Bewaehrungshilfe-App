<?php
session_start();
 ?>
 
<!-- Dies ist der Header für Betreuer und gleichzeitig der DFEAULT Header (nur relevant für Login Anzeige)-->
<!-- Der Header sollte über allen Seiten der Anwendung eingefügt werden-->
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta name="description" content="This is an example of a meta description. This will often show up in search results.">
    <meta name=viewport content ="width=device-width, initial-scale=1">
    <title></title>

	</head>
	<body>
		<header>
			<nav>
				<div>
					<?php
					if (isset($_SESSION['userId'])) {
						
						//HIER IN ZUKUNFT DIE LINKS DER MENÜLEISTE EINFÜGEN!!
						
						//Menüleiste nach erfolgreicher Anmeldung
						echo '  <a href="#">
							<img src="img/logo.png" alt="logo">
							</a>
							<ul>
								<li><a href="index.php">Home</a></li>
								<li><a href="FullCalendar.php">Kalendar</a></li>
								<li><form class="" action="create_event.php" method="post">
										<button type="submit" name="create-event">Event anlegen</button>
								</form></li>
								<li><form class="" action="includes/create_event_file.inc.php" method="post">
										<button type="submit" name="refresh-event">Kalender aktualisieren</button>
								</form></li>
								<li><form class="" action="includes/listeprob.inc.php" method="post">
										<button type="submit" name="list-prob">Liste aller Probanten</button>
								</form></li>
								<li><form class="" action="addprob.php" method="post">
										<button type="submit" name="addprob">Proband anlegen</button>
								</form></li>
								<li><a href="#">Contact</a></li>
							</ul>';
						
						//Logout-Button
						echo  ' <form class="" action="includes/logout.inc.php" method="post">
									<button type="submit" name="logout-submit">Logout</button>
							</form>';
						}
						
						//Login Felder, falls noch kein Login vorgenommen wurde
						else {
							echo  '<form class="" action="includes/login.inc.php" method="post">
								<input type="checkbox" name="rolle" value="betreuer">Betreuer
								<br> 
								<input type="text" name="mailuid" placeholder="Username/Email">
								<input type="password" name="pwd" placeholder="Passwort">
								<button type="submit" name="login">Login</button>
							</form>
							<a href="signupcheck.php">Registrierung</a>';
						}
			
					?>
				</div>
			</nav>
		</header>
	</body>
</html>
