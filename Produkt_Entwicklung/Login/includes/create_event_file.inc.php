<?php

if(isset($_POST['refresh-event'])) {
//require 'dbh.inc.php';

function get_data()
{
  $conn = mysqli_connect('localhost','root','','loginsystemtest');
  $event_sql = "SELECT * FROM tbl_events";
  $result = mysqli_query($conn, $event_sql);
  $event_data = array();

  while ($row = mysqli_fetch_array($result))
{

  $event_data [] = array(

    'id'        => $row['id'],
    'start'     => $row['start'],
    'end'       => $row['end'],
    'title'     => $row['title'],
    'color'     => $row['color']
  );

}

 return json_encode($event_data);
}

$file_name = 'test_events.json';
file_put_contents($file_name, get_data());
header("Location: ../index_Login.php?JSONdateierstellt");


    mysqli_close($conn);

}



 ?>
