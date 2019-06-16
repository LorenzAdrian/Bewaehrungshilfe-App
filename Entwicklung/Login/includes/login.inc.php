<?php

if(isset($_POST['login'])) {

require 'dbh.inc.php';

$mailuid = $_POST['mailuid'];
$password = $_POST['pwd'];

if (empty($mailuid) || empty($password)) {
header("Location:../index_Login.php?error=emptyfields");
exit();
}
else {
  $sql = "SELECT * FROM users WHERE uidUsers = ? OR emailUsers =?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location:../index_Login.php?sqlerror");
    exit();
  }
  else {
  mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  if ($row = mysqli_fetch_assoc($result)) {
    $pwdCheck = password_verify($password, $row['pwdUsers']);
    if ($pwdCheck == false) {
      header("Location:../index_Login.php?wrongpswd");
      exit();
    }
    else if ($pwdCheck == true) {
      session_start();
      $_SESSION['userId'] = $row['idUSERS'];
      $_SESSION['userUid'] = $row['uidUsers'];
      header("Location:../test.php?login=success");
      exit();

    }
    else {
      header("Location:../index_Login.php?wrongpswd");
      exit();
    }
  }
  else {
    header("Location:../index_Login.php?nouser");
    exit();
  }
  }
}

}
else {
  header("Location:../index_Login.php?");
  exit();
}
