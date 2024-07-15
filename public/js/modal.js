$(document).on('click','.show_modal_delete_p', function(e){
    method = 'DELETE';
    action = $(this).attr('data-url');
    title = lang[langN]['esta_seguro_de_borrar_permanente'];
    show_modal_danger(action,method,title);
});

function show_modal_danger(action,method,title,subtitle){

    form = $('#modal_danger').find('form');
    form.find('.title').html('');
    form.find('.subtitle').html('');
    form.find('.title').html(title);
    form.find('.subtitle').html(subtitle);
    $(form).attr('action',action);
    $(form).attr('method',method);
    $('#modal_danger').modal({backdrop: 'static', keyboard: false});
}

function modalDeleteAJAX(id){
    urlNow = $('#urlNow').val();
    route = urlNow+'/'+id;
    $('.form-delete').attr('action',route);
    $('#modalDeleteAJAX').modal('show');
}
// INPUTS

$(document).on("input keypress paste change", ".maxNumber", function () {

    maxlength = $(this).attr('maxlength');
    length = $(this).val().length;
    value = $(this).val();

    if (length > maxlength){
        $(this).val(value.slice(0, maxlength));
    }
});


// fin INPUTS

function minimizar(modal){
  $(modal).modal('hide');
}

function showModalEmpty(modal,form){
  formFirst = $(form).find('.form-control').filter(':first');
  $(form).find('.form-control').each(function() {
      if($(this).hasClass('ckeditor')){
          id = $(this).attr('id');
          CKEDITOR.instances[id].setData('');
      }else if ($(this).hasClass('select')) {
          $(this).val('');
      }else if ($(this).hasClass('noVaciar')) {

      }else if ($(this).hasClass('select2')) {
          $(this).val(null).trigger('change');

      }else if ($(this).hasClass('inputFile')) {
          $(this).parents('.contentInputImg').find('.imagePreviewInput').attr('src','public/images/default/image-default.jpg');
          $(this).val(null);
      }else{
           $(this).val('');
      }
  });
  $(modal).on('shown.bs.modal', function () {
    formFirst.focus();
  });

  $(form).data('validator').resetForm();

  $(modal).modal({backdrop: 'static', keyboard: false})
}

function showModal(modal,form){

  formFirst = $(form).find('.form-control').filter(':first');
  $(form).find('.form-control').each(function() {
      if($(this).hasClass('ckeditor')){

          id = $(this).attr('id');
          CKEDITOR.instances[id].setData('');
      }else if ($(this).hasClass('select')) {
          $(this).val('');
      }else if ($(this).hasClass('published')) {

          $(this).val('Publicado').addClass('text-success');
           $(this).val('no');
      }else if ($(this).hasClass('select2')) {

          $(this).val(null).trigger('change');
      }else if ($(this).hasClass('inputFile')) {
          $(this).parents('.contentInputImg').find('.imagePreviewInput').attr('src','public/images/default/image-default.jpg');
          $(this).val(null);
          $(this).parents('.contentInputImg').find('.updateDeleteImage').hide();
          $(this).parents('.contentInputImg').find('.btn-up').show();
      }else if ($(this).hasClass('noVaciar')) {

      }else{
           $(this).val('');
      }
  });
  $(modal).on('shown.bs.modal', function () {
    formFirst.focus();
  });

  $(form).data('validator').resetForm();
  $(modal).modal({backdrop: 'static', keyboard: false})
  // $(modal).modal("show");
}

function cancelModal(modal,form){

  $(form).data('validator').resetForm();
  $(form).find('.form-control').each(function() {
      if($(this).hasClass('ckedit')){
          id = $(this).attr('id');
          CKEDITOR.instances[id].setData('');
      }else{
           $(this).val('');
      }
  });

  $(modal).modal("hide");
}

$(document).on("click", ".showModalCreate", function(){
  modal = $(this).attr('data-showModal');
  form = $(this).attr('data-form');
  showModal(modal,form);
});
