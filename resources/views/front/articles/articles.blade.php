@extends("front.layouts.index")
@section("content")

    {{-- background-image: url({{asset('public/images/default/libros.jpg')}}); --}}
    <div class="text-center paralax" style="background-image: url('public/images/default/libros.jpg');background-position:bottom">
        <div class="container-title" style="background:rgba(36, 35, 35, 0.38)">
            <span class="bg- px-3 py-2" style="display:inline-block">
                <h2 class="text-center text-white mt-1 titleArticle" ><i class="fas fa-book-open"></i> Artículos</h2>
            </span>
        </div>
    </div>

    @include('front.articles.filtersMobile')

    <div class="container2 mt-4">
        {{-- CONTENT --}}
        <div class="row m-auto" style="width:100%">
            <div class="col-12 p-0">
                <button type="button" name="button" class="btn btn-purple btn-sm m-0 mb-1 float-right btnFiltersMobile"><i class="fas fa-search"></i> Buscar</button>
            </div>
        </div>
        <div class="row m-auto" style="width:100%">

            <div class="col-lg-8 col-xl-9 mb-4 px-0">
                <div class="card">
                    <div class="card-body">
                       {{-- <h5 class="text-center text-green">Artículos </h5> --}}
                        @if (request()->titulo != null and request()->titulo != 'Todas')
                        <h6 style="display:" class="showSearch">Título: <span class="text-secondary textShowSearch">{{request()->titulo}}</span></h6>

                        @endif
                        <div class="form-inline mb-3">
                            @if (request()->categoria != null and request()->categoria != 'Todas')
                                <h6 style="display:" class="showCategory">Categoría: <span class="textShowCategory text-secondary">{{request()->categoria}}</span></h6>
                            @else
                                <h6 style="display:none" class="showCategory">Categoría: <span class="textShowCategory text-secondary"></span></h6>
                            @endif

                            @if (request()->tag != null and request()->tag != 'Todas')
                                <h5 style="display:" class="ml-5 showTag">Tag: <span class="textShowTag text-secondary">{{request()->tag}}</span></h5>
                            @else
                                <h5 style="display:none" class="ml-5 showTag">Tag: <span class="textShowTag text-secondary"></span></h5>
                            @endif
                        </div>

                            <div class="row articlesList m-auto" style="width:100%">
                                @if($articles->first() == null)
                                    <div class="col-12">
                                        <h6 class="text-center text-purple"><i class="fas fa-exclamation-circle"></i> No se encontraron resultados</h6>
                                    </div>
                                @else
                                   @foreach ($articles as $key => $article)
                                       <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-1 px-1">
                                           <a href="{{route('article',$article->id)}}">
                                           <div class="card cardArticle show-title-complete" style="height:100%;">
                                               <div class="card-header p-1 border-g">
                                                   <img style="" class="" src="{{asset($article->imageP)}}" alt="">
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
                                @endif

                            </div>


                    </div>
                    <div class="card-footer text-green bg-white">
                        Página nro {{$articles->currentPage()}} de
                        <input type="hidden" name="" value="{{$articles->currentPage()}}" class="form-control" id="numberPage">
                        {{$articles->lastPage()}}
                        <span class="pagination float-right">{{{ $articles->links() }}}</span>
                    </div>
                </div>
            </div>

            {{-- MAIN --}}
            <div class="col-lg-4 col-xl-3 px-1 filtersLG">
                <div class="card">
                    <div class="card-body">
                       <h6 class="text-green-l"> Filtros</h6>
                       <form  class="" action="{{url('articulos')}}" method="get" id="formSearchPost">

                          <div class="row m-auto" style="width:100%">
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
                              <span class="font600">Todas </span><span class="bg-green-l float-right text-center" style="border-radius:20px;width:20px">{{$articlesCount}}</span> 
                           </div>

                        </div>
                    </div>
                @endif


            </div>
            <br>
            <br>


        </div>


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