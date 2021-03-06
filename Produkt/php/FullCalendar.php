
<?php
// Hier befindet sich der Fullcalendar der Betreuer.

 ?>
<!DOCTYPE html>
<html lang='en'>

  <head>
    <script src='https://unpkg.com/popper.js/dist/umd/popper.min.js'></script>
    <script src='https://unpkg.com/tooltip.js/dist/umd/tooltip.min.js'></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../CSS/style_tooltip.css">
    <style>
    html, body {
      display: grid;
      margin: 0;
      padding: 0;
    }

/* Hier wird dann das div vom Kalendar angepasst*/
    #mycalendar {
	  font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
      font-size: 14px;
      margin-top: 35px;
      float: right;
      box-sizing: border-box;
      height: auto;
      width: 5 rem;
      padding-right: 20px;
      padding-left: 20px;
      padding-top: 10px;
	    padding-bottom: 10px;
      background: white;
      border: 2px solid black;
      border-radius: 30px;
    }

	@media screen and (max-width: 600px) {

    #calendar {
	  font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
      font-size: 8px;
      float: right;
      box-sizing: border-box;
      height: auto;
      background: white;
      border: 2px solid black;
      border-radius: 30px;
	}

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
    <script src='../fullcalendar/packages/core/locales/de.js'></script>


    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('mycalendar');

var mycalendar = new FullCalendar.Calendar(calendarEl, {
      plugins: [ 'interaction', 'dayGrid', 'timeGrid' ],
      locale:'de',
      defaultView: 'dayGridMonth',
	  <!--height: 'auto',-->
	  selectable: true,
	    header: {
        left: 'prev,next today',
        center: 'title,',
	    right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      eventRender: function(info) {
        var tooltip = new Tooltip(info.el, {
          title: info.event.extendedProps.description,
          placement: 'top',
          trigger: 'hover',
          container: 'body'
        });
      },
	        customButtons: {
        addEventButton: {
          text: 'add event...',
          click: function() {
            var dateStr = prompt('Enter a date in YYYY-MM-DD format');
            var date = new Date(dateStr + 'T00:00:00'); // will be in local time
			var testTitle = prompt('please Enter a Title');

            if (!isNaN(date.valueOf())) { // valid?
              mycalendar.addEvent({
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
		   mycalendar.changeView('timeGridDay',clickedDate);
        //alert(clickedDate);

      },



	  eventClick: function(info) {
		var tid = parseInt(info.event.id, 10);
		if(confirm("Möchten Sie diesen Termin löschen?")) {
			$.ajax({
				url:'termineLoeschen.php',
				type:'post',
				data:{tid:tid},
				success:function(response){
					if (response = 1) {
						location.reload();
					}

					else
					{
						alert('Es ist ein Fehler aufgetreten.');
					}
				}
			});
		}
	  },


      events: {
        url: 'events_aktualisieren.inc.php'

        }




    });



        mycalendar.render();
      });




    </script>
  </head>
  <body>

    <div id='mycalendar'></div>


  </body>
</html>
