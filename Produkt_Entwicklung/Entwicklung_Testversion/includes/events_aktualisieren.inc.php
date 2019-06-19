<?php
//if(isset($_POST['refresh-event'])) {
//require 'dbh.inc.php';
if(!isset($_SESSION))
{
      session_start();
}

function get_data()
{

  $conn = mysqli_connect('localhost','root','','bewaehrungshilfe');
  $event_sql = "SELECT * FROM termin WHERE BID = ".$_SESSION['userId'];
  $result = mysqli_query($conn, $event_sql);
  $event_data = array();
  while ($row = mysqli_fetch_array($result))
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
    'color'    => $row['Status'],
    'PID'       =>  $row['PID'],
    'BID'       =>  $row['BID']
  );
}
 return json_encode($event_data);
}
$file_name = 'JSON/betreuer_events.json';
file_put_contents($file_name, get_data());
//header("Location: ../index_Login.php?JSONdateierstellt");
  //  mysqli_close($conn);
//}
 ?>
