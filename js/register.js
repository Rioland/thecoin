$(document).ready(function () {
  $("#log-submit").submit(function (e) {
    let pass = $.trim($("#password").val());
    let pass2 = $.trim($("#password2").val());

    if (pass != pass2) {
      alert("password not match");
      return false;
    } else {
      return true;
    }
  });
});
