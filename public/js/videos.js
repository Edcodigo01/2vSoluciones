
$(document).on({
    click: function (){
        showLoader();
        $('.playVideo').removeClass('select');
        var value = $("").val();
        url = $(this).attr('data-url');
        url = 'https://www.youtube.com/embed/'+url;

        title = $(this).attr('data-title');
        slug = $(this).attr('data-slug');

        desc = $(this).attr('data-description');
        $('#titleVideo').html(title);


        $('#descVideo').html(desc);
        $('#videoYoutube').attr('src',url);
        $('#modalVideo').modal('show');
        $(this).addClass('select');

        hideLoader();

         interrogation = '';
         and = '';

        page = $('#pageNow').val();
        if (page.length != 0) {
           page = 'page='+page;
        }else{
           page = '';
        }

        if (slug.length != 0) {
           video = 'video='+slug;
        }else{
           video = '';
        }

         if (page.length != 0 || video.length != 0) {
            interrogation = '?'
         }
         if (page.length != 0 && video.length != 0) {
            and = '&'
         }
         seturl = interrogation+video+and+page;

         window.history.pushState('', '',seturl);

         $('html, body').animate({
         scrollTop: $("#scrollClickVideo").offset().top -50
      }, 1000);

    }
}, ".playVideo"); //pass the element as an argument to .on

$(document).on("click", ".pagination a", function(e){
    e.preventDefault();


    showLoader();
    var url = $(this).attr('href');
    if(!url.includes('list_videos')){
        url = url.replace('videos','list_videos_front');
    }
    viewAjax('.viewAjax',url);
    // $('html, body').animate({
    //     scrollTop: 400
    // }, 500);

});
