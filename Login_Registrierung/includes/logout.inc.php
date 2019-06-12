<?php

//Session wird beendet.
session_start();
session_unset();
session_destroy();

header("Location: ../index_Login.php");
