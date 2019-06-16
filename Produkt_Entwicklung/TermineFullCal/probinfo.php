<?php

require "includes/tabelle.inc.php";

$probID = $_POST['proband'];

$sql = "SELECT * FROM prob WHERE probID = ".$probID;
$result = mysqli_query($conn, $sql);
$probInfo = array();
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)){
    $probInfo[] = $row;
  }
}

// Info des ausgewählten Probandes
foreach ($probInfo as $info) {
  echo "Nachname: ".$info['nachname']."<br>";
  echo "Vorname: ".$info['vorname']."<br>";
  echo "Geburtsdatum: ".$info['geburtsdatum']."<br>";
}

// "unordered list" von Hypertext-Links, um von Seite zur Seite zu navigieren
echo "<ul>";
echo "<li><a href=\"probanlegen.html\">Probanden anlegen </a></li>";
echo "<li><a href=\"probliste.php\">Probandenliste </a></li>";
echo "<li><a href=\"index.html\">Index </a></li>";
echo "</ul>";

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

    <link href='fullcalendar/packages/core/main.css' rel='stylesheet' />
    <link href='fullcalendar/packages/daygrid/main.css' rel='stylesheet' />
    <link href='fullcalendar/packages/timegrid/main.css' rel='stylesheet' />
    <link href='fullcalendar/packages/list/main.css' rel='stylesheet' />

    <script src='fullcalendar/packages/core/main.js'></script>
    <script src='fullcalendar/packages/daygrid/main.js'></script>
    <script src='fullcalendar/packages/interaction/main.js'></script>
    <script src='fullcalendar/packages/timegrid/main.js'></script>
    <script src='fullcalendar/packages/list/main.js'></script>

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
              url: 'fullcalendar/testEvents.json'

            }

        });

        calendar.render();
      });

      </script>

    </head>
    <body>
      <table>
        <tr>
          <td>
            <form action="terminetestinsert.html" method="post">
              <input type="submit"  value="Termin anlegen">
            </form>
          </td>
          <td>
            <form action="terminetestdelete.html" method="post">
              <input type="submit"  value="Termin löschen">
            </form>
          </td>
        </tr>
      </table>

      <div id='calendar'></div>

    </body>
  </html>
