@if($videos->first() == null)
    <div class="alert alert-info mt-5" style="width: 100%;max-width:800px;margin:auto">
       <h5 class="text-center mt-2"><i class="fas fa-exclamation-triangle"></i> No ahí videos registrados </h5>
    </div>
@else

        <h5 style="display:none" class="showSearch">Busqueda: <span class="text-secondary textShowSearch"></span></h5>
            <div class="row">
                @foreach ($videos as $key => $video)

                        <div class="col-6 col-md-4 col-lg-3 mb-4" style="z-index:2000px">
                            <div class="card contentInput" style="height:100%">


                                <div class="card-header bg-green" style="min-height:60px;display:flex;align-items: center;">
                                    <p class="text-white font600 text-center" style="line-height:18px;margin:auto;">{!!$video->title!!}</p>

                                </div>
                                <div class="card-body disabled logoContent p-1 playVideo bg-green" style="position: relative">
                                    <input type="hidden" name="" value="{{$video->title}}" class="title">
                                    <input type="hidden" name="" value="{{$video->url}}" class="url">
                                    <input type="hidden" name="" value="{{$video->description}}" class="description">
                                    <input type="hidden" name="" value="{{$video->id}}" class="vide_id">
                                    <div class="logo-play" style="">
                                        <i class=" fas fa-play text-white" style="font-size:65px;margin:auto;"></i>
                                    </div>

                                        <img src="{{'https://img.youtube.com/vi/'.$video->url.'/0.jpg'}}" alt="" style="width:100%;height:100%">


                                </div>
                                <div class="card-footer mt-4">
                                    {{-- <button class=" btn btn-info btn-sm" style="position:absolute;bottom:5px;right:180px;"><i class="fas fa-eye"></i> Ver Video</button> --}}
                                    <button class="btn bg-danger btn-sm show_modal_delete_p" data-url="{{url('administrar-videos/'.$video->id)}}" style="position:absolute;bottom:5px;right:90px;"><i class="fas fa-times"></i> Eliminar</button>
                                    <button  class="btn bg-green btn-sm" onclick="showModalEdit(this)" style="position:absolute;bottom:5px;right:10px;"><i class="fas fa-edit"></i> Editar  </button>
                                </div>


                            </div>
                        </div>
                @endforeach

            </div>

            @if($videos->lastPage() != 1)
            <div class="card-footer bg-gradient font600 mb-4 p-3">
                <span class="pagination float-right">{{{ $videos->links() }}}</span>

                <input type="hidden" name="" value="{{$videos->currentPage()}}" class="form-control" id="numberPage">
                <h5 class="text-white">Página Nro. {{$videos->currentPage()}} de
                {{$videos->lastPage()}}</h5>

            </div>
            @endif
    @endif
