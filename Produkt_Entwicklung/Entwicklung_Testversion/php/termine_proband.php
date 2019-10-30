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

<header>
        <div class="menubar">
           
			<div class="logo">
                <img src="../CSS/image/1000-Berliner_Baer.svg.png" alt="logo" class="berlin_logo">
            </div>
		   <ul class="menu">
				
				<li>                      
					  <a href="index_proband.php" class="nav-link1">Startseite</a>
                </li>
				<li>
					<a href ="#"><img src="../CSS/image/user-circle.svg" class="nav-link2">Mein Bereich</a>
				</li>
				<li>
				</li>
				<li>
				</li>
				<li>
				</li> 
				<li>
					<a href="login.php" class="nav-link3">Logout <!-- (<?php echo $_SESSION["username"]; ?>)--> </a>
				</li>
								
            </ul>
				
		</div>
	</header>
	
<section class="calendar">
       <h1>Meine Termine</h1>
       	   
</section>


<div class="fullcalendar">

    <?php include 'FullCalendarProband.php';?>
</div>
<div></div>
</body>

</html>


<script src="../javascript/jquery-3.4.1.js"></script>
