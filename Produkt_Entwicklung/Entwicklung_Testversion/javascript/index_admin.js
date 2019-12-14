$(document).ready(function () {

    //Sidebar
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });

    //Betreuer-Liste anzeigen
    $( "#betlisteBtn" ).click(function() {
        $( "#betliste" ).toggle();
        $( "#adminliste").hide();
    });

    //Admin-Liste anzeigen
    $( "#adminlisteBtn" ).click(function() {
        $( "#adminliste" ).toggle();
        $( "#betliste").hide();
    });

});
