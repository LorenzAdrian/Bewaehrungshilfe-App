<?php
include '../database/dbh.inc.php';
session_start();

// Check user login or not
if(!isset($_SESSION['userId'])){
    header('Location: Login.php');
}

// logout

if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: Login.php');
}
?>



<!DOCTYPE html>
<html lang="de" dir="ltr">
<head>


    <!--- Pfad zur style.css--------------------------->
    <link rel="stylesheet" href="../CSS/index_proband.css">
    <!--Schriftart aus google fonts------------------>
    <link href="https://fonts.googleapis.com/css?family=Assistant:200,300,400,600,700&display=swap"  rel="stylesheet">
    <!-- Stylesheet für Icons-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Start</title>

	<!-- Header-->
	<script src="../javascript/header_pro.js"></script>
	<?php include '../includes/header_pro.inc.php';
	?>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../CSS/header_pro.css" >
 	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

</head>

<body>
<!---- siehe jz includes->header2.php
<header>
<div class="menubar">
    <div class="logo">
        <img src="../CSS/image/1000-Berliner_Baer.svg.png" alt="logo" class="berlin_logo">
    </div>

    <ul class="menu">

		<div class="hallobox">Hallo <?php echo $_SESSION["username"]; ?></div>

		 <li>
			<a href ="#suchen"><img src="../CSS/image/search.svg">Suchen</a>
		 </li>

         <li>
			<a href ="#mein_bereich"><img src="../CSS/image/user-circle.svg">Mein Bereich</a>
		 </li>

		 <li>
			<form method='post' action="">
                <input type="submit" value="Logout" class="button_logout" name="but_logout">
            </form>
         </li>

    </ul>

  </div>
</header>
--->

<div class="rahmen">
   <table>
	<tr>
		<td>
			<a href="MeineNachrichten.php#textfeld ">
				<div class="icon">
					<i class="fa fa-envelope" style="font-size:80px"></i></div>
				<div class="name">Nachrichten</div>
			</a>
		</td>
		<td>
			<a href="termine_proband.php">
				<div class="icon1">
					<i class="fa fa-calendar" style="font-size:80px"></i></div>
				<div class="name1">Termine</div>
			</a>
		</td>
	</tr>
	<tr>
		<td>
			<a href="Informationen.php">
				<div class="icon">
					<i class="fa fa-info-circle" style="font-size:80px"></i></div>
				<div class="name">Informationen</div>
			</a>
		</td>
		<td>
			<a href="Dokumente.php">
				<div class="icon1">
					<i class="fa fa-file" style="font-size:80px"></i></div>
				<div class="name1">Dokumente</div>
			</a>
		</td>
	</tr>
	<tr>
		<td>
			<a href="Notfall.php">
				<div class="icon">
					<i class="fa fa-ambulance" style="font-size:80px"></i></div>
				<div class="name">Notfall</div>
			</a>
		</td>
		<td>
			<a href="To_Do_Liste.php">
				<div class="icon1">
					<i class="fa fa-list-alt" style="font-size:80px"></i></div>
				<div class="name1">Leitfaden</div>
			</a>
		</td>
	</tr>
</table>
</div>


<?php include '../includes/footer_proband.inc.php' ?>
</body>

</html>
