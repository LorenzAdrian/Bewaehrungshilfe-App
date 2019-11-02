<?php
// Die Verbindung mit der Datenbank wird aufgebaut
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "bewaehrungshilfe";

$conn = mysqli_connect($servername,$dbUsername,$dbPassword,$dbName);
mysqli_set_charset ($conn, "utf8");

if (!$conn) {
  die("Connection Failed!!".mysqli_connect_error());
    }
