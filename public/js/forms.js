console.log("form");

function btnBack(){
    back = document.referrer;
    location.href = back;
}

$(document).on('click','.btnBack', function(e){
    btnBack();
});

function enableBtn(){
    $("#btnFormContact").attr('disabled',false);
}

function viewAjax(classView,route){
    showLoader();
    if(classView == undefined){
        classView = '.viewAjax';
    }
    if(route == undefined){
        route = $(classView).attr('data-route');
        if($('#numberPage').length != 0){
            numberPage = $('#numberPage').val();
            route = route+'?page='+numberPage;
        }
    }

    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        method:'GET',
        url:route,
        error:function(error){
            hideLoader();
            console.log(error);
            warning('error al cargar vista');
        },
        success:function(result){
            $(classView).html(result);
            console.log('renderisado');
            $('form').validate({
                errorPlacement: function (error, element) {
                    if (element.parent().hasClass('input-group')) {
                        error.insertAfter(element.parent());
                    } else {
                        error.insertAfter(element);
                    }
                }
            });
            hideLoader();

            if (route.includes('page')) {
               page = $('#pageNow').val();
               if (page.length != 0) {
                 window.history.pushState('', '', ''+'?page='+page);
               }
            }
        }
    });

}

// EL METODO FORMDATA NO FUNCIONA CON UPDATE ADAPTAR LA RUTA
$(document).on('submit','.form-file', function(e){
    e.preventDefault();
    showLoader();
    form = $(this);
    form_method = $(this).attr('method');
    route = $(this).attr('action');
    form_data = new FormData();
    $(this).find('.inputFile').each(function() {
        if($(this)[0].files[0] != undefined){
            if($(this).hasClass('imageP')){
                form_data.append('imageP', $(this)[0].files[0]);
            }else if ($(this).hasClass('imageA1')) {
                form_data.append('imageA1', $(this)[0].files[0]);
            }else if ($(this).hasClass('imageA2')) {
                form_data.append('imageA2', $(this)[0].files[0]);
            }else if ($(this).hasClass('imageA3')) {
                form_data.append('imageA3', $(this)[0].files[0]);
            }else if ($(this).hasClass('imageA4')) {
                form_data.append('imageA4', $(this)[0].files[0]);
            }
        }
    });

    var data = $(this).serializeArray();
    $.each(data,function(key,input){
        form_data.append(input.name,input.value);
        console.log(input.value);
    });
    console.log(form_data);
    // form_data = $(this).serialize();

    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        method:form_method,
        url:route,
        data:form_data,
        processData: false,
        contentType: false,
        error:function(error){
            console.log(error);
            hideLoader();
            lista = "";
            $.each(error.responseJSON.errors, function( index, value ) {
                lista+='</li>'+value+'</li>'
            });
            warning('</ul>'+lista+'</ul>');
        },
        success:function(result){
            console.log(result);
            if(result.result == 'error'){
                warning(result.message);
                hideLoader();
                console.log(result.message);
                return;
            }
            if(form.attr('id') == 'create'){
                cancelModal('#modalCreate','#create');
                success(result.message);
                updateTable('.listar','si');

            }else if(form.attr('id') == 'form-delete'){
                $('#modalDelete').modal('hide');
                danger(result.message);
                updateTable('.listar','si');
                //form-edit
            }else if(form.attr('id') == 'update'){
                $(form).attr('action','');
                $('#modalEdit').modal('hide');
                success(result.message);
                updateTable('.listar','si');
                //form-login
            }else{
                success(result.message);
                $(".formula")[0].reset();
                $(".primer-input").focus();
                updateTable('.listar','si');
            }
            hideLoader();
        }
    });
});



$(document).on('submit','.formula', function(e){
    
    e.preventDefault();
    showLoader();
    form = $(this);
    form_method = $(this).attr('method');
    route = $(this).attr('action');
    form_data = $(this).serialize();
    form_id = $(form).attr('id');

    if(form.attr('id') == 'uploadVideo' || form.hasClass('updateVideo')){

        url = $(form).find('.videoUrl').val();
        var matches = url.match(/^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/);
        if (matches) {

        } else {
            warning('La url del video es invalida.');
            hideLoader();
            return false;
        }
    }

    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        method:form_method,
        url:route,
        data:form_data,
        error:function(error){
            console.log(error);
            lista = "";
            $.each(error.responseJSON.errors, function( index, value ) {
                lista+='</li>'+value+'</li>'
            });
            warning('</ul>'+lista+'</ul>');
            hideLoader();
        },
        success:function(result){
            console.log(result);
            
            if(result.result == 'error'){

                warning(result.message);
                hideLoader();
                return;
            }else if (result.result == 'delete') {
                success(result.message);
                viewAjax('.viewAjax');
                $('.modal').modal('hide');

                return;
            }


            if(form.attr('id') == 'create'){

                cancelModal('#modalCreate','#create');
                success(result.message);
                updateTable('.listar','si');

            }else if(form.attr('id') == 'formSearchPost'){
                window.location.href = result.url;
            }else if(form.attr('id') == 'formVideos'){
                $('.viewAjaxOnlyVideos').html(result);
            }else if(form.attr('id') == 'formEnable'){
                $('.modal').modal('hide');
                success(result.message);
                updateTable('.listar','si');
            }else if(form.attr('id') == 'form-disabled'){
                $('.modal').modal('hide');
                warning(result.message);
                updateTable('.listar','si');
            }else if(form.attr('id') == 'message-contact'){
                $('#btnFormContact').attr('disabled',true);
                success(result.message);
                grecaptcha.reset();
                $(form).find('.form-control').each(function() {
                    $(this).val('');
                });
            }else if(form.attr('id') == 'uploadVideo' || form.attr('id') == 'update_ajax' || form.attr('id') == 'deleteAjax' ){
                viewAjax('.viewAjax');
                success(result.message);
                $('.modal').modal('hide');
            }else if(form.attr('id') == 'form-delete'){
                $('#modalDelete').modal('hide');
                danger(result.message);
                updateTable('.listar','si');

                //form-edit
            }else if(form.attr('id') == 'update'){
                $(form).attr('action','');
                $('#modalEdit').modal('hide');
                success(result.message);
                updateTable('.listar','si');
                //form-login
            }else if(form.attr('id') === 'form-login'){
                if(result.result === 'error'){
                    warning(result.message);
                    $('.password').val('');
                }else if(result.result === 'ok'){
                    url = result.url;
                    window.location.href = url;
                }
            }else{
                success(result.message);
                $('.modal').modal('hide');
                $(".formula")[0].reset();
                $(".primer-input").focus();
                updateTable('.listar','si');
            }
            hideLoader();
        }
    });
});


// function validateUrlYoutube(form,videoUrl){
//
//
// }
// mostrar u ocultar form
function oculta_muestra(este,form){
    $(este).hide();
    $(form).show();
    $(".primer-input").focus();
}
// cancelar form
$(".cancel").click(function() {
    $(".formula").data('validator').resetForm();
    $(".formula")[0].reset();
    $(".modal").modal('hide');

});