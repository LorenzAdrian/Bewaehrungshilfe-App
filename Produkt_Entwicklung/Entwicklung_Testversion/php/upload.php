<?php

require '../database/dbh.inc.php';

if(!isset($_SESSION))
{
      session_start();
}

if (!empty($_FILES['upload']['name']))
{
  $localFileName = 'uploads/' . $_FILES['upload']['name'];
  if (move_uploaded_file($_FILES['upload']['tmp_name'], $localFileName))
  {
    //Datei einlesen
    $content = file_get_contents($localFileName);
    $timestamp = time();
    $datum = date("Y.m.d H:i:s", $timestamp);
    $status = 'neu';
    $bid;
    $pid;
    #Prüfen, welche Rolle angemeldet ist.
    if($_SESSION['rolle'] == 'betreuer') {
    	$bid = $_SESSION['userId'];
    	$pid = $_POST['hiddenProbID'];
    	$bsender = 1; #Weil Betreuer.
    }
    else {
    	$pid = $_SESSION['userId'];
    	#BID wird aus der Datenbank ausgelesen.
    	$query = "SELECT BID FROM proband WHERE PID =".$_SESSION['userId']." LIMIT 1";
    	$result = mysqli_query($conn, $query);
    	while($row = mysqli_fetch_assoc($result)) {
    		$bid = $row['BID'];
    	}
    	$bsender = 0;#Weil Proband.
    }
    $dateiname = $_FILES['upload'];
    $dateityp = $_FILES['name'];

    /*
    $sql = "INSERT INTO fileupload (image, BID, PID, BSender, dateiname, dateityp) VALUES (0x" .  bin2hex($content) . ", ".$bid.", ".$pid.", ".$bsender.", ".$dateiname.", ".$dateityp.")";
    */
    $sql = "INSERT INTO fileupload (zeit, image, Status, BID, PID, BSender, dateiname, dateityp) values ('$datum', 0x" .  bin2hex($content) . ", '$status', $bid, $pid, $bsender, '$dateiname', '$dateityp')";

    //Einfügen in Datenbank
    if ($conn->query($sql) == TRUE)
    {
      echo "Bild angelegt ID = " . $conn->insert_id;
    } else
    {
      echo "Fehler: " . $sql . "<br>" . $conn->error;
      die();
    }

	unlink($localFileName);
    $conn->close();
  }
} else
{
  echo '<b>kein Upload!</b>';
}
header("Location: MeineNachrichten.php");
?>
