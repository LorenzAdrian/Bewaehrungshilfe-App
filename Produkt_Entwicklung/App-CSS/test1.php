<!DOCTYPE html>
<html lang="de" dir="ltr">

<head>

    <meta charset="utf-8">

    <!--- Pfad zur style.css--------------------------->
    <link rel="stylesheet" href="style1.css">
    <!--Schriftart aus google fonts------------------>
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">

    <title>Kalender-Proband</title>

</head>

<body>

<div class="logo"></div>

<div class="hallobox">Proband XY</div>

<div class="menu">

            <li><a href ="https://cssgridgarden.com/#de"><img src="img/search.svg">Suchen</a>
            </li>

            <li><a href ="#"><img src="img/user-circle.svg">Mein Bereich</a>
            </li>

</div>

<div class="uberschrift1">Kalender XY</div>

<div class="uberschrift2">Mein Kalender</div>

<div class="calendar1">
    <?php include 'FullCalendar.php';?>
</div>

<div class="calendar">
    <?php include 'FullCalendar.php';?>
</div>

<div class="knopf">
    <a href="javascript:history.back()" class="knopf">Zurück</a>
</div>




</body>

</html>
