function closeModalVideo(){
    $('#modalVideo').modal('hide')
    $('#videoYoutube').attr('src','');
}
$(document).on({
    mouseenter: function () {
        $(this).find('.fa-play').removeClass('text-white');
        // $(this).find('.fa-play').addClass('text-secondary');
        $(this).find('.fa-play').css('font-size','75px');

        $(this).find('.logo-play').css('width','120px');
        $(this).find('.logo-play').css('height','120px');

        //stuff to do on mouse enter
    },
    mouseleave: function () {
        $(this).find('.fa-play').removeClass('text-danger');
        $(this).find('.fa-play').addClass('text-white');
        $(this).find('.logo-play').css('width','100px');
        $(this).find('.logo-play').css('height','100px');
        $(this).find('.fa-play').css('font-size','65px');

        //stuff to do on mouse leave
    },
    click: function (){
        showLoader();
        var value = $("").val();
        url = $(this).find('.url').val();
        url = 'https://www.youtube.com/embed/'+url;

        title = $(this).find('.title').val();
        desc = $(this).find('.description').val();
        $('#titleVideoModal').html(title);
        $('#descVideoModal').html(desc);
        $('#videoYoutube').attr('src',url);
        $('#modalVideo').modal('show');
        hideLoader();
    }
}, ".playVideo"); //pass the element as an argument to .on
