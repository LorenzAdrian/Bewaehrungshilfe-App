jQuery(document).ready(function() {


  // Show password Button
  $("#showpassword").on('click', function() {

    var pass = $("#passwort");
    var fieldtype = pass.attr('type');
    if (fieldtype == 'password') {
      pass.attr('type', 'text');
      $(this).text("Passwort verbergen");
    } else {
      pass.attr('type', 'password');
      $(this).text("Passwort anzeigen");
    }


  });





});