<?php

$servername = 'localhost';
$username = 'root';
$passwort = '';
$dbname = 'loginsystemtest'; /* Wenn der gewünschten DB schon vorhanden ist */
$port = '3306' /* vgl. Portnummer für MySQL in XAMPP Control Panel */;

try {
    $conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $passwort);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //  echo "Die Verbindung mit $servername wurde erfolgreich hergestellt <p>";

}
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
