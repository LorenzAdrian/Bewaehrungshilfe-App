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
  } else {
    $adid = $_POST['adid'];
    $sql = "DELETE from admin where adid = ?";
    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, $sql)) {
      mysqli_stmt_bind_param($stmt, "s", $adid);
      mysqli_stmt_execute($stmt);
      $erfolg = "Admin-Nutzer \"$username\" mit id \"$adid\" wurde erfolgreich gelöscht!";
      echo "<script type='text/javascript'>
        alert('$erfolg'); window.location = 'index_admin.php' </script>";
    }
  }
}
elseif ($gruppe == "bwh"){
  // Check, ob User ein Admin
  $check = $_SESSION['rolle'];
  if ($check !== "admin") {
    header('Location:login.php');
  } else {
    $bid = $_POST['bid'];
    $sql = "DELETE from betreuer where bid = ?";
    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, $sql)) {
      mysqli_stmt_bind_param($stmt, "s", $bid);
      mysqli_stmt_execute($stmt);
      $erfolg = "BewährungshilferIn \"$username\" mit id \"$bid\" wurde erfolgreich gelöscht!";
      echo "<script type='text/javascript'>
        alert('$erfolg'); window.location = 'index_admin.php' </script>";
    } 
  }
}
else {
  $check = $_SESSION['rolle'];
  // Check, ob User ein Betreuer (Bwh)
  if ($check !== "betreuer") {
    header('Location:login.php');
  } else {
    $pid = $_POST['pid'];
    $sql = "DELETE from proband where pid = ?";
    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, $sql)) {
      mysqli_stmt_bind_param($stmt, "s", $pid);
      mysqli_stmt_execute($stmt);
    }
  }
}


?>
