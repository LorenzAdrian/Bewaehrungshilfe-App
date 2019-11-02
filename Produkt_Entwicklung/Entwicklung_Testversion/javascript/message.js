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
			location.reload();
		}
		});
		return false;
	});
});