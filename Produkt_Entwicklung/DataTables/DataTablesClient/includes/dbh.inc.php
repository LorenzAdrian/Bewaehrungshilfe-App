<?php

$servername = '127.0.0.1'; //'localhost'
$username = 'root';
$passwort = '';
$dbname = 'bewaehrungshilfe'; /* Wenn die gewünschte DB schon vorhanden ist */
$port = '3306' /* vgl. Portnummer für MySQL in XAMPP Control Panel */;

// Verbindung herstellen (mySQLi Procedural)
$conn = mysqli_connect($servername, $username, $passwort, $dbname, $port);
if (!$conn) {
  die ("Herstellung der Verbindung fehlgeschlagen: " .mysqli_connect_error());
}

?>
