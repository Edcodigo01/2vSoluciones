<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modalEdit">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h4 class="text-white"><i class="fas fa-list-alt"></i> Editar Caategoría</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" data-toggle="tooltip" data-placement="top" title="Minimizar">
            <span aria-hidden="true"><i class="fas fa-minus"></i></span>
        </button>

      </div>
      <form class="formula validate2 form-update" action="" method="put" id="update">
      <div class="modal-body">

          <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="" class="font600">Nombre:<span class="text-red">*</span></label>
                 <input type="text" name="name" value="" class="form-control  required" maxlength="90" id="name">
                </div>
              </div>


          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class=" btn btn-secondary " name="button" onclick="cancelModal('#modalEdit','#update');">Cancelar</button>
        <button type="sumbmit" class="btn btn-success  mr-2" name="button">Actualizar</button>
      </div>
    </form>
    </div>
  </div>
</div>
