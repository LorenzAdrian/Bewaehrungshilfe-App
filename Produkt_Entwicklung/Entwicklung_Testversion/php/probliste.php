<?php
// Javascript Double Click: http://javascript-coder.com/javascript-form/javascript-form-submit.phtml
//require "../includes/tabelle.inc.php";

if(!isset($_SESSION))
{
      session_start();
}

// Check user login or not
if(!isset($_SESSION['userId'])){
    header('Location: login.php');
}


// Probanden-Info aus der DB holen
require '../database/dbh.inc.php';
$probID = $_SESSION['userId'];

$sql = "SELECT * FROM proband WHERE BID = $probID";
$result = mysqli_query($conn, $sql);
$probanden = array();
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)){
    $probanden[] = $row;
  }
}
?>
<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <script>
      function mydblclick(){
        // probliste = Name des Formulars, das angesprochen werden soll
        document.probliste.submit();
      }
    </script>
  </body>
</html>


<?php

// Tabelle erzeugen und füllen
echo "<form name=\"probliste\" action = \"probinfo.php\" method = \"post\">";
// Double Click: Einen Name für das Formular muss gegeben werden, weil die Function etwas ansprechen muss
echo "<select name = \"proband\" size = \"5\" ondblclick=\"mydblclick(this)\";>";
foreach ($probanden as $proband) {
  echo "<option value = ".$proband['PID'].">".$proband['Vorname']." ".$proband['Nachname']."</option>>";
}
// Submit-Button
echo "</select>";

echo "<input type='hidden' name='betreuer' value='".$probID."'>";
// Double Click: input button brauchen wir nicht mehr
// echo "<input type= \"submit\" value = \"Proband auswählen\">";
echo "</form>";

// "unordered list" von Links
echo "<ul>";
echo "<li><a href=\"probanlegen.html\">Probanden anlegen </a></li>";
//echo "<li><a href=\"index.html\">Index </a></li>";
echo "</ul>";

 ?>
