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
      <p> Status: <input name = "terStatus" type = "text" size="50" placeholder = "Status"  </p>
      <p> PID: <input name = "terPID" type = "text"  size ="3" placeholder="Probanden ID"</p>
      <p> BID: <input name = "terBID" type = "text" size = "3" placeholder = "Betreuer ID" </p>
      <p>
      <input type = "submit" value = "Termin speichern">
    </form>

  <!--  <a href="fullcalendar/fullcalendar.php">Kalendar</a>-->

  </body>

</html>
