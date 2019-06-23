<?php
include '../includes/events_aktualisieren.inc.php';

include 'dbh.inc.php';
if(!isset($_SESSION))
{
      session_start();
}

// Check user login or not
if(!isset($_SESSION['userId'])){
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
    <link rel="stylesheet" href="../CSS/style.css">
    <!--Schriftart aus google fonts------------------>
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">

    <title>Start</title>

</head>

<body>

<div class="logo"></div>

<div class="hallobox">Hallo <?php echo $_SESSION["username"]; ?></div>

<div class="menu">

            <li><a href ="https://cssgridgarden.com/#de"><img src="../CSS/image/search.svg">Suchen</a>
            </li>

            <li><a href ="#"><img src="../CSS/image/user-circle.svg">Mein Bereich</a>
            </li>
            <li>    <form method='post' action="">
                <input type="submit" value="Logout" name="but_logout">
            </form>
          </li>

</div>

<div class="uberschrift1">Meine Probanden</div>

<div class="uberschrift2">Mein Kalender</div>

<div class="rahmen">
    <?php include'probliste.php';?>
</div>

<div class="calendar">
    <?php include 'FullCalendar.php';?>


	<a target="popup" onclick="window.open('', 'popup', 'width=580,height=360,scrollbars=no, toolbar=no,status=no, resizable=yes,menubar=no,location=no,directories=no,top=10,left=10')
	"href="termineinsert.php"><button type="submit"
	name="button">Termin anlegen</button></a>
<br>

   <a target="popup" onclick="window.open('', 'popup', 'width=580,height=360,scrollbars=no, toolbar=no,status=no, resizable=yes,menubar=no,location=no,directories=no,top=10,left=10')
	"href="terminedelete.php"><button type="submit"
	name="button">Termin loeschen</button></a>
</div>

</body>

</html>
