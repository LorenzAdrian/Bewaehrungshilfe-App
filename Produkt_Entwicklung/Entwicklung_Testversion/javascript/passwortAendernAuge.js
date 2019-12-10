function showHidePwd1() {
  var input1 = document.getElementById("pwd-alt");
  if (input1.type === "password") {
    input1.type = "text";
    document.getElementById("eye1").className = "far fa-eye";
  } else {
    input1.type = "password";
    document.getElementById("eye1").className = "far fa-eye-slash";
  }
 
}

function showHidePwd2() {
	var input2 = document.getElementById("pwd-neu");
	if (input2.type === "password") {
    input2.type = "text";
    document.getElementById("eye2").className = "far fa-eye";
  } else {
    input2.type = "password";
    document.getElementById("eye2").className = "far fa-eye-slash";
  }
}

function showHidePwd3() {
	var input3 = document.getElementById("pwd-repeat");
	if (input3.type === "password") {
    input3.type = "text";
    document.getElementById("eye3").className = "far fa-eye";
  } else {
    input3.type = "password";
    document.getElementById("eye3").className = "far fa-eye-slash";
  }
}