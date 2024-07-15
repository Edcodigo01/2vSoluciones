<div class="row" id="artilces-mobile" style="Display:none">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
          <input type="hidden" name="" value="{{$numberA = 0}}" class="form-control " >
          @foreach ($articles as $key => $article)
              <input type="hidden" name="" value="{{$numberA = $numberA + 1}}" class="form-control " >
              <a href="{{route('article',$article->slug)}}">
              <div class="carousel-item @if($numberA == 1)active @endif container">

                      <div class="card wow fadeInLeft" style="height:100%;" data-wow-delay="">
                          <div class="card-header">
                              <img style="object-fit:cover;border:solid 1px rgb(181, 178, 182);height:150px;width:100%" class="popular-course-thumb bg-img" src="{{asset($article->imageP)}}" alt="">
                          </div>
                          <div class="card-body">
                              <div class="mb-3" style="max-height:150px;overflow:hidden;">
                                  <h6 class="text-center text-purple">{!!$article->title!!}</h6>
                                  <div class="row">
                                      <div class="col-12">
                                          <span class="" style="font-size:11px"><span class="font600">Autor:</span> {!!$article->autor!!}</span>
                                          <span class="float-right text-dark" style="font-size:11px">{!!Carbon\Carbon::parse($article->created_at)->format('d-m-Y')!!}</span>
                                      </div>
                                  </div>
                              </div>

                              <a href="{{route('article',$article->slug)}}" class="btn bg-green btn-sm float-right" style="position:absolute;bottom:5px;right:10px;">Leer <i class="fas fa-arrow-right"></i> </a>
                          </div>
                      </div>

              </div>
          </a>
          @endforeach



      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon " aria-hidden="true"></span>
        <span class="sr-only">Anterior</span>
      </a>
      <a class="carousel-control-next text-danger" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Siguiente</span>
      </a>
    </div>

    <div class="text-center">
        <a style="" href="{{route('articles')}}" class="btn academy-btn btn mt-4">Más Artículos <i class="fas fa-arrow-right"></i></a>
    </div>
</div>


<div class="continer2">

   <div class="row m-" id="artilces-lg">
      @foreach ($articles as $key => $article)
           <div class="col-sm-6 col-lg-4 col-xl-3 mb-4">
               <a href="{{route('article',$article->id)}}">
               <div class="card wow fadeInLeft border-g" style="height:100%;" data-wow-delay="">
                   <div class="card-header p-1 border-g">
                       <img style="object-fit:cover;border:solid 1px rgb(181, 178, 182);height:150px;width:100%" class="popular-course-thumb bg-img" src="{{asset($article->imageP)}}" alt="">
                   </div>
                   <div class="card-body border-g">
                       <div class="mb-3" style="max-height:150px;overflow:hidden;">
                           <h6 class="text-center text-purple">{!!$article->title!!}</h6>
                           <div class="row">
                              <div class="col-12">
                                   <span class="" style="font-size:11px"><span class="font600">Autor:</span> {!!$article->autor!!}</span>
                                   <span class="float-right text-dark" style="font-size:11px">{!!Carbon\Carbon::parse($article->created_at)->format('d-m-Y')!!}</span>
                              </div>
                           </div>
                       </div>

                       <button  class="btn bg-green btn-sm m-auto" style="position:absolute;bottom:5px;right:10px;">Leer <i class="fas fa-arrow-right"></i> </button>
                   </div>
               </div>
               </a>
           </div>
      @endforeach
      <div class="col-12 my-4 text-center">
           <a href="{{route('articles')}}" class="btn academy-btn btn">Más Artículos <i class="fas fa-arrow-right"></i></a>

      </div>
   </div>
</div>
