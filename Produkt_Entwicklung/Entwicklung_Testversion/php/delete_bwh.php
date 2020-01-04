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

if ($gruppe == "bwh"){
  // Check, ob User ein Admin
  $check = $_SESSION['rolle'];
  if ($check !== "admin") {
    header('Location:login.php');
  } else {
    $bid = $_POST['bid'];
    $sql = "DELETE FROM betreuer WHERE bid = ?";
    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, $sql)) {
      mysqli_stmt_bind_param($stmt, "i", $bid);
      mysqli_stmt_execute($stmt);
      $erfolg = "BewährungshilferIn \"$username\" mit id \"$bid\" wurde erfolgreich gelöscht!";
      echo "<script type='text/javascript'>
        alert('$erfolg'); window.location = 'index_admin.php' </script>";
    } else {
      header ("Location: index_admin.php?error=sqlerror");
    }
  }
} else {
  header ("Location: login.php");
}
?>
