

<!DOCTYPE html>
<html lang='en'>

  <head>
 <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <style>
    html, body {
      display: grid;
      margin: 0;
      padding: 0;
      font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
      font-size: 14px;
    }

/* Hier wird dann das div vom Kalendar angepasst*/
    #calendar {
      margin-top: 50px;
      float: right;
      box-sizing: border-box;
      min-width: 100px;
      width: 900px;
      padding-right: 20px;
      padding-left: 20px;
      padding-top: 10px;
      background: floralwhite;
      border: 2px solid blue;
      border-radius: 30px;
        box-shadow: -9px 0px 23px 5px rgba(123,164,235,0.4);
    }


  </style>
    <meta charset='utf-8' />

    <link href='../fullcalendar/packages/core/main.css' rel='stylesheet' />
    <link href='../fullcalendar/packages/daygrid/main.css' rel='stylesheet' />
    <link href='../fullcalendar/packages/timegrid/main.css' rel='stylesheet' />
    <link href='../fullcalendar/packages/list/main.css' rel='stylesheet' />
    <script src='../fullcalendar/packages/core/main.js'></script>
    <script src='../fullcalendar/packages/interaction/main.js'></script>
    <script src='../fullcalendar/packages/daygrid/main.js'></script>
    <script src='../fullcalendar/packages/timegrid/main.js'></script>
    <script src='../fullcalendar/packages/list/main.js'></script>

    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

var calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: [ 'interaction', 'dayGrid', 'timeGrid' ],
      defaultView: 'dayGridMonth',
	  <!--height: 'auto',-->
	  selectable: true,
	    header: {
        left: 'prev,next today',
        center: 'title,',
	    right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
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

		   dateClick: function(info) {
		   var clickedDate = info.dateStr;
		   calendar.changeView('timeGridDay',clickedDate);
        alert(clickedDate);

      },

	  eventClick: function(info) {
		  if (info.event.backgroundColor == "blue") {
				var tid = parseInt(info.event.id, 10);
				var status;
				if(confirm("Möchten Sie diesen Termin akzeptieren?")) {
					status = "1"; // Status wird auf bestätigt gesetzt.
				}

				else {
					status = "3"; //Status wird auf abgelehnt gesetzt.
				}
				$.ajax({
					url:'terminStatusChange.php',
					type:'post',
					data:{status:status, tid:tid},
					success:function(response){
						if (response = 1) {
							location.reload();
						}

						else {
							alert('Es ist ein Fehler aufgetreten.');
						}

						//alert(response);
					}
				});

		  }
	  },


      events: {
        url: 'Proband_events_aktualisieren.php'

        }




    });



        calendar.render();
      });




    </script>
  </head>
  <body>

    <div id='calendar'></div>


  </body>
</html>

<script src="../javascript/jquery-3.4.1.js"></script>
