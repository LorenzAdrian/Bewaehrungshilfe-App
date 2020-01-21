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

if ($gruppe == "prob"){
  $check = $_SESSION['rolle'];
  // Check, ob User ein Betreuer (Bwh)
  if ($check !== "betreuer") {
    header('Location:login.php');
    exit();
  } else {
    $pid = $_POST['pid'];
    $sql = "DELETE From nachricht where PID = ?";
    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, $sql)) {
      mysqli_stmt_bind_param($stmt, "i", $pid);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_close($stmt);
    //    header('Location: index_betreuer.php');
    }
    $sql = "DELETE From termin where PID = ?";
    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, $sql)) {
      mysqli_stmt_bind_param($stmt, "i", $pid);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_close($stmt);
    //    header('Location: index_betreuer.php');
    }
    $sql = "DELETE From aktivität where PID = ?";
    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, $sql)) {
      mysqli_stmt_bind_param($stmt, "i", $pid);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_close($stmt);
    //    header('Location: index_betreuer.php');
    }
    $sql = "DELETE FROM proband WHERE pid = ?";
    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, $sql)) {
      mysqli_stmt_bind_param($stmt, "i", $pid);
      mysqli_stmt_execute($stmt);
      if (mysqli_stmt_execute ($stmt) == TRUE){
        $erfolg = "ProbandIn \"$username\" mit id \"$pid\" wurde erfolgreich gelöscht!";
        echo "<script type='text/javascript'>
          alert('$erfolg'); window.location = 'index_betreuer.php' </script>";
      } else {
        echo "ERROR: ";
        echo mysqli_stmt_error($stmt);
      }
      mysqli_stmt_close($stmt);
      mysqli_close($conn);
    } else {
      header ("Location: index_betreuer.php?error=sqlerror");
      exit();
    }
  }
} else {
  header ("Location: login.php");
  exit();
}
?>
