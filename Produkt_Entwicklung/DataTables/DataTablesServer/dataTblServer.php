<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <!-- Select Extension (TODO: Macht auch gerade recht wenig. Zeile wird bloss visuell hervorgehoben) -->
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>

    <!-- KeyTable Extension (TODO: Funktioniert nicht. Ich weiß nicht warum.)-->
    <link rel="stylesheet" href="https://cdn.datatables.net/keytable/2.5.0/css/keyTable.dataTables.min.css">
    <script type="https://cdn.datatables.net/keytable/2.5.0/js/dataTables.keyTable.min.js"></script>

    <script type="text/javascript">
      $(document).ready(function() {
        var table = $('#example').DataTable( {
          processing: true,
          serverSide: true,
          ajax: "includes/serverprocessingProb.inc.php",
          scrollY:        "100px",
          scrollCollapse: true,
          paging:         false,
          select:         true,
          keys:           true
        } );
      } );
      /*TODO: Vorname und Nachname werden bei Doppelklick nicht erfasst.*/
      $(document).ready(function() {
         var table = $('#example').DataTable();
      /* Click bzw. Double Click: https://datatables.net/examples/advanced_init/events_live.html */
      /* Jquery on Method: https://www.w3schools.com/jquery/event_on.asp */
         $('#example tbody').on('dblclick', 'tr', function () {
              var data = table.row( this ).data();
              alert( 'Sie haben '+data['Vorname']+' '+data['Nachname']+'s Zeile ausgewählt');
          } );
      } );
    </script>
  </head>
  <body>
    <table id="example" class="display" style="width:100%">
      <thead>
        <tr>
          <th>Vorname</th>
          <th>Nachname</th>
          <th>BID</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>Vorname</th>
          <th>Nachname</th>
          <th>BID</th>
        </tr>
      </tfoot>
    </table>
  </body>
</html>
