@extends("front.layouts.index")
@section('styles')


@endsection
@section("content")


    <div class="text-center paralax" style="background-image: url({{asset('public/images/default/libros.jpg')}});background-position:bottom">
        <div class="container-title" style="background:rgba(36, 35, 35, 0.48)">
            <span class="bg- px-3 py-2">
                <h3 style="width:90%" class="text-center text-white mt-1 titleArticle break-text m-auto" style="max-width:800px;margin:auto"><i class="fas fa-book-open"></i> {{$article->title}}</h3>
            </span>
        </div>
    </div>

    <div class="container2 mt-4">
      @include('front.articles.filtersMobile')

      <div class="row m-auto" style="width:100%">
          <div class="col-12 p-1">
               <button type="button" name="button" class="btn btn-purple btn-sm m-0 mb-1 float-right btnFiltersMobile"><i class="fas fa-search"></i> Buscar</button>
          </div>
     </div>
        {{-- CONTENT --}}
        <div class="row m-auto" style="width:100%">
            <div class="col-lg-8 col-xl-9 mb-4 px-1" id="viewAjax">
                <div class="card">
                    <div class="card-body p-2">

                        <img src="{{asset($article->imageP)}}" alt="" style="" class="imageP mb-4">


                        <div class="col-12">

                            <h6 class="" >{{$article->title}} </h6>
                            @if($article->category != Null)
                                <p class="my-1 text-purple">Categoria: <span class="text-secondary"> {{$article->category->name}} </span></p>
                            @endif
                            <p class="my-1 text-purple">Autor: <span class="text-secondary"> {{$article->autor}} </span></p>
                            <p class="my-1 text-purple">Fecha: <span class="text-secondary"> {{\Carbon\Carbon::parse($article->created_at)->format('d-m-Y')}} </span></p>
                            @if ($tagsArticle->first() != null)
                                <input type="hidden" name="" value="{{$tagCount = $tagsArticle->count()}}" class="form-control">

                            <p class="text-purple">Etiquetas:
                                <input type="hidden" name="" value="{{$number = 1}}" class="form-control " >
                                @foreach ($tagsArticle as $key => $value)
                                    <span class="text-secondary"> {{$value->tag->name}}@if($number != $tagCount),@else. @endif </span>
                                        <input type="hidden" name="" value="{{$number = $number + 1}}" class="form-control ">
                                @endforeach
                            </p>
                                @endif
                            <div class="text-justify" >{!!$article->content!!}</div>
                            <div class="row mt-2">
                                @if ($article->imageA1)
                                    <div class="col-md-6">
                                        <a class="venobox" href="{{asset($article->imageA1)}}" data-gall="myGallery"><img src="{{asset($article->imageA1)}}" alt="" class="float-right img-fluid imageGalleryBlog"></a>
                                    </div>
                                @endif
                                @if ($article->imageA2)
                                    <div class="col-md-6">
                                        <a class="venobox " href="{{asset($article->imageA2)}}" data-gall="myGallery"><img src="{{asset($article->imageA2)}}" alt="" class="float-right img-fluid imageGalleryBlog"></a>
                                    </div>
                                @endif
                                @if ($article->imageA3)
                                    <div class="col-md-6">
                                        <a class="venobox " href="{{asset($article->imageA3)}}" data-gall="myGallery"><img src="{{asset($article->imageA3)}}" alt="" class="float-right img-fluid imageGalleryBlog"></a>
                                    </div>
                                @endif
                                @if ($article->imageA4)
                                    <div class="col-md-6">
                                        <a class="venobox" href="{{asset($article->imageA4)}}" data-gall="myGallery"><img src="{{asset($article->imageA4)}}" alt="" class="float-right img-fluid imageGalleryBlog"></a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <h5 class="mt-5">Artículos Recientes</h5>
               <div class="row px-2 articlesList">
                  @foreach ($articles->where('id','!=',$article->id) as $key => $article)
                      <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-1 px-1">
                          <a href="{{route('article',$article->id)}}">
                          <div class="card cardArticle show-title-complete" style="height:100%;">
                              <div class="card-header p-1 border-g">
                                  <img style="width:100%" class="" src="{{asset($article->imageP)}}" alt="">
                              </div>
                              <div class="card-body border-g">

                                     <div class=" d-flex justify-content-center align-items-center">
                                        <p style=" white-space: nowrap;text-overflow: ellipsis;overflow: hidden;" class="title-cut text-center text-dark font600">{{$article->title}}</p>
                                        <p class="text-center text-dark font600 title-complete hiden">{{$article->title}}</p>
                                     </div>

                                  <p class="text-dark" style="font-size:11px"><span class="font600">Autor:</span> {!!$article->autor!!}</p>

                                  <button type="button" name="button" class="btn btn-sm btn-purple float-right">Leer</button>
                                  <p class="float-left text-dark mt-2 date" style="">{!!Carbon\Carbon::parse($article->created_at)->format('d-m-Y')!!}</p>
                                  {{-- <button  class="btn btn-white" style="position:absolute;bottom:5px;right:10px;">Leer <i class="fas fa-arrow-right"></i> </button> --}}
                              </div>
                          </div>
                          </a>
                      </div>
                  @endforeach

               </div>
            </div>
            {{-- MAIN --}}
            <div class="col-lg-4 col-xl-3 px-1 filtersLG">
                <div class="card">
                    <div class="card-body">
                       <h6 class="text-green-l"> Filtros</h6>
                       <form  class="" action="{{url('articulos')}}" method="get" id="formSearchPost">

                          <div class="row">
                             <div class="col-12 col-md-4 col-lg-12">
                                 <label for="">Título del artículo</label>
                                 <input type="text" name="titulo" value="{{request()->titulo}}" class="form-control form-control-sm">
                             </div>
                             <div class="col-12">
                                 @if ($categories->first() != Null)
                                     <label for="">Categoría</label>
                                     <select class="form-control form-control-sm" name="categoria" >
                                         @if(request()->categoria == Null)
                                             <option value="" selected class="">Todas</option>
                                             @foreach ($categories as $key => $value)
                                                 <option  value="{{$value->name}}" class="">{{$value->name}}</option>
                                             @endforeach
                                         @else

                                             <option value="" class="">Todas</option>
                                             @foreach ($categories as $key => $value)
                                                 @if (request()->categoria == $value->name)

                                                     <option class="" value="{{$value->name}}" selected>{{$value->name}}</option>
                                                 @else
                                                     <option class="" value="{{$value->name}}" >{{$value->name}}</option>
                                                 @endif
                                             @endforeach

                                         @endif
                                     </select>

                                 @endif
                             </div>
                         <div class="col-12">
                            @if (request()->titulo or request()->categoria)
                               <a href="{{url('articulos')}}" type="button" name="button" class="ml-1 btn btn-purple text-white mt-2 float-right" style=""><i class="fas fa-backspace"></i> </a>
                            @endif

                             <button  type="submit" name="button" class="btn btn-purple mt-2 float-right" ><i class="fas fa-search ml-1"></i> Buscar</button>
                         </div>
                         </div>
                       </form>
                    </div>

                </div>

                @if($categories->first() != Null)
                    <div class="card mt-4">
                        <div class="card-body">
                           <h6 class="text-green-l"> Categorías</h6>
                           <input type="hidden" name="" value="{{$number = 0}}">
                           @foreach ($categories as $key => $category)

                              <input type="hidden" name="hidden" value="{{$number = $number + 1}}" >
                              <hr style="margin:0px;padding:0px">

                              <div class="searchCategory" data-val="{{$category->name}}">
                                   <span class="font600">{{$category->name}} </span><span class="bg-green-l float-right text-center" style="border-radius:20px;width:20px">{{$category->articles->where('disabled','no')->count()}}</span>
                              </div>
                              <hr style="margin:0px;padding:0px">
                           @endforeach
                           <div class="searchCategory" id="todos" data-val="">
                              <span class="font600">Todas </span><span class="bg-green-l float-right text-center" style="border-radius:20px;width:20px">{{$articles->where('disabled','no')->count()}}</span>
                           </div>

                        </div>
                    </div>
                @endif

            </div>
            <br>
            <br>

        </div>

        {{-- <div class="row">
           <div class="col-12 p-1">
               <button type="button" name="button" class="btn btn-purple btn-sm m-0 mb-1 float-right btnFiltersMobile"><i class="fas fa-search"></i> Buscar</button>
               <button type="button" name="button" class="btn btn-light btn-sm m-0 mb-1  btnBack"><i class="fas fa-backward"></i> Atras</button>
           </div>
      </div> --}}

    </div>
    <br>
    <br>

@endsection
@section('scripts')
    <script type="text/javascript">

    $(document).on('submit','#formSearchPost', function(e){
      e.preventDefault();
      titulo = $(this).find('input[name="titulo"]').val();
      category = $(this).find('select[name="categoria"]').val();
      if (titulo.length != 0) {
         titulo = 'titulo='+titulo;
      }else{
         titulo = '';
      }
      if (category.length != 0) {
         category = 'categoria='+category;
      }else{
         category = '';
      }

      if (category.length != 0 && titulo.length != 0) {
         $and = '&';
      }else{
         $and = '';
      }
      if (category.length != 0 || titulo.length != 0) {

         $interrogation = '?';
      }else{


         $interrogation = '';
      }
      window.location.href = '{{url('articulos')}}'+$interrogation+category+$and+titulo;
    });


    $(document).on('click','.searchCategory', function(e){

      category = $(this).attr('data-val');
      if (category.length != 0 && category != '') {
         category = '?categoria='+category;
      }else{
         category = '';
      }

      window.location.href = '{{url('articulos')}}'+category;

    });


    </script>
@endsection
