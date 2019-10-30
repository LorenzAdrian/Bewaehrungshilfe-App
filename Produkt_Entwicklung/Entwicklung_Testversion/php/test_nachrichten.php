<?php
$conn = mysqli_connect('localhost','root','','bewaehrungshilfe');
$event_sql = "SELECT * FROM nachricht_test6 WHERE BID = 3";
$result = mysqli_query($conn, $event_sql);
$event_data = array();
while ($row = mysqli_fetch_array($result))
{

  if ($row['Status' == 'neu']) {



  }
  $event_data [] = array(
    'Zeit'     => $row['Zeitstempel'],
    'Text'       => $row['Text'],
    'Bezug'     => $row['BezugID'],
    'Status'     => $row['Status'],
    'PID'       =>  $row['PID'],
    'BID'       =>  $row['BID'],
    'Sender'   => $row['BSender']
  );

}

//foreach($event_data) {
//echo "<td>".$event_data['Zeitstempel'];."<td>";
//}


foreach($event_data as $nachricht){
//  echo "<input type\"text\" value=".$nachricht['Zeit'].">";
//  echo "<textarea cols=\"150\" rows=\"20\">".$nachricht['Text']."</textarea><br>";

  if ($nachricht['Status']!='neu') {
    echo "<table border=\"3\">";
    echo "<tr><td>Zeit</td><td>Nachrichten</td></tr>";
    echo "<tr><td>".$nachricht['Zeit']."</td><td>".$nachricht['Text']."</td></tr>";
    echo "</table>";
  }

else {
  echo "<table border=\"1\" bgcolor=\"yellow\">";
  echo "<tr><td>Zeit</td><td>Nachrichten</td></tr>";
  echo "<tr><td>".$nachricht['Zeit']."</td><td>".$nachricht['Text']."</td></tr>";
  echo "</table>";
}

}


/*print_r($event_data);
$nachrichten3 =json_encode($event_data);
echo "<textarea cols=\"200\" rows=\"200\">".$nachrichten3."</textarea>";
*/
 ?>
