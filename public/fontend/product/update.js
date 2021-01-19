function updateCart(event) {
  event.preventDefault();
  let url = $('.update_cart_url').data('url');
  let id = $(this).data('id');
  let quantity = $(this).parents('tr').find('input[name="quantity"]').val();
  console.log('id:' + id + '--- '+ ' quantity:' + quantity);
  console.log(url);

  $.ajax({
    type: 'GET',
    url: url,
    data: {
      id: id,
      quantity: quantity
    },
    dataType: 'json',
  })
  .then(data => {
    if(data.code == 200) {
      $('.cart_wrapper').html(data.cart_component);
    }
  })
  .catch(err => {
    console.log(err);
  })
}

$(function() {
  $('.update_cart').on('click', updateCart);
});