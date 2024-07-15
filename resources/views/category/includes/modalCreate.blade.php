<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modalCreate">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="text-white"><i class="fas fa-list-alt"></i> Agregar Categoría</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" data-toggle="tooltip" data-placement="top" title="Minimizar">
                    <span aria-hidden="true"><i class="fas fa-minus"></i></span>
                </button>

            </div>
            <form class="formula validate" action="{{route('administrar-categorias.store')}}" method="post" id="create">
                <div class="modal-body">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="" class="font600">Nombre:<span class="text-red">*</span></label>
                                <input type="text" name="name" value="" class="form-control  required" maxlength="90">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class=" btn btn-secondary" name="button" onclick="cancelModal('#modalCreate','#create');">Cancelar</button>
                    <button type="sumbmit" class="btn btn-primary mr-2" name="button">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
