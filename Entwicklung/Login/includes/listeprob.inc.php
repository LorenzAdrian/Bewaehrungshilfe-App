<?php

if(isset($_POST['list-prob'])) {
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=loginsystemtest", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";

  $sql = "SELECT * FROM prob";
foreach ($conn->query($sql) as $row) {
   echo "ID: ".$row['ID']."<br />";
   echo "Vorname: ".$row['Vorname']."<br />";
   echo "Nachname: ".$row['Nachname']."<br />";
   echo "Geburtsdatum: ".$row['Geburtsdatum']."<br /><br />";
  // echo "BetreuerGruppe: ".$row['BetreuerGruppe']."<br /><br />";

}
}
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
  }
  else{

echo 'FAIL';

  }
?>
