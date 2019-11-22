<?php
require "problisteDT.inc.php";
?>
<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  	 <!-- Bootstrap CSS -->
	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
	  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	
	  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

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
  <table id="example" class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">PID</th>
      <th scope="col">Ungelesene Nachrichten</th>
    </tr>
  </thead>
</table>

  </body>
</html>

