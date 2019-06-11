




  <?php
if (isset($_POST['addprob-submit'])) {

require 'dbh.inc.prob.php';
  $probVorname = $_POST['vorname'];
  $probNachname = $_POST['nachname'];
  $probGeburtsdatum= $_POST['geburtsdatum'];


  // SQL-Befehle um Daten in einer Tabelle hinzufügen ausführen und uberprüfen
      $sql = "INSERT INTO prob (Vorname, Nachname, Geburtsdatum)
        VALUES  ('$probVorname', '$probNachname', '$probGeburtsdatum')
        ";

      $conn->exec($sql);
      echo "Neuer Eintrag wurde erfolgreich erstellt";

    }



  $conn = null;

  /*require 'dbh.inc.prob.php';

    $probVorname = $_POST['vorname'];
    $probNachname = $_POST['nachname'];
    $probGeburtsdatum= $_POST['geburtsdatum'];

        $sql = "INSERT INTO prob (ID, Vorname, Nachname, Geburtsdatum)
          VALUES  ($probVorname, $probNachname, $probGeburtsdatum)
          ";

        $conn_PDO->exec($sql);
        echo "Neuer Eintrag wurde erfolgreich erstellt";
      }*/
   ?>
   <form class="" action="../index_Login.php" method="post">
     <button type="submit" name="button">Zurueck</button>
   </form>
