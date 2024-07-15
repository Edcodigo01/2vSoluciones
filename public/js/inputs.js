$(document).on({
    keypress: function () {
        var regex = new RegExp("^[0-9)]");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        var maxlength = $(this).attr('maxlength');
        var value = $(this).val();
        if(maxlength == undefined){
            alert('falta agregar maxlength');
            return;
        }
        if (!regex.test(key) && value.length < maxlength) {
            event.preventDefault(); return false;
        }
    },
    paste: function (){
        alert('Este campo no admite esta acción')
        return false;
    },
}, ".onlyNumber");


$(document).on("change", "#filtro1", function(){
    showLoader();
    updateTable();
    var value = $(this).val();
    if(value != undefined && value != ""){
        $(".vaciarFiltros").show();
    }
    hideLoader();
});


$('#blockMayus').keypress(function(e) {
    var s = String.fromCharCode( e.which );
    if ( s.toUpperCase() === s && s.toLowerCase() !== s && !e.shiftKey ) {
        warning('La tecla Bloq Mayus está activada.');
    }
});

$(document).on("change", ".published", function(e){
    e.preventDefault();

    var value = $(this).val();
    if (value == 'No Publicado') {
        $(this).removeClass('text-success');
        $(this).addClass('text-danger');

    }else if (value == 'Publicado') {
        $(this).removeClass('text-danger');
        $(this).addClass('text-success');

    }else{
        $(this).removeClass('text-danger');
        $(this).removeClass('text-success');

    }

});
// input decimal
$(document).on("paste", ".decimal", function(e){
    e.preventDefault();
    alert('Este campo no admite esta acción');
});

$(document).on("keyup", ".decimal", function(){
    var value = $(this).val();

        if(value.length == 0){
            $(this).parents('.decimalContent').bind('.decimalRespaldo').val(value);
            return false;
        }
        if(!value.includes(',') && value.length > 7){
            value = value.substr(0,7);
            $(this).parents('.decimalContent').bind('.decimalRespaldo').val(value);
            $(this).val(value);
            return false;
        }
    var respaldo = $(this).parents('.decimalContent').bind('.decimalRespaldo').val();

        var regex = new RegExp("^[0-9]{1,7},{0,1}[0-9]{0,2}$");


    if (regex.test(value)){
        $(this).parents('.decimalContent').bind('.decimalRespaldo').val(value);
    }else{
        $(this).val(respaldo);
    }
});
// FIN INPUTS DECIMAL

// INPUT IMAGE

$(document).on("click", ".btn-file", function(){
    $(this).parents('.contentInputImg').find('.inputFile').click();
});

$(document).on("change", ".inputFile", function(){
    readInputFile(this);
});


function readInputFile(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
        $(input).parents('.contentInputImg').find('.imagePreviewInput').attr('src', e.target.result);
        $(input).parents('.contentInputImg').find('.updateDeleteImage').show();
        $(input).parents('.contentInputImg').find('.btn-up').hide();
        $(input).parents('.contentInputImg').find('.inputDtImage').val('no');

    }

    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

$(document).on("click", ".btn-dtFile", function(){
    $(this).parents('.contentInputImg').find('.inputFile').val('');
    $(this).parents('.contentInputImg').find('.imagePreviewInput').attr('src','public/images/default/image-default.jpg');
    $(this).parents('.contentInputImg').find('.inputDtImage').val('si');
    $(this).parents('.contentInputImg').find('.updateDeleteImage').hide();
    $(this).parents('.contentInputImg').find('.btn-up').show();
});



// FIN INPUT IMAGE
