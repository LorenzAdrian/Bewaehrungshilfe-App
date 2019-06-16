<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Termin löschen</title>
    <script>
      function warnung(){
        return confirm('Wollen Sie den Termin wirklich löschen?');
      }
    </script>

  </head>

  <body>

    <form action="terminetest_delete.php" method="post" onsubmit= "return warnung(this);">
      <p> ID: <input type="text" name="terId" placeholder = "Bitte ID Nummer eingeben"></p>
      <p>
      <input type="submit" value="Termin löschen">
    </form>

    <a href="Startseite.php">Startseite</a>

  </body>

</html>
