<?php

//require "includes/tabelle.inc.php";
require '../database/dbh.inc.php';

$pid =  '';//$_POST['pid'];



// Werte hinfügen mit "prepared statements" (mySQLi Procedural)
$sql = "DELETE From nachricht where PID = ?";
$stmt = mysqli_stmt_init($conn);
if (mysqli_stmt_prepare($stmt, $sql)) {
  mysqli_stmt_bind_param($stmt, "s", $pid);
  mysqli_stmt_execute($stmt);
//    header('Location: index_betreuer.php');
}
$sql = "DELETE From termin where PID = ?";
$stmt = mysqli_stmt_init($conn);
if (mysqli_stmt_prepare($stmt, $sql)) {
  mysqli_stmt_bind_param($stmt, "s", $pid);
  mysqli_stmt_execute($stmt);
//    header('Location: index_betreuer.php');
}
$sql = "DELETE From proband where PID = ?";
$stmt = mysqli_stmt_init($conn);
if (mysqli_stmt_prepare($stmt, $sql)) {
  mysqli_stmt_bind_param($stmt, "s", $pid);
  mysqli_stmt_execute($stmt);
//    header('Location: index_betreuer.php');
}
//  echo 0;

 ?>
