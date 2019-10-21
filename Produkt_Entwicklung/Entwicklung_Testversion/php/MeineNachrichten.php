<?php
include '../database/dbh.inc.php';
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
    header('Location: Login.php');
}

if($_SESSION['rolle'] == 'proband') {
	$personenID = 'PID'; 
}
else {
	$personenID = 'BID';
}

$event_sql = "SELECT * FROM nachricht WHERE ".$personenID." = ".$_SESSION['userId']." ORDER BY Zeitstempel";
$result = mysqli_query($conn, $event_sql);
$event_data = array();
while ($row = mysqli_fetch_array($result))
{

  #if ($row['Status' == 'neu']) {
	 $event_data[] = array(
    'Zeit'     => $row['Zeitstempel'],
    'Text'       => $row['Text'],
    'Bezug'     => $row['BezugID'],
    'Status'     => $row['Status'],
    'PID'       =>  $row['PID'],
    'BID'       =>  $row['BID'],
    'Sender'   => $row['BSender']
	);
  #}
}

//foreach($event_data) {
//echo "<td>".$event_data['Zeitstempel'];."<td>";
//}

#Variablen für die ausgelesenen Nachrichten
$alteNachrichten = "";
$neueNachrichten = "";


foreach($event_data as $nachricht){
//  echo "<input type\"text\" value=".$nachricht['Zeit'].">";
//  echo "<textarea cols=\"150\" rows=\"20\">".$nachricht['Text']."</textarea><br>";

	if ($nachricht['Status']!='neu') {
		#Benutzer ist Sender der Nachricht.
		if($nachricht['Sender'] == 0 && $_SESSION['rolle'] == 'proband' || $nachricht['Sender'] > 0 && $_SESSION['rolle'] == 'betreuer') {
			$alteNachrichten .=  "<table><tr>".$_SESSION["username"].":</tr>";
		}
		#Benutzer ist Empfänger der Nachricht.
		elseif ($nachricht['Sender'] == 0 && $_SESSION['rolle'] == 'betreuer' || $nachricht['Sender'] > 0 && $_SESSION['rolle'] == 'proband') {
			$alteNachrichten .=  "<table><tr>Konversationspartner:</tr>";
		}
		else {
			echo "Es ist ein Fehler aufgetreten.";
			return;
		}	
		$alteNachrichten .=  "<tr><td>".$nachricht['Zeit']."</td><td>".$nachricht['Text']."</td></tr>";
		$alteNachrichten .=  "</table><br>";
	}

	else {
		#Benutzer ist Sender der Nachricht.
		if($nachricht['Sender'] == 0 && $_SESSION['rolle'] == 'proband' || $nachricht['Sender'] > 0 && $_SESSION['rolle'] == 'betreuer') {
			$neueNachrichten .=  "<table bgcolor='yellow'><tr>".$_SESSION["username"].":</tr>";
		}
		#Benutzer ist Empfänger der Nachricht.
		elseif ($nachricht['Sender'] == 0 && $_SESSION['rolle'] == 'betreuer' || $nachricht['Sender'] > 0 && $_SESSION['rolle'] == 'proband') {
			$neueNachrichten .=  "<table bgcolor='yellow'><tr>Konversationspartner:</tr>";
		}
		else {
			echo "Es ist ein Fehler aufgetreten.";
			return;
		}
		$neueNachrichten .=  "<tr><td>".$nachricht['Zeit']."</td><td>".$nachricht['Text']."</td></tr>";
		$neueNachrichten .=  "</table>";
	}
}

#Alle Nachrichten des Nutzers auf "gelesen" setzen.
#ACHTUNG: Im Moment nur für Proband nutzbar.
$sql = "UPDATE nachricht SET Status='gelesen' WHERE ".$personenID."=".$_SESSION['userId'];

/*if ($personenID == 'BID') {
	$sql .= "AND WHERE 'PID'= /übergebener Wert aus Datatables?/" Wert ggf. per POST weitergeben?
}*/

if ($conn->query($sql) != TRUE) {
    echo "Es ist ein Fehler aufgetreten: ".$conn->error;
}


/*print_r($event_data);
$nachrichten3 =json_encode($event_data);
echo "<textarea cols=\"200\" rows=\"200\">".$nachrichten3."</textarea>";
*/
 ?>
 
<!DOCTYPE html>
<html>
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
		<br>
		<main>
			<div>
				<table>
					<tr>
					<?php
						echo $alteNachrichten;
						echo "<br>";
						echo $neueNachrichten;
					?>
					</tr>
				</table>
				
				<form  action="nachricht_hochladen.php" method="POST">
				<span>Nachrichten</span>
				<br>
				<textarea name="textarea1" rows="5" cols="50" value=""></textarea>
				<br>
				<button type="submit" name="signup-submit">Abschicken</button>
				</form>

				<!--	<div>
					Neu hier?
					<a href="signupcheck.php">Registrierung</a>
				</div>-->
			</div>

		</main>
	</body>
</html>


<script src="../javascript/jquery-3.4.1.js"></script>