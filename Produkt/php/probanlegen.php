<?php

//require "../includes/tabelle.inc.php";

// Eingetragene Werte von probanlegen.html
$nachname = $_POST ['probNachname'];
$vorname = $_POST ['probVorname'];
$geburtstag = $_POST ['probGeburtstag'];

$sql = "INSERT INTO proband (Nachname, Vorname, Geburtsdatum) VALUES (?, ?, ?)";
$stmt = mysqli_stmt_init($conn);
if (mysqli_stmt_prepare($stmt, $sql)) {
  mysqli_stmt_bind_param($stmt, "sss", $nachname, $vorname, $geburtstag);
  mysqli_stmt_execute($stmt);
  echo "Proband erfolgreich angelegt<p>";

// html-Tabelle, um der Nutzer zu informieren, was gerade gespeichert wurde
  echo "<table>";
  echo "<tr>";
  echo "<td> Nachname: </td>";
  echo "<td> $nachname </td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td> Vorname: </td>";
  echo "<td> $vorname </td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td> Geburtsdatum: </td>";
  echo "<td> $geburtstag </td>";
  echo "</tr>";
  echo "</table>";
  echo "<p>";

  echo "<form action ='probanlegen.html' method ='post'>";
  echo "<input type ='submit' value ='Weitere Probanden anlegen'>";
  echo "</form>";

  echo "<ul>";
  echo "<li><a href=\"fullcalendar/fullcalendar.php\">Kalender</a></li>";
//  echo "<li><a href=\"index.html\">Index</a></li>";
  echo "<li><a href=\"probliste.php\">Probandenliste</li>";
  echo "</ul>";
} else {
    echo "Fehler: " .$sql . "<br>" .mysqli_error($conn);
}

 ?>
