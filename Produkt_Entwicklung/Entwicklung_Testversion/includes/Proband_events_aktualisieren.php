<?php

//if(isset($_POST['refresh-event'])) {
//require 'dbh.inc.php';

// Die Termine vom Probanden werden ausgegeben!!
// ALTE VERSION!!!!

function get_data()
{
  $conn = mysqli_connect('localhost','root','','bewaehrungshilfe');
  $event_sql = "SELECT * FROM termin WHERE PID = ?";
  $result = mysqli_query($conn, $event_sql);
  $event_data = array();

  while ($row = mysqli_fetch_array($result))
{

  $event_data [] = array(

    'id'        => $row['TID'],
    'start'     => $row['Beginn'],
    'end'       => $row['Ende'],
    'title'     => $row['Titel'],
    'status'     => $row['Status'],
    'PID'       =>  $row['PID'],
    'BID'       =>  $row['BID']
  );

}

 return json_encode($event_data);
}

$file_name = 'JSON/test_events.json';
file_put_contents($file_name, get_data());
//header("Location: ../index_Login.php?JSONdateierstellt");


  //  mysqli_close($conn);

//}



 ?>
