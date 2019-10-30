<?php
require "problisteDT.inc.php";
?>
<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <!-- KeyTable Extension TODO: Funktioniert nicht. Ich weiss nicht warum -->
    <link rel="stylesheet" href="https://cdn.datatables.net/keytable/2.5.0/css/keyTable.dataTables.min.css">
    <script type="https://cdn.datatables.net/keytable/2.5.0/js/dataTables.keyTable.min.js"></script>

    <!-- Select Extension TODO: Macht auch gerade recht wenig. Zeile wird bloss visuell hervorgehoben -->
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>

    <!-- Javascript, um DataTable zu erstellen-->
    <script type="text/javascript" src="../javascript/datatbls.js"></script>
    <!-- Javascript, um Daten wie bei einer Post-Methode weiterzugeben -->
    <script type="text/javascript" src="../javascript/jquery.redirect.js"></script>

  </head>
  <body>
    <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                  <th>Name</th>
                  <th>PID</th>
                  <th>Ungelesene Nachrichten</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                <th></th>
                </tr>
            </tfoot>
        </table>
  </body>
</html>
