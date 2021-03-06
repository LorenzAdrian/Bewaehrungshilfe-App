<?php

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
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <!--- Pfad zur style.css--------------------------->
  <link rel="stylesheet" href="../CSS/betreuer_index.css">
  <!-- Animate CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
  <!--Pfad zu ICON Fontawesome-->
  <link rel="stylesheet" href="../CSS/css/all.min.css">  
  
  <title>Start</title>
  <link rel="icon" type="image/x-icon" href="../CSS/image/sodibaer.png" >

</head>

<body>
<!-- HEADER -->
<header>

<nav class="navbar navbar-expand-lg navbar-light flex-nowrap">

    <a class="navbar-brand w-100" href="#">
      <img src="../CSS/image/LogoOhneSchatten.png"  width="50" height="50" alt="Logo" > &nbsp;&nbsp;SoDi4U
    </a>
    <div class="w-100"><!--spacer--></div>
    <div class="w-100"><!--spacer--></div>
    <div class="w-100"><!--spacer--></div>
    <div class="w-100"><!--spacer--></div>
    <div class="w-100"><!--spacer--></div>
     <div class="navbar-collapse collapse w-100" id="navbar5">
        <ul class="navbar-nav mx-auto">
         <li class="nav-item active">
          <a class="nav-link" href="passwortAendernBet.php">Passwort&nbsp;ändern<span class="sr-only">(current)</span><br><i class="fas fa-key"></i></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="login.php">Abmelden<br><i class="fas fa-sign-out-alt"></i></a>
        </li>
      </ul>
    </div>
    <div class="w-100"><!--spacer--></div>


  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar5" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  </nav>
</header>
  <!--Begrüßungscontainer -->
    
  <div class="container hallo-container">
    <div class="row hallo-row">
      <div class="col-lg-12 hallo-col">
        <div class="intro">
          <h1 class="animated fadeInDown delay-1s">Hallo <?php echo $_SESSION['vorname']; echo " "; echo $_SESSION['nachname']?> </h1>
        </div>
        <p>Zum Verwalten klicken Sie bitte auf den gewünschten Probanden</p>
      </div>
    </div>
  </div>

  <!--Table und Fullcalender -->
  <div class="container table-container">
    <div class="row">
      <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 text-col">
        <?php include 'dataTbl.php';?>
        <br>
        <form class="buttonform" action="anlegen_prob.php" method="post">
          <button class="btn btn-outline-danger" type="submit" name="prob-anlegen" value="Proband anlegen">Proband anlegen <i class="fas fa-user-plus"></i></button>
          
          <!--<input class="btn btn-outline-danger" type="button" name="" value="Proband löschen" > -->
        </form>
      </div>

    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
          <?php include 'FullCalendar.php';?>
      </div>
    </div>
  </div>

     <footer id="sticky-footer" class="py-2 bg-dark text-white-50">
    <div class="container footer-container">
      <li>
        <a href="datenschutz.html">Datenschutz</a>
      </li>
      <li>
        <a href="impressum.html">Impressum</a>
      </li>
      <li>
        <a href="kontakt.html">Kontakt</a>
      </li>
    </div>
  </footer>
</body>
</html>

