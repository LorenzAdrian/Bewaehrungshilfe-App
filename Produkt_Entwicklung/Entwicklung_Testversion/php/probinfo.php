
<html lang='en' dir='ltr'>
<!-- FULLCALENDAR -->
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

    </head>
    <body>
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
            <form action="termineinsert.php" method="post" target="_blank">
			  <input type="hidden" name = "probID" value ="<?php echo $probID ?>">
			  <input type="hidden" name = "betrID" value ="<?php echo $betrID ?>">
              <input type="submit"  value="Termin anlegen">
            </form>
          </td>
         <!-- <td>
            <form action="terminedelete.php" method="post">
              <input type="submit"  value="Termin löschen">
            </form>
          </td>-->
        </tr>
      </table>

    </body>
  </html>

  <script src="../javascript/jquery-3.4.1.js"></script>
