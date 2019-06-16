<?php

$servername = '127.0.0.1'; //'localhost'
$username = 'root';
$passwort = '';
$dbname = ''; /* Wenn die gewünschte DB schon vorhanden ist */
$port = '3306' /* vgl. Portnummer für MySQL in XAMPP Control Panel */;

// Verbindung herstellen (mySQLi Procedural)
$conn = mysqli_connect($servername, $username, $passwort, $dbname, $port);
if (!$conn) {
  die ("Herstellung der Verbindung fehlgeschlagen: " .mysqli_connect_error());
}

$sql = "CREATE DATABASE IF NOT EXISTS terminetestdb CHARACTER SET utf8 COLLATE utf8_general_ci";
if (mysqli_query ($conn, $sql)) {
} else {
  echo "Datenbank Erstellung fehlgeschlagen: " .mysqli_error($conn);
}
mysqli_close($conn);

// update $dbname
$dbname = 'terminetestdb';

// Erneut verbinden (mySQLi Procedural)
$conn = mysqli_connect($servername, $username, $passwort, $dbname, $port);
if (!$conn) {
  die ("Herstellung der Verbindung fehlgeschlagen: " .mysqli_connect_error());
}


?>
