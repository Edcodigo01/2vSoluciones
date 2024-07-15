<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modalCreate">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h4 class="text-white"><i class="fas fa-video"></i> Agregar Video</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" data-toggle="tooltip" data-placement="top" title="Minimizar">
            <span aria-hidden="true"><i class="fas fa-minus"></i></span>
        </button>

      </div>
      <form class="formula validate" action="{{route('administrar-videos.store')}}" method="post" id="uploadVideo">
      <div class="modal-body">
          <div class="row">
              <div class="col-lg-4 form-group">
                 <label for="" class="font600">Título:<span class="text-red">*</span></label>
                 <input type="text" name="title" value="" class="form-control  required" maxlength="100">
              </div>
              <div class="col-lg-4 form-group">
                 <label for="" class="font600">Url del video de Youtube:<span class="text-red">*</span></label>
                 <input type="text" name="url" value="" class="form-control  required videoUrl" maxlength="255">
              </div>

              {{-- <div class="col-12 form-group">
                 <label for="" class="font600">Descripción:</label>
                 <textarea name="description" rows="4" cols="40" maxlength="999" class="form-control"></textarea>
              </div> --}}
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class=" btn btn-secondary btn-lg" name="button" onclick="cancelModal('#modalCreate','#uploadVideo');">Cancelar</button>
        <button type="sumbmit" class="btn btn-primary btn-lg mr-2" name="button">Guardar</button>
      </div>
    </form>
    </div>
  </div>
</div>
