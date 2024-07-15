$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

// header
function isMobile() {
try{
    document.createEvent("TouchEvent");
    $('.whatsapp-mobile').show();
    $('.whatsapp-web').hide();
    // return true;
}
catch(e){
    $('.whatsapp-mobile').hide();
    $('.whatsapp-web').show();
    // return false;
}
}

$(document).ready(function(){
   if( $(window).scrollTop() > 70 ) {
      $('.navP2').addClass('open');
   }else{
      $('.navP2').removeClass('open');
   }
    isMobile()



    $('.venobox').venobox({
    framewidth : '70%',                            // default: ''
    // frameheight: '70%',                            // default: ''
    border     : '10px',                             // default: '0'
    bgcolor    : '#5dff5e',                          // default: '#fff'
    titleattr  : 'data-title',                       // default: 'title'
    numeratio  : true,                               // default: false
    infinigall : true,                               // default: false
    share      : ['download']
});

   $(window).scroll(function() {
      if( $(window).scrollTop() > 70 ) {
         $('.navP2').addClass('open');
      }else{
         $('.navP2').removeClass('open');
      }
   });

});

// dropdown
$('#contentDropdown').hover(function(){
	$('#navbarDropdown').trigger('click')
  //console.log('hover');
})

// LOADER
function hideLoader(){
    $('#loader').fadeOut();
}

function showLoader(){
    $('#loader').show();
}

$(window).on('load', function () {
    hideLoader();
});

$(document).on('click','.btn-main', function(e){

   main = $('.main');
   if (main.hasClass('open')) {
      main.removeClass('open');
      $('.bg-lock').hide();

   }else{
      main.addClass('open');
      $('.bg-lock').show();

   }

});
$(document).on('click','.btnFiltersMobile', function(e){

   main = $('#filtersMobile');
   if (main.hasClass('open')) {
      main.removeClass('open');
      $('.bg-lock').hide();

   }else{
      main.addClass('open');
      $('.bg-lock').show();

   }

});

$(document).on('click','.close-main, .bg-lock, .btnCloseFilterMobile', function(e){
   $('.main').removeClass('open');
   $('#filtersMobile').removeClass('open');
   $('.bg-lock').hide();
});
