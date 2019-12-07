<?php

require '../database/dbh.inc.php';

if(!isset($_SESSION))
{
      session_start();
}

echo $_FILES['upload'];
echo $_FILES['name'];

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
    $bid = $_SESSION['userId'];
    $pid = $_POST['hiddenProbID'];
  	$bsender = 1;
    $dateiname = $_FILES['upload']['name'];

    $sql = "INSERT INTO nachricht (Zeitstempel, Status, BID, PID, BSender, image, dateiname) values ('$datum', '$status', $bid, $pid, $bsender, 0x".bin2hex($content).", '$dateiname')";

    //Einfügen in Datenbank
    if ($conn->query($sql) == TRUE)
    {
      echo "Bild angelegt ID = " . $conn->insert_id;
    } else
    {
      echo "Fehler: " . $sql . "<br>" . $conn->error;
      die();
    }

    #Die Funktion unlink() löscht die angegebene Datei (hier die hochgeladene Datei)
  	unlink($localFileName);
      $conn->close();
  }
} else
{
  echo '<b>kein Upload!</b>';
}

header("Location: index_betreuer.php");
?>
