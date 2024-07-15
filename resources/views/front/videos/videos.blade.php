@extends("front.layouts.index")
@section('styles')
   <link rel="stylesheet" href="{{asset('public\css\sections\videos.css')}}">
@endsection
@section("content")
   <div class="text-center paralax relative" style="background-image: url('public/images/default/camara-video.jpg');background-position:bottom">
      <div class="overlay" style="background:rgba(0, 0, 0, 0.15)"></div>
      <div class="container-title" style="background:rgba(36, 35, 35, 0.38)">
           <div class="row m-auto" style="width:100%">
               <div class="col-12">
                  <span class=" px-3 py-2" style="display:inline-block">
                      <h2 class="text-center text-white mt-1 titleArticle" ><i class="fas fa-video"></i> Videos</h2>
                  </span>
               </div>
           </div>
      </div>
   </div>
   <div id="scrollClickVideo"></div>

    <div class="viewAjax" data-route="{{route('list_videos_front')}}">
      @include('front.videos.videos_ajax')
  </div>

    @endsection

    @section('scripts')
       <script type="text/javascript" src="{{asset('public/js/videos.js')}}"> </script>

       <script type="text/javascript">
       $('form').validate({
           errorPlacement: function (error, element) {
               if (element.parent().hasClass('input-group')) {
                   error.insertAfter(element.parent());
               } else {
                   error.insertAfter(element);
               }
           }
       });
       </script>
    @endsection