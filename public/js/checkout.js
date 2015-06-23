$( document ).ready(function () {

  var search;

  var getInventory = function () {
    var inventory = [];

    var x = $( '#inventory tbody' ).children();

    for (var i=0; i<x.length; i++) {
      var reagent = {},
          row = x[0].children;

      reagent.reagent = row[0].innerHTML;
      reagent.id = row[1].innerHTML;
      reagent.expiration_date = row[2].innerHTML;
      reagent.stock = row[3].innerHTML;

      inventory.push(reagent);
    }

    return inventory;
  };

  $('#search').on('click', function () {

    $.post('/json-test', {
      reagent: $('input[name="reagent"]').val()
    }, function (data) {
      $( '#storage tbody' ).remove();
      $( '#storage' ).append('<tbody></tbody>');
      search = data;
      var inventory = getInventory();

      for (var i=0; i<data.length; i++) {
        // TODO: refactor!!
        var isTaken = false;
        for (var j=0; j<inventory.length && !isTaken; j++) {
          if (inventory[j].id === data[i].id) {
            isTaken = true;
          }
        }

        if (!isTaken) {
          $('#storage tbody').append('<tr><td>' + data[i].reagent + '</td><td>' + data[i].id + '</td><td>' + data[i].expiration_date + '</td><td>' + data[i].stock + '</td><td class="danger"><button type="button" class="btn btn-danger checkout"><i class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></i></button></td></tr>');
        }
      }

    });

  });

});

$( document ).on('click', '.checkout', function () {
  var reagent = {};
  var retrieved = this.parentElement.parentElement.children;

  reagent.reagent = retrieved[0].innerHTML;
  reagent.id = retrieved[1].innerHTML;
  reagent.expiration_date = retrieved[2].innerHTML;
  reagent.stock = retrieved[3].innerHTML;

  $( '#inventory' ).append('<tr><td>' + reagent.reagent + '</td><td>' + reagent.id + '</td><td>' + reagent.expiration_date + '</td><td>' + reagent.stock + '</td><td contenteditable class="danger quantity"></td></tr>');

  this.parentElement.parentElement.remove();  
});

$( document ).on('keyup', '.quantity', function () {
  // TODO check remove quantity <= stock quantity
  // var stock = this.parentElement.children[3].innerHTML;
  // if (this.innerHTML > stock) {
  //   this.innerHTML = stock;
  // }
});
