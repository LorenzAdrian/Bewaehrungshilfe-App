<?php

require 'dbh.inc.php';


$timestamp = time();
$datum =  /*'2019.10.14 10:00:00';*/date("Y.m.d - H:i:s", $timestamp);
$nachricht = $_POST['textarea1'];
$status = 'neu';
$bid =  '3';
$pid = '10';
$bsender = '4';
$bezugID = '2';
print ($nachricht);
print ($datum);
print($status);
print($bid);
Print($pid);

$sql = "INSERT INTO nachricht_test6 (Zeitstempel, Text, BezugID,  Status, PID, BID, BSender) VALUES (?, ?, ?, ?, ?, ?,?)";
$stmt = mysqli_stmt_init($conn);
if (mysqli_stmt_prepare($stmt, $sql)) {
  mysqli_stmt_bind_param($stmt, "sssssss", $datum, $nachricht ,$bezugID, $status, $pid, $bid, $bsender);
  mysqli_stmt_execute($stmt);
  //header('Location: index_betreuer.php');
}
  else {
      echo "Fehler: " .$sql . "<br>" .mysqli_error($conn);
  }

?>
