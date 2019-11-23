<?php

// Check user login or not
if(!isset($_SESSION['userId'])){
    header('Location: login.php');
}

if(isset($_POST['passwortAendern'])) {
  //Datenbank-Verbindung
  require 'dbh.inc.php';

  $passwort= mysqli_real_escape_string($conn, $_POST['pwd']);
  $passwortRepeat = mysqli_real_escape_string($conn, $_POST['pwd-repeat']);
  $passwortAltes = mysqli_real_escape_string($conn, $_POST['pwd-altes']);
  $userID = $_POST['uid'];

  //Leere Felder?
  if (empty($passwort) || empty($passwortRepeat) || empty($passwortAltes)){
    header("Location: passwortAendern.php?error=emptyfields");
    exit();
    }

  //"Neues Passwort" und "Neues Passwort wiederholen" stimmen überein?
  if ($passwort !== $passwortRepeat){
    header ("Location: passwortAendern.php?error=pwd_nicht_gleich");
    exit();
  }

  //Prüft, ob "Neues Passwort" tatsächlich neu ist
  if ($passwort == $passwortAltes){
    header ("Location: passwortAendern.php?error=keinNeuesPwd");
    exit();
  }

  //Überprüfung des alten Passwort
  $sql = "SELECT * FROM proband WHERE PID = $userID";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
     while($row = mysqli_fetch_assoc($result)) {
       $pwdCheck = password_verify($passwortAltes, $row['Passwort']);
     }
  }
  if ($pwdCheck == false){
    header("Location: passwortAendern.php?error=falsches_pwd");
    exit();
  }

  //Passwort aktualisieren
  $sql = "UPDATE proband SET Passwort = ? WHERE PID = ?";
  $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: passwortAendern.php?error=sqlerror");
      exit();
      }
    else{
      //Passwort wird gehasht (verschlüsselt)
      $hashedPwd = password_hash($passwort, PASSWORD_DEFAULT);
      //Passwort wird aktualisiert
      mysqli_stmt_bind_param($stmt, 'si', $hashedPwd, $userID);
      mysqli_stmt_execute($stmt);
      header("Location: index_proband.php?passwortAendern=success");
      exit();
    }

  mysqli_stmt_close($stmt);
  mysqli_close($conn);

}

?>
