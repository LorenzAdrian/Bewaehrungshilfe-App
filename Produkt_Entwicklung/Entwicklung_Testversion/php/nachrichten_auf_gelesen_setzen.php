<?php
    $sql = "UPDATE nachricht SET Status='gelesen'
    WHERE PID = ".$_SESSION['userId']." AND BSender=1";

    if ($conn->query($sql) != TRUE) {
        echo "Es ist ein Fehler aufgetreten: ".$conn->error;
    }
    ?>
