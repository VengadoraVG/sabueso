$( document ).ready(function () {
  $( document ).on('click', '.delete', function (e) {
    $(this).parent().parent().remove();
  })

  $( '#add' ).on('click', function () {
    $( '#inventory tbody' )[0].innerHTML += '<td contenteditable class="reagent"></td><td contenteditable class="expiration_date"></td><td contenteditable class="stock"></td><td><button type="button" class="btn btn-danger delete"><span class="glyphicon glyphicon-minus" aria-hidden="true" /></button></td>';
    x = $( '#inventory tbody' )[0];
  });

  $( document ).on('submit', function (e) {
    var reagents = [];

    $( '#inventory tbody tr' ).each(function () {
      var reagent = $(this).children('.reagent')[0].innerHTML;
      var expirationDate = $(this).children('.expiration_date')[0].innerHTML;
      var stock = $(this).children('.stock')[0].innerHTML;
      if (reagent !== '') {
        reagents.push({
          reagent: reagent,
          expirationDate: expirationDate,
          stock : stock
        });
      }
    });

    $( 'input[name="new_reagents"]' )[0].value = JSON.stringify(reagents);
  });

});
