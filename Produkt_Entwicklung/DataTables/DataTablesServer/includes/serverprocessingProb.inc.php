<?php

// Session-Info
session_start();
$_SESSION['BID'] = "2";


// Verbindung mit der DB herstellen
$sql_details = array(
    'host' => 'localhost',
    'user' => 'root',
    'pass' => '',
    'db'   => 'appTestdb'
);

// gewünschte DB Tabelle
$table = 'proband';

// Primäreschlussel der Tabelle
$primaryKey = 'PID';

$columns = array(
    array( 'db' => 'Vorname',       'dt' => 0 ),
    array( 'db' => 'Nachname',      'dt' => 1 ),
    array( 'db' => 'BID',           'dt' => 2 )
);

require('ssp.class.inc.php');

/*
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);
//*/

$where = 'BID = '. $_SESSION['BID'];

///*
echo json_encode(SSP::complex( $_GET, $sql_details, $table, $primaryKey, $columns, null, $where)
);
//*/
 ?>
