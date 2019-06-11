<?php

require "includes/tabelle.inc.php";

$probID = $_POST['proband'];

$sql = "SELECT * FROM prob WHERE probID = ".$probID;
$result = mysqli_query($conn, $sql);
$probInfo = array();
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)){
    $probInfo[] = $row;
  }
}

// Info des ausgewählten Probandes
foreach ($probInfo as $info) {
  echo "Nachname: ".$info['nachname']."<br>";
  echo "Vorname: ".$info['vorname']."<br>";
  echo "Geburtsdatum: ".$info['geburtsdatum']."<br>";
}

// "unordered list" von Hypertext-Links, um von Seite zur Seite zu navigieren
echo "<ul>";
echo "<li><a href=\"probanlegen.html\">Probanden anlegen </a></li>";
echo "<li><a href=\"probliste.php\">Probandenliste </a></li>";
echo "<li><a href=\"index.html\">Index </a></li>";
echo "</ul>";

?>
