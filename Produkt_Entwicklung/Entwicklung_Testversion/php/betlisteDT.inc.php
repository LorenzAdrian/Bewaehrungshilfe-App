<?php
if (!isset($_SESSION))
{
  session_start();
}

// Check user login or not
if (!isset($_SESSION['userId'])){
  header('Location: login.php');
}

// Probanden-Info aus der DB holen
require '../database/dbh.inc.php';
//$betID = $_SESSION['userId'];

$sql = "SELECT BID, Vorname, Nachname, Username, Email, TelNr, StellenZeichen, Zimmernr, Vertretung, AGID FROM betreuer";

$result = mysqli_query($conn, $sql);
$betreuer = array();
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)){
    $betreuer[] = $row;
  }
}
//Ausgabe-Anweisung für Debugging
//print_r($probanden);
?>

<!-- Probanden-Info als JSON/Javascript Objekt speichern -->
<script>
var betliste = <?php echo json_encode($betreuer);?>
</script>
