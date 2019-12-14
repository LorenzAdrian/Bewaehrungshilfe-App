$(document).ready(function() {
  $('#admintable').DataTable({
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
    // JS Variable aus adminlisteDT.inc.php als Daten-Quelle
    data: adminliste,
    // KeyTables Erweiterung
    //keys: true,
    /* Spaltendarstellung: https://editor.datatables.net/examples/advanced/formOnlyData.html
       Nur die DataTable javascript Zeile sind hier relevant, Editor spielt keine Rolle*/
    //columnDefs: [{
    //  "className": "dt-center",
    //  "targets": [1]
    //}],
    columns: [{
      data: null,
      render: function(data, type, row) {
        // Vorname und Nachname zusammen unter der Spalte "Name" in der Tabelle darstellen
        return data.Vorname + ' ' + data.Nachname;
      }
    },
      {
        data: 'ADID'
      },
      {
        data: 'Username'
      },
      {
        data: 'Email'
      },
      {
        data: 'TelNr'
      },
      {
        data: 'Stellenzeichen'
      },
      {
        data: 'Zimmernr'
      },
      {
        data: 'Vertretung'
      },
      {
        data: 'AGID'
      },
    ]
  });

  var table = $('#admintable').DataTable();
  /* Click bzw. Double Click: https://datatables.net/examples/advanced_init/events_live.html */
  /* Jquery on Method: https://www.w3schools.com/jquery/event_on.asp */
  $('#admintable tbody').on('dblclick', 'tr', function() {
    var data = table.row(this).data();
    var bid = data['ADID'];
    var vorname = data['Vorname'];
    var nachname = data['Nachname'];
    var username = data['Username'];
    var email = data['Email'];
    var telnr = data['TelNr'];
    var stellenzeichen = data['Stellzeichen'];
    var zimmernr = data['Zimmernr'];
    var vertretung = data['Vertretung'];
    var agid = data['AGID'];

    // Alert-Ausgabe für Debugging
    //alert("bid = "+bid+ " und pid = "+pid);

    /*
    // Javascript, die wie eine Post-Formular Funktioniert
    $.redirect('probinfo.php', {
      betreuer: bid,
      proband: pid
    });
    */



    // Console-Ausgabe für Debugging
    console.log(adminliste, vorname, nachname, adid, username, email, telnr, stellenzeichen, zimmernr, vertretung, agid);

  });
});
