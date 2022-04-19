$(function () {
  $(".edit-btn").each(function () {
    $(this).on('click', function () {
      var target = $(this).data('target');
      var modal = document.getElementById(target);
      $(modal).fadeIn();
    });
  });
});
