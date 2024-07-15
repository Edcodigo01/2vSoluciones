{{-- este div opaca el modal anterior  --}}

<div class="modal fade" id="modalEditService" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="z-index:2500;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form class="formProject validate6" action="" method="put" id="form-update-service">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="text-white"><i class="fas fa-list"></i> Editar Servicio del Proyecto</span> </h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">

                        <div class="form-inline">
                            <select name="type" class="form-control required selectService" id="selectServiceEdit">
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

                        <div class="inputsAddService inputsEditService">



                        </div>

                    </div>
                </div>

            </div>
            <div class="modal-footer">


                <button type="button" class="btn btn-secondary" name="button" onclick="cancelModal('#modalEditService','#form-update-service');$('#bgObscure').hide();">Cancelar</button>
                <button type="sumbmit" class="btn btn-success mr-2" name="button">Guardar</button>
            </div>
        </div>
        </form>
    </div>
</div>
