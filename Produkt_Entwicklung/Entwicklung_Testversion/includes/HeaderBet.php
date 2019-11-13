<?php 
if (!isset($_SESSION['userId'])) {
	header('Location:login.php');
}

if (isset($_POST['but_logout'])) {
	session_destroy();
	header('Location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <div id="headerWrapper"> <link rel="stylesheet" href="../CSS/headerBet.css" >
  </div>
</head>

<header>
  <div class="menubar">
    <div class="logo">
	
    <img src="../CSS/image/baericon.jpeg" alt="logo" class="berlin_logo">
    
	</div>
    <link rel="shortcut icon" type="image/x-icon" href="../CSS/image/baericon.png">
    <ul class="menu">
        <li>
				<div class="SoDi">SoDi</div>
		</li>

        <li>
            <form method='post' action="">
                <input type="submit" value="Abmelden" class="button_logout" name="but_logout">
            </form>
        </li>
		
    </ul>

  </div>
 <hr>
</header>
</html>