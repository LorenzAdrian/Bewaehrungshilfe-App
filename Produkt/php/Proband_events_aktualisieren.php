<?php

// DIe Events der Probanden werden als JSON feed ausgegeben.


  if(!isset($_SESSION))
  {
        session_start();
  }

  // Check user login or not
  if(!isset($_SESSION['userId'])){
      header('Location: login.php');
  }

if(!isset($_SESSION['probID'])){
$probID = $_SESSION['userId'];}
else {
$probID = $_SESSION['probID'];
}


  $conn = mysqli_connect('localhost','root','','bewaehrungshilfe');
  $event_sql = "SELECT * FROM termin WHERE PID = $probID";

  $result2 = mysqli_query($conn, $event_sql);
  $event_data = array();

  while ($row = mysqli_fetch_array($result2))
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
    'color'     => $row['Status'],
    'PID'       =>  $row['PID'],
    'BID'       =>  $row['BID'],
    'description' => $row['Beschreibung']
  );

}



echo json_encode($event_data);
//$file_name = 'JSON/proband_events.json';
//file_put_contents($file_name, get_data($probID));

?>
