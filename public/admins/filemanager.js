var options = {
  filebrowserImageBrowseUrl: '/filemanager?type=Images',
  filebrowserImageUploadUrl: '/filemanager/upload?type=Images&_token=',
  filebrowserBrowseUrl: '/filemanager?type=Files',
  filebrowserUploadUrl: '/filemanager/upload?type=Files&_token='
};
  CKEDITOR.replace( 'content', options );

  CKEDITOR.replace( 'description', options );