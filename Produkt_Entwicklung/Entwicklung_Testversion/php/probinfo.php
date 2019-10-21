
<html lang='en' dir='ltr'>
<!-- FULLCALENDAR
Die Betreuer ansicht mit den zwei Kalendern
-->
  <head>

    </head>
    <body>
              <form action="index_betreuer.php" method="post">
              <input type="submit"  value="Startseite">
            </form>
        </body>
</html>




<?php

if(!isset($_SESSION))
{
      session_start();
}

// Check user login or not
if(!isset($_SESSION['userId'])){
    header('Location: login.php');
}



//require "includes/tabelle.inc.php";
require "../database/dbh.inc.php";

include "Nachrichten_menu.php";


$betrID = $_POST['betreuer'];
$probID = $_POST['proband'];

if(!isset($_SESSION['prodID'])){
$_SESSION['probID'] = $probID;}

else {
	$probID = $_POST['terPID'];
}







$sql = "SELECT * FROM proband WHERE PID = ".$probID;
$result = mysqli_query($conn, $sql);
$probInfo = array();
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)){
    $probInfo[] = $row;
  }
}

// Info des ausgewählten Probandes
foreach ($probInfo as $info) {
  echo "Nachname: ".$info['Nachname']."<br>";
  echo "Vorname: ".$info['Vorname']."<br>";
  //echo "Geburtsdatum: ".$info['Geburtsdatum']."<br>";
}
//if(isset($_POST['refresh-event'])) {
//require 'dbh.inc.php';


//header("Location: ../index_Login.php?JSONdateierstellt");


  //  mysqli_close($conn);

//}





// "unordered list" von Hypertext-Links, um von Seite zur Seite zu navigieren
//echo "<ul>";
//echo "<li><a href=\"probanlegen.html\">Probanden anlegen </a></li>";
//echo "<li><a href=\"probliste.php\">Probandenliste </a></li>";
//echo "<li><a href=\"index.html\">Index </a></li>";
//echo "</ul>";

//include 'FullCalendarProband.php';

//include 'FullCalendar.php';

?>

<html lang='en' dir='ltr'>
<!-- FULLCALENDAR -->
  <head>
<!-- Script um das menu zu erzeugen, die Styles für das aussehen des menus-->

    <script>
    function openNav() {
      document.getElementById("mySidenav").style.width = "15%";
      document.getElementById("main").style.marginLeft = "15.1%";
    }

    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
      document.getElementById("main").style.marginLeft= "0";
    }
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    body {
      font-family: "Lato", sans-serif;
    }

    .sidenav {
      height: 100%;
      width: 0;
      position: fixed;
      z-index: 1;
      top: 0;
      left: 0;
      background-color: whitesmoke;
      overflow-x: hidden;
      transition: 0.5s;
      padding-top: 60px;
    }

    .sidenav a {
      padding: 8px 8px 8px 32px;
      text-decoration: none;
      font-size: 25px;
      color: #818181;
      display: block;
      transition: 0.3s;
    }

    .sidenav a:hover {
      color: #f1f1f1;
    }

    .sidenav .closebtn {
      position: absolute;
      top: 0;
      right: 25px;
      font-size: 36px;
      margin-left: 50px;
    }

    #main {
      transition: margin-left .5s;
      padding: 16px;
    }

    @media screen and (max-height: 450px) {
      .sidenav {padding-top: 15px;}
      .sidenav a {font-size: 18px;}
    }
    </style>
    </head>
    <body>
      <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          <?php
          echo $alteNachrichten;
          echo "<br>";
          echo $neueNachrichten;
          ?>
      </div>

      <div id="main">

        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Nachrichten</span>

		<table>
		<tr>
		<td>
		<?php include 'FullCalendarProband.php';
		?>
		</td>
		<td>
		<?php include 'FullCalendar.php';
		?>
		</td>
		</tr>
		</table>

		 <table>
        <tr>
          <td>
</div>
		  <!-- <details> ist ein HTML5 Element, das das Ausklappen ermöglicht. Kein Button notwendig.
				<summary> legt den Text fest, der vor dem ausklappen sichtbar ist -->
           <details>

				<summary> Termin anlegen </summary>

						<form action = "terminetest_insert.php" method = "post">

						  <p> Title: <input name = "terTitel" type = "text" size = "50" placeholder = "Titel" > </p>
						  <p> Datum: <input name = "terDatum" type = "date" </p>
						  <p> Start: <input name = "terStart" type = "time" </p>
						  <p> End: <input name = "terEnde" type = "time"  </p>
						  <p><!-- Status: --><input name = "terStatus" type = "hidden" size="50" value="2"  </p>
						  <p><!-- PID: --><input name = "terPID" type = "hidden"  size ="3" value="<?php echo $probID ?>"</p>
						  <p><!-- BID: --><input name = "terBID" type = "hidden" size = "3" value="<?php echo $betrID ?>" </p>
						  <p>
						  <input type = "submit" value = "Termin speichern">
						</form>

			</details>

          </td>
			<td>
				<form action="terminedelete.php" method="post">
				<input type="submit"  value="Termin löschen">
				</form>
			</td>
        </tr>
      </table>





    </body>
  </html>

  <script src="../javascript/jquery-3.4.1.js"></script>
