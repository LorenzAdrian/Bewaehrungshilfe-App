$(document).ready(function(){

	//Funktionen für  die Nachrichten Sidebar des Betreuers
    $("#msgbar").click(function(){
		//var probID= $('#terPID').val();
		$.ajax({
		url:'meineNachrichtenAnzeigen.php',
		//type:'post',
		//data:{probID:probID},
		success:function(response){
			$("#msgdiv").html(response);
		}
		});
	document.getElementById("mySidenav").style.width = "25%";
	document.getElementById("main").style.marginLeft = "25%";
	});

  //Nachrichten werden alle 10 Sekunden von der DB abgerufen
  var $container =$("#msgdiv");
  $container.load('meineNachrichtenAnzeigen.php');
  var refreshID = setInterval (function ()
  {
    $container.load('meineNachrichtenAnzeigen.php');
  }, 10000);

});

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
