<pre>
<?php
require "dbh.inc.php";

// Eingetragener Wert aus waehlbid.php
$BID = $_POST ['BID'];

// Probanden-Info aus der DB holen
$sql = "SELECT * FROM proband WHERE BID = ?";
//$sql = "SELECT Vorname, Nachname, BID FROM proband WHERE BID = 3";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
  echo "Fehler: " .$sql . "<br>" .mysqli_error($conn);
} else {
    mysqli_stmt_bind_param($stmt, "i", $BID);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    // result in einer Array speichern
    $probanden = array();
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)){
        $probanden[] = $row;
      }
    }
  }

//print_r($probanden);

// Probanden-Info als JSON-Datei speichern
$problistejson = json_encode($probanden, JSON_PRETTY_PRINT);
$file = 'includes/probliste.json';
file_put_contents($file, $problistejson);

//print_r($problistejson);
?>
</pre>
