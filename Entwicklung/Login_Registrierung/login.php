<?php
require "header_Betreuer.php";
 ?>



<main>

<?php
//Check, ob der Session eine ID (BID bzw. PID) zugewiesen ist.
if (isset($_SESSION['userId'])) {
	echo  '<p>You are logged in!</p>';
}
else {
	echo  '<p>You are logged out!</p>';
}

?>


</main>


<?php
require 'footer.php';
?>


