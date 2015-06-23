$( document ).ready(function () {

  $( '#password-neq-alert' ).hide();
  var password = $( '#password' ),
      passwordConfirmation = $( '#passwordConfirmation' ),
      parent = $( passwordConfirmation.parent()[0] );

  passwordConfirmation.keyup(function () {
    if (password.val() != passwordConfirmation.val()) {
      parent.addClass('has-error');
    } else {
      parent.removeClass('has-error');
    }
  });

  $( '#register' ).click(function (e) {
    if (parent.hasClass('has-error')) {
      e.preventDefault();
      $( '#password-neq-alert' ).show();
    }
  });

});
