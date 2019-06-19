<?php
require "includes/problisteDT.inc.php";
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

    <script type="text/javascript">
/*Was wir benutzen!! -> https://datatables.net/examples/ajax/custom_data_flat.html*/
      $(document).ready(function() {
      $('#example').DataTable( {
        scrollY:        "100px",
        scrollCollapse: true,
        select: {
          style: 'single'
        },
        paging:         false,
          ajax: {
              url: "includes/probliste.json",
              dataSrc: ""
          },
          keys: true,
          /* Spaltendarstellung: https://editor.datatables.net/examples/advanced/formOnlyData.html
             Nur die DataTable javascript Zeile sind hier relevant, Editor spielt keine Rolle*/
          columns: [
              { data: null, render: function ( data, type, row ) {
                // Vorname und Nachname zusammen als "Name" in der Tabelle darstellen
                return data.Vorname+' '+data.Nachname;
              } },
              { data: "BID" }
            ]
        } );
      } );

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
                    <th>Name</th>
                    <th>BID</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                  <th>Name</th>
                  <th>BID</th>
                </tr>
            </tfoot>
        </table>
  </body>
</html>
