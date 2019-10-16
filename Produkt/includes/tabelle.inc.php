<?php

require "../database/dbh.inc.php";

// Tabelle erstellen (mySQLi Procedural)
$sql = "CREATE TABLE IF NOT EXISTS prob
(
  probID int(255) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  nachname varchar(255) NOT NULL,
  vorname varchar(255) NOT NULL,
  geburtsdatum varchar(255) NOT NULL
)";
if (mysqli_query($conn, $sql)) {
} else {
  echo "Erstellung der Tabelle fehlgeschlagen: " .mysqli_error($conn) ."<br>";
}

$sql = "CREATE TABLE IF NOT EXISTS tblTermine
(
  id int(255) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  start varchar(255) NOT NULL,
  end varchar(255) NOT NULL,
  title varchar(255) NOT NULL
  )";
if (mysqli_query($conn, $sql)) {
} else {
  echo "Erstellung der Tabelle fehlgeschlagen: " .mysqli_error($conn) ."<br>";
}





 ?>
