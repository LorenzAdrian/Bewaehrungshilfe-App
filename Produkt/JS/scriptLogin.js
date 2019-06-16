$(document).ready(function(){
	
	//Funktion für Login Button
    $("#login_btn").click(function(){
		var rolle;
		if ($("#betreuer").is(":checked")) {
			rolle = "betreuer";
		}
		else {
			rolle = "proband";
		}
        var mailuid = $("#mailuid").val().trim();
        var passwort = $("#passwort").val().trim();
		
        if( mailuid != "" && passwort != "" ){
            $.ajax({
                url:'checkUser.php',
                type:'post',
                data:{mailuid:mailuid,passwort:passwort,rolle:rolle},
                success:function(response){
                    var msg = "";
                    if(response == 1){
						if (rolle == 'betreuer'){
							window.location = "../index_betreuer.php"; //Link zur Startseite muss hier rein!
						}
						else if (rolle == 'proband'){
							window.location = "../index_proband.php"; //Link zur Startseite muss hier rein!
						}
                    }else{
                        msg = "Die Kombination aus Username/Email und Passwort ist ungültig!";
						$("#passwort").val("");
                    }
                    $("#message").html(msg);
                }
            });
        }
		else{
            var msg = "Fehlende Eingaben!";
			$("#message").html(msg); 
			$("#passwort").val("");
		}           
    });
});	
	










