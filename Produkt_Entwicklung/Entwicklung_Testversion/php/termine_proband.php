<?php
include '../database/dbh.inc.php';
session_start();

// Check user login or not
if(!isset($_SESSION['userId'])){
  $_SESSION['probID'] = $_SESSION['userId'];
    header('Location: login.php');
}

// logout

if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="de" dir="ltr">
<head>
    <meta charset="utf-8">
	<!--- Pfad zur style.css--------------------------->
    <link rel="stylesheet" href="../CSS/termine_proband.css">
    <!--Schriftart aus google fonts------------------>
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">

    <title>Startseite</title>
	<?php include '../includes/header.html';
	?>
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet"> 
</head>


<body>
	
<section class="calendar">
       <h1>Meine Termine</h1>
       	   
</section>


<div class="fullcalendar">

    <?php include 'FullCalendarProband.php';?>
</div>
<?php include '../includes/footer.inc.php' ?>
</body>

</html>


<script src="../javascript/jquery-3.4.1.js"></script>
