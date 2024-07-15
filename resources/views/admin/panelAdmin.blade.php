@extends("layoutsAdmin.index")
@section('title')
    Panel Administración
@endsection

@section("content")

    <div class=" mt-5">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-">Panel de Administración</h2>
                </div>
                <div class="card-body">
                    <div class=" row text-center">

                        <div class="col-md-6 mb-3" >
                            <div class="card mb-3" style="height:100%">

                                    <div class="card-body text-center">

                                        <a href="{{route('administrar-articulos.index')}}" class="btn btn-lg bg-green  m-2 px-5">
                                            <h1 class=""><i class="fas fa-book-open text-white"></i> </h1>

                                            Artículos
                                        </a>

                                        <a class="btn m-2 bg-green text-white" href="{{route('administrar-categorias.index')}}">Categorías</a>
                                        {{-- <a class="btn bg-green text-white m-2" href="{{route('administrar-etiquetas.index')}}">Etiquetas</a> --}}

                                    </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3" >
                            <div class="card mb-3" style="height:100%;">

                                    <div class="card-body" style="display:flex;align-items:center;justify-content: center;">

                                        <a href="{{route('administrar-videos.index')}}" class="btn btn-lg px-5 bg-green">
                                            <h1 class=""><i class="fas fa-video text-white"></i> </h1>
                                            Videos
                                        </a>


                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>



@endsection
