<?php
require '../database/dbh.inc.php';
if ($_POST['rolle'] == "proband"){
  $sql = "SELECT * FROM `nachricht` WHERE PID = ".$_POST['userID']." ORDER BY Zeitstempel";
}
else {
  $sql = "SELECT * FROM `nachricht` WHERE BID = ".$_POST['userID']." AND PID = ".$_POST['probID']." ORDER BY Zeitstempel";
}

$result = mysqli_query($conn, $sql);

$feedString = array();

while ($row = mysqli_fetch_array($result))
{
  if(!empty($row['Text'])){
    $feedString[] = $row['Zeitstempel']." ".$row['Text'];
  }
  else if(!empty($row['dateiname'])){
    $feedString[] = $row['Zeitstempel']." Datei:".$row['dateiname'];
  }
}

header("Content-type: text/plain");
header("Content-Disposition: attachment; filename=test.txt");
echo implode("\n", $feedString);
 ?>
