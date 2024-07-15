@if ($videos->first())
    <br>
    <br>
    @if (request()->video)
       <input type="hidden" name="" value="{{$videoSelect = $videos->where('slug',request()->video)->first()}}" >

    @else
       <input type="hidden" name="" value="{{$videoSelect = $videos->first()}}" >
    @endif

    <div class="container2 videos">

       {{-- video lg --}}
          <div class="containIframe">
          @if (request()->video == Null)
              <iframe style="" src="{{'https://www.youtube.com/embed/'.$videos->first()->url}}" id="videoYoutube" allowfullscreen = "allowfullscreen"></iframe>
           @else
              <iframe style="" src="{{'https://www.youtube.com/embed/'.$videoSelect->url}}" id="videoYoutube" allowfullscreen = "allowfullscreen"></iframe>
           @endif
          </div>

       <h6 id="titleVideo" class="text-center text-green-l">@if($videoSelect) {{$videoSelect->title}} @endif</h6>
       @if ($videoSelect and $videoSelect->description)
          <h6 class="">Descripción</h6>
          <p class="">{{$videoSelect->description}}</p>
       @endif
    {{-- ------ --}}
    <div class="viewAjaxOnlyVideos" data-route="{{url('lista-videos-busqueda')}}">
       @include('front.videos.videosSearch')
    </div>



    <input type="hidden" name="" value="{{$videos->currentPage()}}" class="form-control" id="pageNow">
    <input type="hidden" name="" value="{{request()->video}}" class="form-control" id="search-video">



    </div>
    <br>
    <br>
@else
    <div class="alert alert-info mt-5" style="width: 100%;max-width:800px;margin:auto">
       <h5 class="text-center mt-2"><i class="fas fa-exclamation-triangle"></i> No ahí videos registrados</h5>
    </div>
@endif
