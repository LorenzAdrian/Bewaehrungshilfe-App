
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
