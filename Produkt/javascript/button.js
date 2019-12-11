function showHidePwd() {
  var input = document.getElementById("passwort");
  if (input.type === "password") {
    input.type = "text";
    document.getElementById("eye").className = "far fa-eye";
  } else {
    input.type = "password";
    document.getElementById("eye").className = "far fa-eye-slash";
  }
}