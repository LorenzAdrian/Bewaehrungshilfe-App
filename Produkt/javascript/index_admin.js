$(document).ready(function () {

    //Sidebar
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
		$( "#sidebarCollapse").hide();
	});

    //Betreuer-Liste anzeigen
    $( "#betlisteBtn" ).click(function() {
        $( "#betliste" ).show();
		$( "#sidebarCollapse" ).toggle();
        $( "#adminliste").hide();
		$('#sidebar').toggleClass('active');
    });

    //Admin-Liste anzeigen
    $( "#adminlisteBtn" ).click(function() {
        $( "#adminliste" ).show();
		$( "#sidebarCollapse" ).toggle();
        $( "#betliste").hide();
	    $('#sidebar').toggleClass('active');
    });

});
