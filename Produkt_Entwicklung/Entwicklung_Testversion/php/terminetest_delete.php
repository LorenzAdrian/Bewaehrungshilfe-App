<?php

//require "includes/tabelle.inc.php";

require '../database/dbh.inc.php';
// Eingetragene ID-Nummer von terminetestdelete.html
$id = $_POST['terId'];

// Werte löschen mit "prepared statements" (mySQLi Procedural)
$sql = "DELETE FROM termin WHERE TID = ?";
$stmt = mysqli_stmt_init($conn);
if (mysqli_stmt_prepare($stmt, $sql)) {
  mysqli_stmt_bind_param($stmt, "s", $id);
  mysqli_stmt_execute($stmt);
  echo "Termin erfolgreich geslöscht<p>";

  // Button um Zurück zur terminform.html-Seite zu gehen
  echo "<form action ='terminetestdelete.html' method ='post'>";
  echo "<input type ='submit' value ='Weitere Termine löschen'>";
  echo "</form> <p>";

  echo "<a href=\"index_betreuer.php\">Startseite</a>";
} else {
    echo "Fehler: " .$sql . "<br>" .mysqli_error($conn);
}

 ?>
