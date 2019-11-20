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

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	 <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
	integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
	<!--- Pfad zur style.css--------------------------->
    <link rel="stylesheet" href="../CSS/index_proband.css">
    <!--Schriftart aus google fonts------------------>
    <link href="https://fonts.googleapis.com/css?family=Assistant:200,300,400,600,700&display=swap"  rel="stylesheet">
    <!-- Stylesheet für Icons-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
    <title>Startseite</title>
	
</head>
		<header>

<nav class="navbar navbar-expand-lg navbar-light bg-light flex-nowrap">
   
   <a class="navbar-brand w-100" href="#">
          		  <img src="../CSS/image/Baericon.jpeg"  width="30" height="30" alt="Logo" > &nbsp;&nbsp;Sodi 4u
			</a>
   
     <div class="navbar-collapse collapse w-100" id="navbar5">
        <ul class="navbar-nav mx-auto">
		<!-- Aktuelle Seite -->
      <li class="nav-item active">
        <a class="nav-link" href="../php/index_proband.php">Startseite<span class="sr-only">(current)</span></a>
      </li>
	  
      <li class="nav-item"> 
        <a class="nav-link" href="../php/termine_proband.php">Termine</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../php/MeineNachrichten.php">Nachrichten</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="../php/Dokumente.php">Dokumente</a>
      </li>
	  
	    <li class="nav-item">
        <a class="nav-link" href="Informationen.php">Informationen</a>
      </li>

	    <li class="nav-item">
        <a class="nav-link" href="To_Do_Liste.php">Leitfaden</a>
      </li>

	    <li class="nav-item">
        <a class="nav-link" href="Notfall.php">Notfall</a>
      </li>
	    <li class="nav-item">
        <a class="nav-link" href="login.php">Abmelden</a>
      </li>
     
		   
        </ul>
    </div>
    <div class="w-100"><!--spacer--></div>
		
		
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar5" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  </nav>


<hr>
</header>


<div class="rahmen">
   <table class="table">
   <tbody>
	<tr>
		<td>
			<a href="MeineNachrichten.php">
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
	</tbody>
</table>
</div>


<?php include '../includes/footer_proband.inc.php' ?>
</body>

</html>
	
	
