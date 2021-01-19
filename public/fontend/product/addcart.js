function addToCart(event) {
  event.preventDefault();
  let url = $(this).data('url');
  let count =  document.querySelector('.cart_count').textContent;

  $.ajax({
    type: 'GET',
    url: url,
    dataType: 'json',
  })
  .then(data => {
    if(data.code == 200) {
      console.log(Number(count));
    }
  })
  .catch(err => {
    console.log(err);
  })
}

$(function() {
  $('.add_to_cart').on('click', addToCart);
});