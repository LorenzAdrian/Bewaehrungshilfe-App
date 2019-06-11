<?php

require "includes/tabelle.inc.php";

// Probanden-Info aus der DB holen
$sql = "SELECT * FROM prob";
$result = mysqli_query($conn, $sql);
$probanden = array();
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)){
    $probanden[] = $row;
  }
}

// Tabelle erzeugen und füllen
echo "<form action = \"probinfo.php\" method = \"post\">";
echo "<select name = \"proband\" size = \"5\">";
foreach ($probanden as $proband) {
  echo "<option value = ".$proband['probID'].">".$proband['vorname']." ".$proband['nachname']."</option>";
}
// Submit-Button
echo "</select>";
echo "<input type= \"submit\" value = \"Proband auswählen\">";
echo "</form>";

// "unordered list" von Links
echo "<ul>";
echo "<li><a href=\"probanlegen.html\">Probanden anlegen </a></li>";
echo "<li><a href=\"index.html\">Index </a></li>";
echo "</ul>";

 ?>
