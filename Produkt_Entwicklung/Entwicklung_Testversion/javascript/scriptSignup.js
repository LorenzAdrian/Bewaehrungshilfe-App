//Script zum registrieren von neuen Nutzern (Betreuer und Probanden). 
//Fehlerhaft befüllte Felder werden leider nicht immer richtig angezeigt.

$(document).ready(function(){
	
//Funktion für Betreuer registrieren (Nach Klick auf den Button)
	$("#signup_betreuer_btn").click(function(e) {
		
		//Variablen
		var username = $("#uid").val().trim();
        var mail = $("#mail").val().trim();
		var pwd = $("#pwd").val().trim();
        var pwdrepeat = $("#pwd-repeat").val().trim();
		
		var vorname = $("#vorname").val().trim();
        var nachname = $("#nachname").val().trim();
		var telnr = $("#telnr").val().trim();
        var zimmernr = $("#zimmernr").val().trim();
		var sz = $("#sz").val().trim();
		var vertretung = $("#vertretung").val().trim();
		var ag = $("#ag").val().trim();
		
		var rolle = $("#rolle").val();
		
		$("#uid_err").html("");
		$("#mail_err").html("");
		$("#pwd-repeat_err").html("");
		$("#sz_err").html("");
		$("#general_err").html("");
		
		
		//Prüfen, ob die Felder befüllt sind und gibt Daten an checkSignup.php weiter.
		if(username !="" && mail !="" && pwd !="" && pwdrepeat !="" && vorname !="" && nachname !="" 
				&& telnr !="" && zimmernr !="" && sz !="" && ag !="") {		//Vertretung nicht dabei, da NULL Feld			
			$.ajax({
                url:'checkSignup.php',
                type:'post',
                data:{username:username, mail:mail, pwd:pwd, pwdrepeat:pwdrepeat, vorname:vorname, 
						nachname:nachname, telnr:telnr, zimmernr:zimmernr, sz:sz, 
						vertretung:vertretung, ag:ag, rolle:rolle},
                success:function(response){
					//Response abhängig von Rückgabewert von checkSignup.php
					
                    if(response == 1){
						alert("Registrierung des Betreuers erfolgreich");
						window.location = "login.php"; //Link zur Startseite muss hier rein!
                    }
					
					//Folgendes nur relevant, um fehlerhaft eingetragene Werte zu markieren.
					if(response.includes("username")) {
						$("#uid_err").html("Bitte geben Sie einen gültigen Usernamen ein!");
						
					}
					if(response.includes("usertaken")) {
						$("#uid_err").html("Der gewünschte Username ist bereits vergeben!");
						
					}
					if(response.includes("pwd")) {
						$("#pwd-repeat_err").html("Bitte geben Sie zweimal das gleiche Passwort ein!");
						
					}
					if(response.includes("e-mail")) {
						$("#mail_err").html("Bitte geben Sie eine gültige E-Mail-Adresse ein!");
						
					}
					if(response.includes("mailtaken")) {
						$("#mail_err").html("Die E-Mail-Adresse wird bereits verwendet!");
						
					}
					if(response.includes("sztaken")) {
						$("#sz_err").html("Das Stellenzeichen wird bereits verwendet!");
						
					}
					else{
                        $("#general_err").html("Bitte ergänzen Sie die fehlenden Angaben!"); 
						$("#pwd").val("");
						$("#pwd-repeat").val("");
                    }
                }
            });
		}
		else{
			$("#general_err").html("Bitte ergänzen Sie die fehlenden Angaben!"); 
			$("#pwd").val("");
			$("#pwd-repeat").val("");
		}  
	});

//Admin
	
	$("#signup_admin_btn").click(function(e) {
		
		//Variablen
		var username = $("#uid").val().trim();
        var mail = $("#mail").val().trim();
		var pwd = $("#pwd").val().trim();
        var pwdrepeat = $("#pwd-repeat").val().trim();
		
		var vorname = $("#vorname").val().trim();
        var nachname = $("#nachname").val().trim();
		var telnr = $("#telnr").val().trim();
        var zimmernr = $("#zimmernr").val().trim();
		var sz = $("#sz").val().trim();
		var vertretung = $("#vertretung").val().trim();
		var ag = $("#ag").val().trim();
		
		var rolle = $("#rolle").val();
		
		$("#uid_err").html("");
		$("#mail_err").html("");
		$("#pwd-repeat_err").html("");
		$("#sz_err").html("");
		$("#general_err").html("");
		
		
		//Prüfen, ob die Felder befüllt sind und gibt Daten an checkSignup.php weiter.
		if(username !="" && mail !="" && pwd !="" && pwdrepeat !="" && vorname !="" && nachname !="" 
				&& telnr !="" && zimmernr !="" && sz !="" && ag !="") {		//Vertretung nicht dabei, da NULL Feld			
			$.ajax({
                url:'checkSignup.php',
                type:'post',
                data:{username:username, mail:mail, pwd:pwd, pwdrepeat:pwdrepeat, vorname:vorname, 
						nachname:nachname, telnr:telnr, zimmernr:zimmernr, sz:sz, 
						vertretung:vertretung, ag:ag, rolle:rolle},
                success:function(response){
					//Response abhängig von Rückgabewert von checkSignup.php
					
                    if(response == 1){
						alert("Registrierung des Admins war erfolgreich");
						window.location = "login.php"; //Link zur Startseite muss hier rein!
                    }
					
					//Folgendes nur relevant, um fehlerhaft eingetragene Werte zu markieren.
					if(response.includes("username")) {
						$("#uid_err").html("Bitte geben Sie einen gültigen Usernamen ein!");
						
					}
					if(response.includes("usertaken")) {
						$("#uid_err").html("Der gewünschte Username ist bereits vergeben!");
						
					}
					if(response.includes("pwd")) {
						$("#pwd-repeat_err").html("Bitte geben Sie zweimal das gleiche Passwort ein!");
						
					}
					if(response.includes("e-mail")) {
						$("#mail_err").html("Bitte geben Sie eine gültige E-Mail-Adresse ein!");
						
					}
					if(response.includes("mailtaken")) {
						$("#mail_err").html("Die E-Mail-Adresse wird bereits verwendet!");
						
					}
					if(response.includes("sztaken")) {
						$("#sz_err").html("Das Stellenzeichen wird bereits verwendet!");
						
					}
					else{
                        $("#general_err").html("Bitte ergänzen Sie die fehlenden Angaben!"); 
						$("#pwd").val("");
						$("#pwd-repeat").val("");
                    }
                }
            });
		}
		else{
			$("#general_err").html("Bitte ergänzen Sie die fehlenden Angaben!"); 
			$("#pwd").val("");
			$("#pwd-repeat").val("");
		}  
	});

	//Funktion für Probanden registrieren (Nach Klick auf den Button)
	$("#signup_proband_btn").click(function(e) {
		
		//Variablen
		var username = $("#uid").val().trim();
        var mail = $("#mail").val().trim();
		var pwd = $("#pwd").val().trim();
        var pwdrepeat = $("#pwd-repeat").val().trim();
		
		var vorname = $("#vorname").val().trim();
        var nachname = $("#nachname").val().trim();
		var telnr = $("#telnr").val().trim();
		var az = $("#az").val().trim();
		var ende = $("#ende").val().trim();
		var bid = $("#bid").val().trim();
		
		var rolle = $("#rolle").val();
		
		$("#uid_err").html("");
		$("#mail_err").html("");
		$("#pwd-repeat_err").html("");
		$("#az_err").html("");
		$("#general_err").html("");
		
		
		//Prüfen, ob die Felder befüllt sind und gibt Daten an checkSignup.php weiter.
		if(username !="" && mail !="" && pwd !="" && pwdrepeat !="" && vorname !="" && nachname !="" 
				&& telnr !="" && az !="" && ende !="" && bid !="") {		//Vertretung nicht dabei, da NULL Feld			
			$.ajax({
                url:'checkSignup.php',
                type:'post',
                data:{username:username, mail:mail, pwd:pwd, pwdrepeat:pwdrepeat, vorname:vorname, 
						nachname:nachname, telnr:telnr, az:az, ende:ende, bid:bid, rolle:rolle},
                success:function(response){
					//Response abhängig von Rückgabewert von checkSignup.php
					
                    if(response == 1){
						alert("Registrierung des Betreuers erfolgreich");
						window.location = "login.php"; //Link zur Startseite muss hier rein!
                    }
					
					//Folgendes nur relevant, um fehlerhaft eingetragene Werte zu markieren.
					if(response.includes("username")) {
						$("#uid_err").html("Bitte geben Sie einen gültigen Usernamen ein!");
						$("#pwd").val("");
						$("#pwd-repeat").val("");
					}
					if(response.includes("usertaken")) {
						$("#uid_err").html("Der gewünschte Username ist bereits vergeben!");
						$("#pwd").val("");
						$("#pwd-repeat").val("");
					}
					if(response.includes("pwd")) {
						$("#pwd-repeat_err").html("Bitte geben Sie zweimal das gleiche Passwort ein!");
						$("#pwd").val("");
						$("#pwd-repeat").val("");
					}
					if(response.includes("e-mail")) {
						$("#mail_err").html("Bitte geben Sie eine gültige E-Mail-Adresse ein!");
						$("#pwd").val("");
						$("#pwd-repeat").val("");
					}
					if(response.includes("mailtaken")) {
						$("#mail_err").html("Die E-Mail-Adresse wird bereits verwendet!");
						$("#pwd").val("");
						$("#pwd-repeat").val("");
					}
					if(response.includes("aztaken")) {
						$("#az_err").html("Das Stellenzeichen wird bereits verwendet!");
						$("#pwd").val("");
						$("#pwd-repeat").val("");
					}
					else{
                        $("#general_err").html("Bitte ergänzen Sie die fehlenden Angaben!"); 
						$("#pwd").val("");
						$("#pwd-repeat").val("");
                    }
                }
            });
		}
		else{
			$("#general_err").html("Bitte ergänzen Sie die fehlenden Angaben!"); 
			$("#pwd").val("");
			$("#pwd-repeat").val("");
		}  
	});

});