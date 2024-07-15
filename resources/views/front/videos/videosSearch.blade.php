<div class="row m-auto" style="width:100%">
    <div class="col-12 mb-2 mt-3">

      <div class="card float-right cardSVideo" style="">
           <div class="card-body p-3 ">
               <form class="formula" action="{{url('lista-videos-busqueda')}}" method="get" id="formVideos">
                  <label class="" for="">Buscar video</label>
                  <div class="input-group">
                     <input name="search" value="{{request()->search}}" required type="text" class="form-control form-control-sm required" placeholder="" aria-label="" aria-describedby="basic-addon2">
                     <div class="input-group-append">

                       <button class="btn btn-sm btn-purple" type="submit"><i class="fas fa-search"></i> </button>
                     </div>
                   </div>
               </form>
               @if (request()->search)

                  <button type="button" name="button" class="btn bg-green btn-sm mt-4 btn-block" onclick="viewAjax('.viewAjaxOnlyVideos')">Mostrar todos los videos</button>
               @endif

           </div>
      </div>

    </div>
</div>

@if($videos->first() == null)
   <h5 class="text-warning text-center mt-5"><span class="text-" style="font-size:30px"><i class="fas fa-exclamation-triangle"></i></span> No se encontraron resultados</h5>
@else

   <h5 style="display:none" class="showSearch">Busqueda: <span class="text-secondary textShowSearch"></span></h5>
       <div class="row m-auto" style="width:100%">
          @foreach ($videos as $key => $video)

             <div class="col-xl-3 col-lg-4 col-md-4 col-6 mb-1 px-1">

                 <div class=" card relative playVideo @if ($videoSelect and $videoSelect->id == $video->id) select @endif" data-url="{{$video->url}}" data-description="{{$video->description}}" style="height:100%" data-title="{{$video->title}}" data-slug="{{$video->slug}}">

                     <div class="card-header  p-2" style="height:50px;overflow:hidden; display: flex;align-items: center;justify-content: center;">
                         <p class="m-0  text-center text- " style="line-height:1">{!!$video->title!!} </p>
                     </div>
                     <div class="card-body p-0 bg-green" style="position: relative">

                         <div class="logo-play" style="">
                             <i class="fab fa-youtube"></i>
                         </div>

                         <img src="{{'https://img.youtube.com/vi/'.$video->url.'/0.jpg'}}" alt="" style="width:100%;height:100%;object-fit: cover;">
                     </div>
                 </div>
             </div>
         @endforeach
       </div>
       @if($videos->lastPage() != 1)
          <br>
                  <span class="pagination float-right">{{{ $videos->links() }}}</span>

                   <p class="">Página Nro. {{$videos->currentPage()}} de
                      {{$videos->lastPage()}}</p>

            @endif
       @endif
