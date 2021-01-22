function actionDelete(event){
  event.preventDefault();
  let urlRequest = $(this).data('url');
  let id = $(this).data('id');

    $.ajax({
            type: 'GET',
            url: urlRequest,
            data: {
            id: id,
        },
    }).done(data => {
    $('.cart_wrapper').empty();
    $('.cart_wrapper').html(data);
    $('#cart_count').text($('#change_cart_count').val());
    alert('Ban co muon xoa san pham');
        
    });

}

function updateCart(event) {
    event.preventDefault();
    let url = $('.update_cart_url').data('url');
    let id = $(this).data('id');
    let quantity = $(this).parents('tr').find('input[name="quantity"]').val();
  
    $.ajax({
      type: 'GET',
      url: url,
      data: {
        id: id,
        quantity: quantity
      },
    }).done(data => {
        $('.cart_wrapper').empty();
        $('.cart_wrapper').html(data);
        
      
    })
    
 
  }

  function addToCart(event) {
    event.preventDefault();
    let url = $(this).data('url');
  
    $.ajax({
      type: 'GET',
      url: url,
      dataType: 'json',
    })
    .then(data => {
      if(data.code == 200) {
        $('#cart_count').text(data.count);
      }
    })
    .catch(err => {
      console.log(err);
    })
  }
  


$(function () {
 $(document).on('click', '.action_delete', actionDelete);
 $(document).on('click', '.update_cart', updateCart);
 $(document).on('click', '.add_to_cart', addToCart);

//  $('.update_cart').on('click', updateCart);

});

