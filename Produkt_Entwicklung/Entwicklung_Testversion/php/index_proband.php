<?php
include '../database/dbh.inc.php';
session_start();

// Die Startseite des Probanden wird erzeugt.


// Check user login or not
if(!isset($_SESSION['userId'])){
    header('Location: Login.php');
}

// logout

if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: Login.php');
}

//Check, ob neue Nachrichten vorhanden oder nicht
$nachrichtNeu = false;
$sql = "SELECT * FROM nachricht WHERE PID = ".$_SESSION['userId']." AND Status = 'neu'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
	$nachrichtNeu = True;
}
?>

<!DOCTYPE html>
<html lang="de" dir="ltr">
<head>
    <!--- Pfad zur style.css--------------------------->
    <link rel="stylesheet" href="../CSS/style.css">
    <!--Schriftart aus google fonts------------------>
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <!-- Stylesheet für Icons-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Start</title>

</head>

<body>

<div class="logo"></div>

<div class="hallobox">Hallo <?php echo $_SESSION["username"]; ?></div>

<div class="menu">

            <li><a href ="https://cssgridgarden.com/#de"><img src="../CSS/image/search.svg">Suchen</a>
            </li>

            <li><a href ="#"><img src="../CSS/image/user-circle.svg">Mein Bereich</a>
            </li>
            <li>    <form method='post' action="">
                <input type="submit" value="Logout" name="but_logout">
            </form>
          </li>

</div>

<div class="rahmen">
   <table>
	<tr>
		<td> <!-- Die Seite "Meine Nachrichten" wird bei Klicken des Buttons geöffnet-->
			<a href="MeineNachrichten.php">
				<div class="icon">
					<i class="fa fa-envelope" style="font-size:80px"></i></div>
				<div class="name">
					<?php
					if ($nachrichtNeu == True) {
						echo('Meine Nachrichten <br>(ungelesene Nachricht!)');
					}
					else {
						echo('Meine Nachrichten');
					}
					?>
				</div>
			</a>
		</td>
		<td><!-- Die Seite mit dem eigenenn Kalender wird bei Klicken des Buttons geöffnet-->
			<a href="termine_proband.php">
				<div class="icon">
					<i class="fa fa-calendar" style="font-size:80px"></i></div>
				<div class="name">Meine Termine</div>
			</a>
		</td>
	</tr>
	<tr>
		<td><!-- Die Seite "Informationen" wird bei Klicken des Buttons geöffnet-->
			<a href="Informationen.php">
				<div class="icon">
					<i class="fa fa-info-circle" style="font-size:80px"></i></div>
				<div class="name">Informationen</div>
			</a>
		</td>
		<td><!-- Die Seite "Dokumente" wird bei Klicken des Buttons geöffnet-->
			<a href="Dokumente.php">
				<div class="icon">
					<i class="fa fa-file" style="font-size:80px"></i></div>
				<div class="name">Dokumente</div>
			</a>
		</td>
	</tr>
	<tr>
		<td><!-- Die Seite "Notfallkontakte" wird bei Klicken des Buttons geöffnet-->
			<a href="Notfall.php">
				<div class="icon">
					<i class="fa fa-ambulance" style="font-size:80px"></i></div>
				<div class="name">Notfall</div>
			</a>
		</td>
		<td><!-- Die Seite mit der eigenen To-Do-Liste wird bei Klicken des Buttons geöffnet-->
			<a href="To_Do_Liste.php">
				<div class="icon">
					<i class="fa fa-list-alt" style="font-size:80px"></i></div>
				<div class="name">To-Do-Liste</div>
			</a>
		</td>
	</tr>
</table>
</div>
