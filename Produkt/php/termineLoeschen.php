<?php
include 'dbh.inc.php';

$tid = $_POST['tid'];


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
	echo 0;
}


$sql = "DELETE FROM termin WHERE TID=" .$tid;

if (mysqli_query($conn, $sql)) {
    echo 1;
	//echo $status + $tid;
} 
else {
    echo 0;
}

?>