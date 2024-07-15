@extends("layouts.index")
@section("content")

    {{-- background-image: url({{asset('public/images/default/libros.jpg')}}); --}}
    <div class="text-center paralax" style="background-image: url({{asset($article->imageP)}});">
        <div class="padding-title" style="background:rgba(36, 35, 35, 0.38)">

            <div class="bg-green mt-3 " style="width:60%;padding:10px;display: inline-block;">
                <h5 class="text-center text-white mt-1 titleArticle" ></i> {{$article->title}}</h5>
            </div>
        </div>

    </div>
    <div class="" id="scrollPaginate">

    </div>
    <div class="container2 mt-4">
        {{-- CONTENT --}}
        <div class="row">

            {{-- Filtro en mobile  --}}
            <div class="filterMdArticles" style="display:none">
                <div class="col-12 maxMdShow  mb-2" >
                    <div class="card">
                        <div class="card-header bg-gradient">
                            <h5 class="text-white"><i class="fas fa-filter"></i> Filtros Articulos</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6 col-md-4 col-lg-12">
                                    <label for="">Nombre</label>
                                    <input type="text" name="" value="" class="form-control form-control-sm filterSearch">
                                </div>
                                <div class="col-6 col-md-4">
                                    @if ($categories->first() != Null)
                                        <label for="">Categoría</label>
                                        <select class="form-control form-control-sm filterCategory" name="">
                                            @if(request()->categoria == Null)
                                                <option value="" selected>Todas</option>
                                                @foreach ($categories as $key => $value)
                                                    <option  value="{{$value->id}}">{{$value->name}}</option>
                                                @endforeach


                                            @else

                                                <option value="">Todas</option>
                                                @foreach ($categories as $key => $value)
                                                    @if (request()->categoria == $value->name)

                                                        <option  value="{{$value->id}}" selected>{{$value->name}}</option>
                                                    @endif
                                                @endforeach

                                            @endif
                                        </select>

                                    @endif
                                </div>
                                <div class="col-6 col-md-4">
                                    @if ($tags->first() != Null)
                                        <label for="">Etiqueta</label>
                                        <select class="form-control form-control-sm filterTag" name="">
                                            <option value="" selected>Todas</option>
                                            @foreach ($tags as $key => $value)
                                                <option value="{{$value->id}}">{{$value->name}}</option>
                                            @endforeach
                                            <option value=""></option>
                                        </select>
                                    @endif
                                </div>
                            </div>

                            <button type="button" name="button" class="deleteSearch ml-1 btn bg-purple text-white mt-2 float-right" style="display:none"><i class="fas fa-backspace"></i> </button>
                            <button type="button" name="button" class="searchArticles btn bg-green mt-2 float-right" ><i class="fas fa-search ml-1"></i> Buscar</button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Filtro en mobile FIN --}}
            <div class="col-lg-9 mb-4" id="viewAjax">
                <div class="card">

                    <div class="card-body">
                        <div class="col-12">
                            <a class="venobox maxMdHide" href="{{asset($article->imageP)}}" data-gall="myGallery">

                                <img src="{{asset($article->imageP)}}" alt="" style="" class="imageP">
                            </a>


                            <h5 class="mt-2" >{{$article->title}}</h5>
                            @if($article->category != Null)
                                <h6 class="text-purple">Categoria: <span class="text-secondary"> {{$article->category->name}} </span></h6>
                            @endif
                            <h6 class="text-purple">Autor: <span class="text-secondary"> {{$article->autor}} </span></h6>
                            <h6 class="text-purple">Fecha: <span class="text-secondary"> {{\Carbon\Carbon::parse($article->created_at)->format('d-m-Y')}} </span></h6>
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


                            <img src="{{asset($article->imageP)}}" alt="" class="imagePMobile maxMdShow">
                            <p>{!!$article->content!!}</p>


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
                @if ($articlesRelated->first() != Null)
                    {{-- en mobiles --}}
                    <div class="card mt-5 mb-4 mobileShow">
                        <div class="card-header bg-gradient">
                            <h5 class="text-white">Artículos Relacionados</h5>
                        </div>
                        <div class="card-body">
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                              <div class="carousel-inner">
                                  <input type="hidden" name="" value="{{$numberA = 0}}" class="form-control " >
                                  @foreach ($articlesRelated as $key => $article)
                                      <input type="hidden" name="" value="{{$numberA = $numberA + 1}}" class="form-control " >
                                      <div class="carousel-item @if($numberA == 1)active @endif container">

                                              <a href="{{route('article',$article->id)}}">
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

                                                      <button  class="btn bg-green btn-sm float-right" style="position:absolute;bottom:5px;right:10px;">Leer <i class="fas fa-arrow-right"></i> </button>
                                                  </div>
                                              </div>
                                              </a>

                                      </div>
                                  @endforeach



                              </div>
                              @if($articlesRelated->count() > 1)
                                  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon " aria-hidden="true"></span>
                                    <span class="sr-only">Anterior</span>
                                  </a>
                                  <a class="carousel-control-next text-danger" href="#carouselExampleControls" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Siguiente</span>
                                  </a>
                              @endif
                            </div>


                        </div>
                    </div>
                    {{-- Se muestra en pamtallas medias --}}
                    <div class=" mobileHide">
                        <div class="card mt-5 mb-2">
                            <div class="card-header bg-gradient">
                                <h5 class="text-white">Artículos Relacionados</h5>
                            </div>
                            <div class="card-body row">
                                @foreach ($articlesRelated as $key => $article)
                                    <div class="col-6 col-md-4 col-lg-3 mb-4" style="margin:0;padding:0">
                                        <a href="{{route('article',$article->id)}}">
                                            <div class="card" style="height:100%;">
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

                                                    <button class="btn bg-green btn-sm float-right" style="position:absolute;bottom:5px;right:10px;">Leer <i class="fas fa-chevron-right"></i> </button>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>

                @endif




            </div>


            {{-- MAIN --}}
            <div class="col-lg-3">
                <div class="card maxMdHide">
                    <div class="card-header bg-gradient">
                        <h5 class="text-white"><i class="fas fa-filter"></i> Filtros</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-4 col-lg-12">
                                <label for="">Nombre del Artículo</label>
                                <input type="text" name="" value="" class="form-control form-control-sm filterSearch">
                            </div>
                            <div class="col-12">
                                @if ($categories->first() != Null)
                                    <label for="">Categoría</label>
                                    <select class="form-control form-control-sm filterCategory" name="" >
                                        @if(request()->categoria == Null)
                                            <option value="" selected>Todas</option>
                                            @foreach ($categories as $key => $value)
                                                <option  value="{{$value->id}}">{{$value->name}}</option>
                                            @endforeach


                                        @else

                                            <option value="">Todas</option>
                                            @foreach ($categories as $key => $value)
                                                @if (request()->categoria == $value->name)

                                                    <option  value="{{$value->id}}" selected>{{$value->name}}</option>
                                                @else
                                                    <option  value="{{$value->id}}" >{{$value->name}}</option>
                                                @endif
                                            @endforeach

                                        @endif
                                    </select>

                                @endif
                            </div>
                            <div class="col-12">
                                @if ($tags->first() != Null)
                                    <label for="">Etiqueta</label>
                                    <select class="form-control form-control-sm filterTag" name="">
                                        <option value="" selected>Todas</option>
                                        @foreach ($tags as $key => $value)
                                            <option value="{{$value->id}}">{{$value->name}}</option>
                                        @endforeach
                                        <option value=""></option>
                                    </select>
                                @endif
                            </div>



                        <div class="col-12">
                            <button type="button" name="button" class="deleteSearch ml-1 btn bg-purple text-white mt-2 float-right" style="display:none"><i class="fas fa-backspace"></i> </button>
                            <button  type="button" name="button" class="searchArticles btn bg-green mt-2 float-right" ><i class="fas fa-search ml-1"></i> Buscar</button>
                        </div>
                        </div>
                    </div>

                </div>

                <div class="maxMdShow filterMdArticle mb-2">
                    <div class="card">
                        <div class="card-header bg-gradient">
                            <h5 class="text-white"><i class="fas fa-filter"></i> Filtros Articulos</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6 col-md-4 col-lg-12">
                                    <label for="">Nombre</label>
                                    <input type="text" name="" value="" class="form-control form-control-sm filterSearch">
                                </div>
                                <div class="col-6 col-md-4">
                                    @if ($categories->first() != Null)
                                        <label for="">Categoría</label>
                                        <select class="form-control form-control-sm filterCategory" name="">
                                            @if(request()->categoria == Null)
                                                <option value="" selected>Todas</option>
                                                @foreach ($categories as $key => $value)
                                                    <option  value="{{$value->id}}">{{$value->name}}</option>
                                                @endforeach


                                            @else

                                                <option value="">Todas</option>
                                                @foreach ($categories as $key => $value)
                                                    @if (request()->categoria == $value->name)

                                                        <option  value="{{$value->id}}" selected>{{$value->name}}</option>
                                                    @endif
                                                @endforeach

                                            @endif
                                        </select>

                                    @endif
                                </div>
                                <div class="col-6 col-md-4">
                                    @if ($tags->first() != Null)
                                        <label for="">Etiqueta</label>
                                        <select class="form-control form-control-sm filterTag" name="">
                                            <option value="" selected>Todas</option>
                                            @foreach ($tags as $key => $value)
                                                <option value="{{$value->id}}">{{$value->name}}</option>
                                            @endforeach
                                            <option value=""></option>
                                        </select>
                                    @endif
                                </div>
                            </div>

                            <button type="button" name="button" class="deleteSearch ml-1 btn bg-purple text-white mt-2 float-right" style="display:none"><i class="fas fa-backspace"></i> </button>
                            <button type="button" name="button" class="searchArticles btn bg-green mt-2 float-right" ><i class="fas fa-search ml-1"></i> Buscar</button>
                        </div>
                    </div>
                </div>

                @if($categories->first() != Null)
                    <div class="card mt-4">
                        <div class="card-header bg-gradient">
                            <h5 class="text-white"><i class="fas fa-list-alt"></i> Categorías</h5>
                        </div>
                        <input type="hidden" name="" value="{{$number = 0}}">
                        @foreach ($categories as $key => $category)

                            <input type="hidden" name="hidden" value="{{$number = $number + 1}}" >
                            <hr style="margin:0px;padding:0px">

                            <div class="categoryS" data-val="{{$category->id}}">
                                <span class="font600">{{$category->name}} </span><span class="bg-green float-right text-center" style="border-radius:20px;width:20px">{{$category->articles->where('status','Publicado')->count()}}</span>
                            </div>
                            <hr style="margin:0px;padding:0px">
                        @endforeach
                        <div class="categoryS" id="todos">
                            <span class="font600">Todos </span><span class="bg-green float-right text-center" style="border-radius:20px;width:20px">{{$articles->where('status','Publicado')->count()}}</span>
                        </div>

                    </div>
                @endif

                @if($tags->first() != Null)

                    <div class="card my-4">
                        <div class="card-header bg-gradient">
                            <h5 class="text-white">Etiquetas</h5>
                        </div>
                        <div class="card-body">
                            @foreach ($tags as $key => $tag)
                                <button type="button" name="button" class="tagS btn btn-sm bg-green ml-1 mt-1" value="{{$tag->id}}">{{$tag->name}}</button>
                            @endforeach
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
    <br>
    <br>
    <br>
@endsection
@section('scripts')
    <script type="text/javascript">
    function autorArticle(){
        value = $("#userAuth").val();
        $('.autorCreate').val(value);
    }

    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });

    $(document).on("click", ".pagination a", function(e){
        e.preventDefault();
        showLoader();
        var url = $(this).attr('href');
        if(!url.includes('articulos_ajax')){
            url = url.replace('articulos','articulos_ajax');
        }
        ajaxArticles(url);
    });
    </script>
@endsection
