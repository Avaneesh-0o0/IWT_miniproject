$(document).ready(function () {

  $('#oksignup').on('click', function (e) {
    e.preventDefault();
    $('#login').addClass('reg');
    $('#signup').removeClass('reg');
  });

  $('#oklogin').on('click', function (e) {
    e.preventDefault();
    $('#signup').addClass('reg');
    $('#login').removeClass('reg');
  });

});
