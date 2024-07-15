$(document).on('click mouseover','.formP .labelInput', function(e){
    $(this).css('margin-top','-28px');
    $(this).parents('.formP').find('.form-control').focus();
});

$(document).on('focus','.formP .form-control', function(e){
    if ($(this).val().length == 0) {
        $(this).parents('.formP').find('.labelInput').css('margin-top','-28px');
    }
});

$(document).on('blur','.formP .form-control', function(e){
    if ($(this).val().length == 0) {
        $(this).parents('.formP').find('.labelInput').css('margin-top','0px');
    }
});
