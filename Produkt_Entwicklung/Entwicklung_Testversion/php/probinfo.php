
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

//require "includes/tabelle.inc.php";
require "../database/dbh.inc.php";

$probID = $_POST['proband'];

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

function get_data($probID)
{
  $conn = mysqli_connect('localhost','root','','bewaehrungshilfe');
  $event_sql = "SELECT * FROM termin WHERE PID = $probID";

  $result2 = mysqli_query($conn, $event_sql);
  $event_data = array();

  while ($row = mysqli_fetch_array($result2))
{
  if ($row['Status'] == 'b' || $row['Status'] == '1'){ //'b' muss noch weg
	  $row['Status'] = 'green';
  }
  if ($row['Status'] == 'o' || $row['Status'] == '2'){ //'o' muss noch weg
	  $row['Status'] = 'blue';
  }
  if ($row['Status'] == '3'){
	  $row['Status'] = 'grey';
  }
  $event_data [] = array(
	
    'id'        => $row['TID'],
    'start'     => $row['Beginn'],
    'end'       => $row['Ende'],
    'title'     => $row['Titel'],
    'color'     => $row['Status'],
    'PID'       =>  $row['PID'],
    'BID'       =>  $row['BID']
  );

}

 return json_encode($event_data);
}

$file_name = 'JSON/proband_events.json';
file_put_contents($file_name, get_data($probID));
//header("Location: ../index_Login.php?JSONdateierstellt");


  //  mysqli_close($conn);

//}





// "unordered list" von Hypertext-Links, um von Seite zur Seite zu navigieren
//echo "<ul>";
//echo "<li><a href=\"probanlegen.html\">Probanden anlegen </a></li>";
//echo "<li><a href=\"probliste.php\">Probandenliste </a></li>";
//echo "<li><a href=\"index.html\">Index </a></li>";
//echo "</ul>";

include 'FullCalendarProband.php';

include 'FullCalendar.php';

?>

<html lang='en' dir='ltr'>
<!-- FULLCALENDAR -->
  <head>

    </head>
    <body>
      <table>
        <tr>
          <td>
            <form action="termineinsert.php" method="post">
              <input type="submit"  value="Termin anlegen">
            </form>
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
