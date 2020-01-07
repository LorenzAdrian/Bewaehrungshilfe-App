<?php
include 'dbh.inc.php';

if(!isset($_SESSION))
{
    session_start();
}

// Check user login or not
if(!isset($_SESSION['userId'])){
    header('Location: login.php');
}

$gruppe = $_POST['gruppe'];
$username = $_POST['username'];

if ($gruppe == "admin"){
  // Check, ob User ein Admin
  $check = $_SESSION['rolle'];
  if ($check !== "admin") {
    header('Location:login.php');
    exit();
  } else {
    $adid = $_POST['adid'];
    $sql = "DELETE FROM admin WHERE adid = ?";
    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, $sql)) {
      mysqli_stmt_bind_param($stmt, "i", $adid);
      mysqli_stmt_execute($stmt);
      $erfolg = "Admin-Nutzer \"$username\" mit id \"$adid\" wurde erfolgreich gelöscht!";
      echo "<script type='text/javascript'>
        alert('$erfolg'); window.location = 'index_admin.php' </script>";
      mysqli_stmt_close($stmt);
      mysqli_close($conn);
    } else {
      header ("Location: index_admin.php?error=sqlerror");
      exit();
    }
  }
} else {
  header ("Location: login.php");
  exit();
}
?>
