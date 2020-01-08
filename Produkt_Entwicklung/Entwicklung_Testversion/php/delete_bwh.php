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
    exit();
  } else {
    $bid = $_POST['bid'];
    $sql = "DELETE FROM betreuer WHERE bid = ?";
    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, $sql)) {
      mysqli_stmt_bind_param($stmt, "i", $bid);
      mysqli_stmt_execute($stmt);
      if (mysqli_stmt_execute ($stmt) == TRUE){
        $erfolg = "Admin-Nutzer \"$username\" mit id \"$bid\" wurde erfolgreich gelöscht!";
        echo "<script type='text/javascript'>
          alert('$erfolg'); window.location = 'index_admin.php' </script>";
      } else {
        echo "ERROR: ";
        echo mysqli_stmt_error($stmt);
      }
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
