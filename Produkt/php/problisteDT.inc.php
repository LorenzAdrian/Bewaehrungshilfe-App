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
$betID = $_SESSION['userId'];

$sql = "SELECT Vorname, Nachname, PID, BID, (SELECT COUNT(NID) FROM nachricht AS n WHERE n.PID = p.PID AND Status = 'neu' AND BSender = 0) AS 'ungeleseneNachrichten'

FROM proband AS p

WHERE BID = $betID";
$result = mysqli_query($conn, $sql);
$probanden = array();
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)){
    $probanden[] = $row;
  }
}
//Ausgabe-Anweisung für Debugging
//print_r($probanden);
?>

<!-- Probanden-Info als JSON/Javascript Objekt speichern -->
<script>
var probliste = <?php echo json_encode($probanden);?>
</script>
