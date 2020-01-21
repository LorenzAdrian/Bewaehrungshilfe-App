$(document).ready(function () {

    //Sidebar
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
		$( "#sidebarCollapse").hide();
	});

    //Betreuer-Liste anzeigen
    $( "#betlisteBtn" ).click(function() {
        $( "#betliste" ).show();
        var table = $('#bettable').DataTable();
          $('#container table-container').css( 'display', 'block' );
          table.columns.adjust().draw();
		$( "#sidebarCollapse" ).toggle();
        $( "#adminliste").hide();
		$('#sidebar').toggleClass('active');
    });

    //Admin-Liste anzeigen
    $( "#adminlisteBtn" ).click(function() {
        $( "#adminliste" ).show();
        var table = $('#admintable').DataTable();
          $('#container table-container').css( 'display', 'block' );
          table.columns.adjust().draw();
		$( "#sidebarCollapse" ).toggle();
        $( "#betliste").hide();
	    $('#sidebar').toggleClass('active');
    });

});
