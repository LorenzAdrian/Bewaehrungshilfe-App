<?php
require 'header.php';
 ?>

 <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styleAnmeldung.css">
 </head>

 <body>

    <main>
      <div class ="contain">
      <div class="logoA"></div>
      <div class="ueber">Signup</div>

<div class = formular>
        <form class="SFORM" action="includes/signup.inc.php" method="POST">


        <label for="Suse">Username </label>
        <input id = "Suse" type="text" name="uid" placeholder="Username">



        <label for="SMail">E-Mail </label>
        <input id="SMail" type="text" name="mail" placeholder="E-mail">



        <label for="SPassword">Password </label>
        <input id ="SPassword" type="password" name="pwd" placeholder="Password">



        <label for="Conf">Confirm </label>
        <input id="Conf" type="password" name="pwd-repeat" placeholder="Confirm password">



        <button id ="Signbut" type="submit" name="signup-submit">Signup</button>
      

        </form>
</div>
      </div>

    </main>

  </body>


 <?php
require 'footer.php';
  ?>
