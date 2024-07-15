<div class="card">
    <div class="card-header bg-gradient">
        <h3 class="text-center text-white titleArticle" >Artículos </h3>

    </div>
    <div class="card-body">
        <h5 style="display:none" class="showSearch">Busqueda: <span class="text-secondary textShowSearch"></span></h5>
        <div class="form-inline mb-3">
            @if (request()->categoria != null)
                <h4 style="display:" class="showCategory">Categoría: <span class="textShowCategory text-secondary">{{request()->categoria}}</span></h4>
            @else
                <h4 style="display:none" class="showCategory">Categoría: <span class="textShowCategory text-secondary"></span></h4>
            @endif


            <h4 style="display:none" class="ml-5 showTag">Tag: <span class="textShowTag text-secondary"></span></h4>

        </div>
        <div >
            <div class="row">
                @if($articles->first() == null)
                    <div class="col-12">
                        <h5 class="text-center text-danger"><i class="fas fa-exclamation-circle"></i> Sin resultados para mostrar</h5>
                    </div>
                @else
                    @foreach ($articles as $key => $article)

                        <div class="col-6 col-md-4 col-lg-4 mb-4" style="margin:0;padding:2px">
                            <a href="{{route('article',$article->id)}}">
                                <div class="card" style="height:100%;">
                                    <div class="card-header">
                                        <img style="object-fit:cover;border:solid 1px rgb(181, 178, 182);height:150px;width:100%" class="popular-course-thumb bg-img" src="{{asset($article->imageP)}}" alt="">
                                    </div>
                                    <div class="card-body bg-danger">
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
                @endif

            </div>

        </div>
    </div>
    <div class="card-footer text-green font600">
        Página nro {{$articles->currentPage()}} de
        <input type="hidden" name="" value="{{$articles->currentPage()}}" class="form-control" id="numberPage">
        {{$articles->lastPage()}}
        <span class="pagination float-right">{{{ $articles->links() }}}</span>
    </div>
</div>
