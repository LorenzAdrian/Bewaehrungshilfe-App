<?php

// Die Nachrichten werden ausgelesen
require '../database/dbh.inc.php';
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

if($_SESSION['rolle'] == 'proband') {
	$personenID = 'PID';
}
else {
	$personenID = 'BID';
}

if (isset($probID)) {
  $personenID2 = $probID;
  $event_sql = "SELECT * FROM nachricht WHERE ".$personenID." = ".$_SESSION['userId']." AND PID = $probID ORDER BY Zeitstempel";
}
else{

$event_sql = "SELECT * FROM nachricht WHERE ".$personenID." = ".$_SESSION['userId']." ORDER BY Zeitstempel";}
$result = mysqli_query($conn, $event_sql);
$event_data = array();
while ($row = mysqli_fetch_array($result))
{

  #if ($row['Status' == 'neu']) {
	 $event_data[] = array(
    'Zeit'     => $row['Zeitstempel'],
    'Text'       => $row['Text'],
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
			$alteNachrichten .=  "<table><tr><td>".$_SESSION["username"].":</td><td></td></tr>";
		}
		#Benutzer ist Empfänger der Nachricht.
		elseif ($nachricht['Sender'] == 0 && $_SESSION['rolle'] == 'betreuer' || $nachricht['Sender'] > 0 && $_SESSION['rolle'] == 'proband') {
			$alteNachrichten .=  "<table><tr><td>Konversationspartner:</td><td></td></tr>";
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
			$neueNachrichten .=  "<table bgcolor='yellow'><tr><td>".$_SESSION["username"].":</td><td></td></tr>";
		}
		#Benutzer ist Empfänger der Nachricht.
		elseif ($nachricht['Sender'] == 0 && $_SESSION['rolle'] == 'betreuer' || $nachricht['Sender'] > 0 && $_SESSION['rolle'] == 'proband') {
			$neueNachrichten .=  "<table bgcolor='yellow'><tr><td>Konversationspartner:</td><td></td></tr>";
		}
		else {
			echo "Es ist ein Fehler aufgetreten.";
			return;
		}
		$neueNachrichten .=  "<tr><td>".$nachricht['Zeit']."</td><td>".$nachricht['Text']."</td></tr>";
		$neueNachrichten .=  "</table>";
	}
}

$nachrichten = $alteNachrichten.$neueNachrichten;
echo $nachrichten;

#Alle Nachrichten des Nutzers auf "gelesen" setzen.
#ACHTUNG: Im Moment nur für Proband nutzbar.
$sql = "UPDATE nachricht SET Status='gelesen' WHERE BID=".$_SESSION['userId'];

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
