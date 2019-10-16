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
    <link rel="stylesheet" href="../CSS/style.css">
    <!--Schriftart aus google fonts------------------>
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">

    <title>Startseite</title>

</head>


<body>

<div class="logo"></div>

<div class="hallobox">Hallo <?php echo $_SESSION["username"]; ?></div>

<div class="menu">

            <li><a href ="https://cssgridgarden.com/#de"><img src="../CSS/image/search.svg">Suchen</a>
            </li>

            <li><a href ="#"><img src="../CSS/image/user-circle.svg">Mein Bereich</a>
            </li>
            <li>
				<form method='post' action="">
					<input type="submit" value="Logout" name="but_logout">
				</form>
			</li>
			<li>
				<a href="index_proband.php">
					<button>Zurück zur Startseite</button>
				</a>
			</li>

</div>


<div></div>

<div class="">
    <?php include 'FullCalendarProband.php';?>
</div>

</body>

</html>


<script src="../javascript/jquery-3.4.1.js"></script>
