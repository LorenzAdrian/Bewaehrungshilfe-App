<?php
#Seite für die Nachrichten des Probanden

include '../database/dbh.inc.php';
if(!isset($_SESSION))
{
      session_start();
}

// Check user login or not
if(!isset($_SESSION['userId'])){
    header('Location: login.php');
}

// logout
if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: Login.php');
}

if($_SESSION['rolle'] == 'proband') {
	$personenID = 'PID';
}
else {
	$personenID = 'BID';
}

$event_sql =
"SELECT N.NID, N.Zeitstempel, N.Text, N.Status, N.BSender, B.Vorname AS vorname_betreuer, B.Nachname AS nachname_betreuer FROM nachricht AS N INNER JOIN betreuer AS B ON N.BID = B.BID WHERE N.PID = ".$_SESSION['userId']." ORDER BY Zeitstempel";

//Mit mysqli_query wird die SQL-Abfrage ausgeführt. Die Methode liefert ein Objekt der Klasse mysqli_result zurück. $result enthält die Referenz auf dieses Objekt.
$result = mysqli_query($conn, $event_sql);

$sql = "UPDATE nachricht SET Status='gelesen'
WHERE PID = ".$_SESSION['userId']." AND BSender=1";

if ($conn->query($sql) != TRUE) {
    echo "Es ist ein Fehler aufgetreten: ".$conn->error;
}

/*
#Alle Nachrichten des Gesprächspartners auf "gelesen" setzen.
if ($_SESSION['rolle'] == 'proband'){
	$sql = "UPDATE nachricht SET Status='gelesen'
	WHERE ".$personenID."=".$_SESSION['userId']."
	AND BSender= 1";
}
else if($_SESSION['rolle'] == 'betreuer'){
	$sql = "UPDATE nachricht SET Status='gelesen'
	WHERE ".$personenID."=".$_SESSION['userId']."
	AND BSender= 0";
}
if ($conn->query($sql) != TRUE) {
    echo "Es ist ein Fehler aufgetreten: ".$conn->error;
}
*/

 ?>

<!DOCTYPE html>
<html>
	<head>
		<!--- Pfad zur style.css--------------------------->
		<link rel="stylesheet" href="../CSS/style.css">
		<!--Schriftart aus google fonts------------------>
		<link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
		<!-- Stylesheet für Icons-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="../javascript/jquery-3.4.1.js"></script>
		<script src="../javascript/message.js"></script>
		<title>Meine Nachrichten</title>

    <style>
    .meinenachrichten {
      font-family: 'Assistant', sans-serif;
    }
    .nachrichten {
      width: 40%;
    }
    .nachricht {
      margin-top: 1em;
      margin-bottom: 1em;
      width: 80%;
      padding: 0.5em;
      border-radius: 1em;
    }
    .proband {
      margin-left: 3em;
    }
    .betreuer.nachricht.neu {
      background-color: darkred;
      color: ivory;
    }
    .betreuer.nachricht {
      background-color: darkblue;
      color: ivory;
    }
    .proband.nachricht{
      background-color: darkgrey;
    }
    .betreuername {
      font-weight: bold;
    }
    .datumuhrzeit {
      font-size: 0.8em;
      text-align: right;
    }
    .datumuhrzeit.betreuer {
      color: silver;
    }
    .datumuhrzeit.proband {
      color: dimgray;
    }
    .nachrichtenfeld {
      border-width: thin;
      border-style: solid;
      border-color: darkgrey;
      border-radius: 1em;
      padding: 0.5em;
      width: 80%;
      font-family: 'Assistant', sans-serif;
    }
    </style>

	</head>
	<body>
    <?php include '../includes/header.html'; ?>

		<main class="meinenachrichten">
      <div>
				<table class="nachrichten">
					<tr>
            <td>
              <?php
              while ($dsatz = mysqli_fetch_assoc($result))
              {
                //Erzeugt aus der Zeichenkette des Zeitstempels ein DateTime-Objekt
                $datum = date_create($dsatz['Zeitstempel']);
                //Wenn der Betreuer der Sender der Nachricht und die Nachricht neu ist.
                if($dsatz['BSender'] == 1 && $dsatz['Status'] == 'neu')
                  {
                  echo '<table class="betreuer nachricht neu"><tr class="betreuername"><td>'.$dsatz['vorname_betreuer'].' '.$dsatz['nachname_betreuer'].'</td></tr><tr class="nachricht"><td>'
                      .$dsatz['Text'].'</td></tr><tr class="datumuhrzeit betreuer"><td>'
                      .date_format($datum,'D').' '.date_format($datum,'j.m.y').', '.date_format($datum,'H:i').'</td></tr></table>';
                  }
                //Wenn der Betreuer der Sender der schon gelesenen Nachricht ist.
                elseif($dsatz['BSender'] == 1)
                  {
                    echo '<table class="betreuer nachricht"><tr class="betreuername"><td>'.$dsatz['vorname_betreuer'].' '.$dsatz['nachname_betreuer'].'</td></tr><tr class="nachricht"><td>'
                        .$dsatz['Text'].'</td></tr><tr class="datumuhrzeit betreuer"><td>'
                        .date_format($datum,'D').' '.date_format($datum,'j.m.y').', '.date_format($datum,'H:i').'</td></tr></table>';
                  }
                //Wenn die Nachricht vom Probanden stammt.
                else
                  {
                    echo '<table class="proband nachricht"><tr class="nachricht"><td>'.$dsatz['Text'].'</td></tr><tr class="datumuhrzeit proband"><td>'
                    .date_format($datum,'D').' '.date_format($datum,'j.m.y').', '.date_format($datum,'H:i').'</td></tr></table>';
                  }
              };
               ?>
             </td>
					</tr>
          <tr>
            <td>
              <table class="">
                <tr>
                  <td>
                    <form  id="msgform" method="POST">
						<span>Nachrichten</span>
						<br>
						<textarea name="textarea1" rows="5" cols="50" value=""></textarea>
						<br>
						<button type="submit" name="signup-submit">Abschicken</button>
						<br><br><br><br><br><br>
				    </form>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
				</table>
			</div>
		</main>

    <!-- Footer: Hier stimmt die Höhe noch nicht. Footer wird mitten im Main-Bereich angezeigt.
    <?php include '../includes/footer.inc.php' ?>
    -->

	</body>
</html>



