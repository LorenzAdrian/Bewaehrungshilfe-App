<?php
//if(isset($_POST['refresh-event'])) {
//require 'dbh.inc.php';

// Die Events der Fullcalender werden als JSON feed ausgegeben.


if(!isset($_SESSION))
{
      session_start();
}

//function get_data()
//{

  $conn = mysqli_connect('localhost','root','','bewaehrungshilfe');
  $event_sql = "SELECT * FROM termin WHERE BID = ".$_SESSION['userId'];
  $result = mysqli_query($conn, $event_sql);
  $event_data = array();
  while ($row = mysqli_fetch_array($result))
{
  if ($row['Status'] == 'b' || $row['Status'] == '1'){ //'b' muss noch weg
	  $row['Status'] = '#90EE90';
  }
  if ($row['Status'] == 'o' || $row['Status'] == '2'){ //'o' muss noch weg
	  $row['Status'] = '#d3d3d3';
  }
  if ($row['Status'] == '3'){
	  $row['Status'] = '#FFCCCB';
  }
  $event_data [] = array(
    'id'        => $row['TID'],
    'start'     => $row['Beginn'],
    'end'       => $row['Ende'],
    'title'     => $row['Titel'],
    'color'    => $row['Status'],
    'PID'       =>  $row['PID'],
    'BID'       =>  $row['BID'],
    'description' => $row['Beschreibung']
  );
}

echo json_encode($event_data);
// return json_encode($event_data);
//}
//$file_name = 'JSON/betreuer_events.json';
//file_put_contents($file_name, get_data());
//header("Location: ../index_Login.php?JSONdateierstellt");
  //  mysqli_close($conn);
//}
 ?>
