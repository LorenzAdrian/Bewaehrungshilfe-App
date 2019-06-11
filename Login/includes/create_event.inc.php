<?php
if(isset($_POST['anlegen-submit'])) {

require 'dbh.inc.php';

$start = $_POST['event-start'];
$end = $_POST['event-end'];
$title= $_POST['event-title'];
$color = $_POST['event-color'];

if (empty($start) || empty($end) || empty($title)) {
    header("Location: ../index_Login.php?error=emptyfields&start=".$username."&end=".$email."&title".$title);
    exit();
  }
//  elseif (!preg_match("/^[0-9T:]*$/", $start, $end)) {
  //  header("Location: ../index_Login.php?error=invalidstart&end");
  //  exit();
//  }


      else {
        $sql = "INSERT INTO tbl_events (start, end, title, color) VALUES (?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          header("Location: ../signup.php?error=sqlerror");
          exit();
        }
        else {

          mysqli_stmt_bind_param($stmt, "ssss", $start, $end, $title, $color);
          mysqli_stmt_execute($stmt);
          header("Location: ../signup.php?create_event=success");
          exit();
         }
      }


    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

else {
  header("Location:../header.php");
  exit();
}
