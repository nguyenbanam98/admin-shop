function actionDelete(event){
  event.preventDefault();
  let urlRequest = $(this).data('url');
  console.log(urlRequest);
  let that = $(this);

  Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
      if (result.value) {
          $.ajax({
             type: 'GET',
             url: urlRequest,
             success: function (data) {
                 if (data.code == 200) {

                     that.parent().parent().remove();
                     Swal.fire(
                         'Deleted!',
                         'Your file has been deleted.',
                         'success'
                     )
                 }

             },
              error: function () {

             }
          });


  }
})

}

// function viewTransaction(event) {
//     event.preventDefault();
//     $('.js_preview_transaction').attr('id', 'modal-5');
// }

$(function () {
 $(document).on('click', '.action_delete', actionDelete);
//  $(document).on('click', '.js_preview_transaction', viewTransaction);
});