function actionDelete(event){
  event.preventDefault();
  let urlRequest = $(this).data('url');
  console.log('aaa');
  let that = $(this);

          $.ajax({
             type: 'GET',
             url: urlRequest,
             success: function (data) {
                 if (data.code == 200) {
                     that.parent().parent().parent().remove();
                 }

             },
              error: function () {

             }
          });

}


$(function () {
 $(document).on('click', '.action_delete', actionDelete);
});

