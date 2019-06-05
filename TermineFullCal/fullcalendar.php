<?php

  require "../includes/tabelle.inc.php";

// Alle Werte aus der DB holen und sie in einer Reihung/Array speichern
  $sql = "SELECT * FROM tbltermine";
  $result = mysqli_query($conn, $sql);
  $events = array();
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)){
      $events[] = $row;
    }
  }

  /*
   // Wenn du die Array mal sehen willst
  print_r($events);

   // Wenn du die JSON-Datei mal sehen willst
  echo json_encode($events, JSON_PRETTY_PRINT);
  */

// Array in einer JSON-Datei umwandeln und speichern
  $eventsjson = json_encode($events, JSON_PRETTY_PRINT);
  $file = 'testEvents.json';
  file_put_contents($file, $eventsjson);

 ?>
<html lang='en' dir='ltr'>
<!-- FULLCALENDAR -->
  <head>

    <meta charset='utf-8' />
    <style>
    html, body {
      margin: 0;
      padding: 0;
      font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
      font-size: 14px;
    }

    #calendar {
      max-width: 900px;
      margin: 40px auto;
    }
  </style>

    <link href='packages/core/main.css' rel='stylesheet' />
    <link href='packages/daygrid/main.css' rel='stylesheet' />
    <link href='packages/timegrid/main.css' rel='stylesheet' />
    <link href='packages/list/main.css' rel='stylesheet' />

    <script src='packages/core/main.js'></script>
    <script src='packages/daygrid/main.js'></script>
    <script src='packages/interaction/main.js'></script>
    <script src='packages/timegrid/main.js'></script>
    <script src='packages/list/main.js'></script>

    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
          plugins: [ 'dayGrid', 'interaction', 'timeGrid' ],
          defaultView: 'dayGridMonth',
          height: 'auto',
          selectable: true,
    	    header: {
            left: 'prev,next today',
            center: 'title,addEventButton',
      	    right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            /*
            customButtons: {
              addEventButton: {
                text: 'add event...',
                click: function() {
                  var dateStr = prompt('Enter a date in YYYY-MM-DD format');
                  var date = new Date(dateStr + 'T00:00:00'); // will be in local time
      			      var testTitle = prompt('please Enter a Title');

                  if (!isNaN(date.valueOf())) { // valid?
                    calendar.addEvent({
                      title: testTitle,
                      start: date,
                      allDay: true
                    });
                    alert('Great. Now, update your database...');
                  } else {
                    alert('Invalid date.');
                  }
                }}},
                */
      		    dateClick: function(info) {
                var clickedDate = info.dateStr;
        		    calendar.changeView('timeGridDay',clickedDate);
                /*alert(clickedDate);*/
              },
              // Alert, um Termin-ID-Nummer zu erfahren
              eventClick: function(info){
                alert('ID: ' + info.event.id);
              },
            // Erzeugte JSON-Datei in FullCalendar einlesen
            events: {
              url: 'testEvents.json'

              }
        });

        calendar.render();
      });

    </script>

  </head>
  <body>
    <table>
      <!-- HTML-Tabelle, um die Buttons in eine Reihe darzustellen.
        Man hätte auch einfach Hyperlinks benutzen können, weil nichts übertragen wird.
        Buttons sehen aber schöner aus, meiner Meinung nach :-) -->
      <tr>
        <td>
          <form action="../terminetestinsert.html" method="post">
            <input type="submit"  value="Termin anlegen">
          </form>
        </td>
        <td>
          <form action="../terminetestdelete.html" method="post">
            <input type="submit"  value="Termin löschen">
          </form>
        </td>
        <td>
          <a href="../index.html">Index</a>
        </td>
      </tr>
    </table>

    <div id='calendar'></div>

  </body>
</html>
