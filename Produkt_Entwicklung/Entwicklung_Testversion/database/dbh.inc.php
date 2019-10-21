<?php

// Die Verbindung mit der Datenbank wird aufgebaut

$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "bewaehrungshilfe";

$conn = mysqli_connect($servername,$dbUsername,$dbPassword,$dbName);

if (!$conn) {
  die("Connection Failed!!".mysqli_connect_error());
    }
