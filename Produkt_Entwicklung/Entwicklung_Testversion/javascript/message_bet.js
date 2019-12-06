$(document).ready(function(){

	//Funktion für das abschicken einer neuen Nachricht.
	$("#msgform").submit(function(){
		var textarea1 = $("textarea[name=textarea1]").val();
		if($("input[name=hiddenProbID]").lenght){
		}
		else{
			var hiddenProbID  =  $("input[name=hiddenProbID]").val();
		}
		$.ajax({
		url:'nachricht_hochladen.php',
		type:'post',
		data:{textarea1:textarea1, hiddenProbID:hiddenProbID},
		success:function(){
			var $container =$("#msgdiv");
		  var probID= $('#terPID').val();
		  $container.load('meineNachrichtenAnzeigen.php', {probID:probID});
			//location.reload();
		}

		});
		$('#textfeld').val('');
		return false;
	});

/*Das wird in sidebar.js gemacht.
//Nachrichten werden vom Server alle 10 Sekunden abgerufen
	var $container =$("#msgdiv");
	$container.load('meineNachrichtenAnzeigen.php', {probID:probID});
	var refreshID = setInterval (function ()
	{
		$container.load('meineNachrichtenAnzeigen.php', {probID:probID});
	}, 10000);*/

});
