{{-- este div opaca el modal anterior  --}}

<div class="modal fade" id="modalAddService" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="z-index:2500;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form class="formProject validate5" action="{{route('servicios-de-proyecto.store')}}" method="post" id="formAddService">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="text-white"><i class="fas fa-list"></i> Agregar Servicio a Proyecto</span> </h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="text" name="project_id" value="" class="project_id_service">

                <div class="row">
                    <div class="col-6">

                        <div class="form-inline">
                            <select name="type" class="form-control required selectService">
                                <option value="">Seleccione Servicio</option>
                                <option value="Adicional">Adicional</option>

                                @foreach ($services as $key => $service)
                                    <option value="{{$service->id}}">{{$service->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-12 mt-4">
                        {{-- determina si es adicional --}}

                        <div class="inputsAddService">


                            <div id="normal" class="row">
                                <div class="col-6 form-group">
                                    <label for="">Nombre</label>
                                    <input type="text" name="name" value="" class="form-control  required" readonly>
                                </div>
                                <div class="col-3 form-group">
                                    <label for="">Precio</label>

                                    <div class="decimalContent">
                                        <input type="hidden" name="hidden" value="" class="form-control decimalRespaldo">
                                        <input type="text" name="price" value="" class="form-control   decimal required" readonly>
                                    </div>
                                </div>
                                <div class="col-3 form-group">
                                    <label for="">Precio acordado</label>
                                    <div class="decimalContent">
                                        <input type="hidden" name="hidden" value="" class="form-control decimalRespaldo">
                                        <input type="text" name="priceAgreed" value="" class="form-control   decimal required" readonly>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" name="button" onclick="cancelModal('#modalAddService','#formAddService');$('#bgObscure').hide();">Cancelar</button>
                <button type="sumbmit" class="btn btn-success mr-2" name="button">Guardar</button>
            </div>
        </div>
        </form>
    </div>
</div>
