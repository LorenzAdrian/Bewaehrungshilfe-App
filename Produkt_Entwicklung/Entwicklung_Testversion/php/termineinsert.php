

<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Termin Anlegen</title>
  </head>

  <body>
    <form action = "terminetest_insert.php" method = "post">
      <p> Title: <input name = "terTitel" type = "text" size = "50" placeholder = "Titel" > </p>
      <p> Datum: <input name = "terDatum" type = "date" </p>
      <p> Start: <input name = "terStart" type = "time" </p>
      <p> End: <input name = "terEnde" type = "time"  </p>
      <p> Beschreibung: <input name="terBeschreibung" type="text" size="50" placeholder="Beschreibung"</P>
      <p><!-- Status: --><input name = "terStatus" type = "hidden" size="50" value="2"  </p>
      <p><!-- PID: --><input name = "terPID" type = "hidden"  size ="3" value="<?php echo $_POST['probID'] ?>"</p>
      <p><!-- BID: --><input name = "terBID" type = "hidden" size = "3" value="<?php echo $_POST['betrID'] ?>" </p>
      <p>
      <input type = "submit" value = "Termin speichern">
    </form>



  <!--  <a href="fullcalendar/fullcalendar.php">Kalendar</a>-->

  </body>

</html>
