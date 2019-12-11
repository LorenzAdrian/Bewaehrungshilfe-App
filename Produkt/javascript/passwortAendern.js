$(document).ready(function(){
  //Function für Eingabetaste auf passwortAendern.php
  $(document).keyup(function(e){
    if(e.which == 13){
      $("#passwortAendern").click();
    }
  });
});

//Funktionen, um Passwörter anzuzeigen
function pwdShowAlt() {
var x = document.getElementById("pwd-alt");
if (x.type === "password") {
  x.type = "text";
} else {
  x.type = "password";
}
}

function pwdShowNeu() {
var x = document.getElementById("pwd-neu");
if (x.type === "password") {
  x.type = "text";
} else {
  x.type = "password";
}
}

function pwdShowRpt() {
var x = document.getElementById("pwd-repeat");
if (x.type === "password") {
  x.type = "text";
} else {
  x.type = "password";
}
}
