<?php

require "includes/tabelle.inc.php";


$title = $_POST['terTitel'];
$start = $_POST['terDatum'].'T'.$_POST['terStart'].':00';
$end = $_POST['terDatum'].'T'.$_POST['terEnde'].':00';


// Werte hinfügen mit "prepared statements" (mySQLi Procedural)
$sql = "INSERT INTO tbltermine (start, end, title) VALUES (?, ?, ?)";
$stmt = mysqli_stmt_init($conn);
if (mysqli_stmt_prepare($stmt, $sql)) {
  mysqli_stmt_bind_param($stmt, "sss", $start, $end, $title);
  mysqli_stmt_execute($stmt);
  echo "Termin erfolgreich gespeichert<p>";
  //Ergebnisse in einer HTML-Tabelle ausgeben
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
  echo "</table>";
  echo "<p>";

  // Button um Zurück zur terminform.html-Seite zu gehen
  echo "<form action ='terminetestinsert.html' method ='post'>";
  echo "<input type ='submit' value ='Weitere Termine anlegen'>";
  echo "</form>";

  echo "<ul>";
  echo "<li><a href=\"fullcalendar/fullcalendar.php\">Kalendar</a></li>";
  echo "<li><a href=\"index.html\">Index</a></li>";
  echo "</ul>";
} else {
    echo "Fehler: " .$sql . "<br>" .mysqli_error($conn);
}

 ?>
