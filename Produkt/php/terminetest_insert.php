<?php

//require "includes/tabelle.inc.php";
require '../database/dbh.inc.php';

$title = $_POST['terTitel'];
$start = $_POST['terDatum'].'T'.$_POST['terStart'].':00';
$end = $_POST['terDatum'].'T'.$_POST['terEnde'].':00';
$status = $_POST['terStatus'];
$ProbandID = $_POST['terPID'];
$BetreuerID = $_POST['terBID'];
$Beschr = $_POST['terBeschreibung'];



// Werte hinfügen mit "prepared statements" (mySQLi Procedural)
$sql = "INSERT INTO termin (Beginn, Ende, Titel, Status, PID, BID, Beschreibung) VALUES (?, ?, ?, ?, ?, ?,?)";
$stmt = mysqli_stmt_init($conn);
if (mysqli_stmt_prepare($stmt, $sql)) {
  mysqli_stmt_bind_param($stmt, "sssssss", $start, $end, $title, $status, $ProbandID, $BetreuerID,$Beschr);
  mysqli_stmt_execute($stmt);
  header('Location: index_betreuer.php');
  //echo "Termin erfolgreich gespeichert<p>";

  //Ergebnisse in einer HTML-Tabelle ausgeben
  /*
  echo "<table>";
  echo "<tr>";
  echo "<td> Titel: </td>";
  echo "<td> $title </td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td> Start: </td>";
  echo "<td> $start </td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td> Ende: </td>";
  echo "<td> $end </td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td> Status: </td>";
  echo "<td> $status </td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td> PID: </td>";
  echo "<td> $ProbandID </td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td> BID: </td>";
  echo "<td> $BetreuerID </td>";
  echo "</tr>";
  echo "</table>";
  echo "<p>";

  // Button um Zurück zur terminform.html-Seite zu gehen
  echo "<form action ='termineinsert.php' method ='post'>";
  echo "<input type ='submit' value ='Weitere Termine anlegen'>";
  echo "</form>";

  echo "<ul>";
  echo "<li><a href=\"index_betreuer.php\">Startseite</a></li>";
  //echo "<li><a href=\"index.html\">Index</a></li>";
  echo "</ul>";*/
} else {
    echo "Fehler: " .$sql . "<br>" .mysqli_error($conn);
}

 ?>
