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
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet"> 

    <title>Termine</title>

<!-- Header--> 
	<script src="../javascript/header_pro.js"></script>
	<?php include '../includes/header_pro.inc.php';
	?>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../CSS/header_pro.css" > 
 	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	
	
</head>


<body>
hier ist Platz für den Leitfaden

<?php include '../includes/footer_proband.inc.php' ?>
</body>

</html>
