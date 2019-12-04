$(document).ready(function(){

	//Funktionen für  die Nachrichten Sidebar des Betreuers
    $("#msgbar").click(function(){
		var probID= $('#terPID').val();
		$.ajax({
		url:'Nachrichten_menu.php',
		type:'post',
		data:{probID:probID},
		success:function(response){
			$("#msgdiv").html(response);
		}
		});
	document.getElementById("mySidenav").style.width = "25%";
	document.getElementById("main").style.marginLeft = "25%";
	});

  //Nachrichten werden alle 10 Sekunden von der DB abgerufen
  var $container =$("#msgdiv");
  $container.load('Nachrichten_menu.php');
  var refreshID = setInterval (function ()
  {
    $container.load('Nachrichten_menu.php');
  }, 10000);

});

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
