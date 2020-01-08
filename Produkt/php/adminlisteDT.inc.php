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

$sql = "SELECT ADID, Vorname, Nachname, Username, Email, TelNr, Stellenzeichen, Zimmernr, Vertretung, AGID FROM admin";

$result = mysqli_query($conn, $sql);
$admin = array();
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)){
    $admin[] = $row;
  }
}
//Ausgabe-Anweisung für Debugging
//print_r($probanden);
?>

<!-- Probanden-Info als JSON/Javascript Objekt speichern -->
<script>
var adminliste = <?php echo json_encode($admin);?>
</script>
