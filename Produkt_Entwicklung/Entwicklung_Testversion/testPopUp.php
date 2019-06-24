<!DOCTYPE html>
<html lang="de" dir="ltr">

<head>

    <meta charset="utf-8">

    <!--- Pfad zur style.css--------------------------->
    <link rel="stylesheet" href="style1.css">
    <!--Schriftart aus google fonts------------------>
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">

    <title>Start</title>

</head>

<body>

<div class="logo">
<img src="IMG/Logo.png" alt="Logo" height="130px">
</div>

<div class="hallobox">Hallo...</div>

<div class="menu">

            <li><a href ="https://cssgridgarden.com/#de"><img src="img/search.svg">Suchen</a>
            </li>

            <li><a href ="#"><img src="img/user-circle.svg">Mein Bereich</a>
            </li>

</div>

<div class="uberschrift1">Meine Probanden</div>

<div class="uberschrift2">Mein Kalender</div>

<div class="rahmen">
    <?php include'Beispiel_DataList.html';?>
</div>

<div class="calendar">
   <?php
    include 'FullCalendar.php';?>
	<a target="popup" onclick="window.open('', 'popup', 'width=580,height=360,scrollbars=no, toolbar=no,status=no, resizable=yes,menubar=no,location=no,directories=no,top=10,left=10')
	"href="terminetest_28052019/terminetestinsert.html"><button type="submit" 
	name="button">Termin anlegen</button></a>
<br>

   <a target="popup" onclick="window.open('', 'popup', 'width=580,height=360,scrollbars=no, toolbar=no,status=no, resizable=yes,menubar=no,location=no,directories=no,top=10,left=10')
	"href="terminetest_28052019/terminetestdelete.html"><button type="submit" 
	name="button">Termin löschen</button></a>
</form>
</div>

<div class="button">
    <a href="#" class="button">Proband hinzufügen</a>
</div>

<div class="knopf">
    <a href="#" class="knopf">Proband löschen</a>
</div>

</body>

</html>