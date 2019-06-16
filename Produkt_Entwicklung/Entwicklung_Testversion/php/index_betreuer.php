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
    <!--Pfad zu dem Ordner, wo sich die Logos befinden-->
    <!--<link rel="stylesheet" href="file:///Users/adrianschuetz/Desktop/site/css/fontawesome.min.css">-->
    <!--- Pfad zur style.css--------------------------->
    <link rel="stylesheet" href="../CSS/style.css">
    <!------------Schriftart aus google fonts------------------>
    <link href="https://fonts.googleapis.com/css?family=Encode+Sans+Semi+Condensed&display=swap" rel="stylesheet">

    <title>Startseite</title>

</head>

<body>

<div class="willkommencontainer">
    <img src="../CSS/image/Logo.png" alt="Logo" height="130px">
    <h1>Hallo <?php echo $_SESSION["username"]; ?></h1>
</div>

<ul>
    <li>
        <a href="#">
            <div class="icon">
                <i class="fa fa-search" style="font-size:80px"></i></div>
            <div class="name">Suchen</div>
        </a>
    </li>

    <li>
        <a href="#">
            <div class="icon">
                <i class="fa fa-user" style="font-size:80px"></i></div>
            <div class="name">Mein Konto</div>
        </a>
    </li>
	<li>
        <form method='post' action="">
            <input type="submit" value="Logout" name="but_logout">
        </form>
    </li>
</ul>

<div class="beschriftung">
    <li>Meine Termine</li>
</div>

<div class="Kalenderliste">

<div class="liste">
    <div class="rahmen">
    <?php include'probliste.php';?>

    </div>
</div>

<div id="calendar">
    <?php
    include 'FullCalendar.php';?>
</div>
</div>

</body>
</html>
