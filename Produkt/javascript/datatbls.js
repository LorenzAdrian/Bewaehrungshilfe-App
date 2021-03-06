$(document).ready(function () {
  $('#example').DataTable({
    bInfo: false,
    scrollY: '52vh',
    scrollCollapse: false,
    select: true,
    language: {
      search: "Suchen:"
    },
    // Select Erweiterung
    //select: {
    //  style: 'single'
    //},
    paging: false,
    // JS Variable aus problisteDT.inc.php als Daten-Quelle
    data: probliste,
    // KeyTables Erweiterung
    //keys: true,
    /* Spaltendarstellung: https://editor.datatables.net/examples/advanced/formOnlyData.html
       Nur die DataTable javascript Zeile sind hier relevant, Editor spielt keine Rolle*/
    columnDefs: [{
      "className": "dt-center",
      "targets": [1]
    }],
    columns: [{
        data: null,
        render: function (data, type, row) {
          // Vorname und Nachname zusammen unter der Spalte "Name" in der Tabelle darstellen
          return data.Vorname + ' ' + data.Nachname;
        }
      },
      {
        data: 'ungeleseneNachrichten'
      },
    ]
  });

  var table = $('#example').DataTable();
  /* Click bzw. Double Click: https://datatables.net/examples/advanced_init/events_live.html */
  /* Jquery on Method: https://www.w3schools.com/jquery/event_on.asp */
  $('#example tbody').on('dblclick', 'tr', function () {
    var data = table.row(this).data();
    var pid = data['PID'];
    var vorname = data['Vorname'];
    var nachname = data['Nachname'];
    var username = data['Username'];
    var email = data['Email'];
    var telnr = data['TelNr'];
    var akte = data['Aktenzeichen'];
    var betanfang = data['Betreuungsanfang'];
    var betende = data['Betreuungsende'];
    var bid = data['BID'];
    // Alert-Ausgabe für Debugging
    //alert("bid = "+bid+ " und pid = "+pid);

    // Javascript, die wie eine Post-Formular Funktioniert
    $.redirect('probinfo.php', {
      betreuer: bid,
      proband: pid,
      pid: pid,
      vorname: vorname,
      nachname: nachname,
      username: username,
      mail: email,
      telnr: telnr,
      akte: akte,
      betanfang: betanfang,
      betende: betende,
      bid: bid
    });







    // Console-Ausgabe für Debugging
    //console.log(probliste, vorname, nachname, pid, bid);

  });
});
