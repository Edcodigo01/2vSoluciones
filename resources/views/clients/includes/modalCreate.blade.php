<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modalCreate">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h2 class="text-white"><i class="fas fa-user"></i> Agregar Cliente</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" data-toggle="tooltip" data-placement="top" title="Minimizar">
            <span aria-hidden="true"><i class="fas fa-minus"></i></span>
        </button>

      </div>
      <form class="formula validate" action="{{route('clientes.store')}}" method="post" id="create">
      <div class="modal-body">

          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <label for="" class="font600">Correo:<span class="text-red">*</span></label>
                <input type="email" name="email" value="" class="form-control  required" maxlength="40">
              </div>
            </div>

            <div class="col-sm-4">
              <div class="form-group">
                <label for="" class="font600">Contraseña:<span class="text-red">*</span></label>
                <input type="password" name="password" value="" class="form-control  required" maxlength="40">
              </div>
            </div>


              <div class="col-sm-4">
                <div class="form-group">
                  <label for="" class="font600">Nombres:<span class="text-red">*</span></label>
                  <input type="text" name="name" value="" class="form-control  required" maxlength="40">
                </div>
              </div>

              <div class="col-sm-4">
                <div class="form-group">
                  <label for="" class="font600">Apellidos:<span class="text-red">*</span></label>
                  <input type="text" name="lastName" value="" class="form-control  required" maxlength="40">
                </div>
              </div>



              <div class="col-sm-4">
                <div class="form-group">
                  <label for="" class="font600">Tipo de Identificación:<span class="text-red">*</span></label>
                  <select class="form-control " name="typeIdentification">
                    <option value="Cedula" selected>Cedula</option>
                    <option value="Cedula">Pasaporte</option>
                  </select>
                </div>
              </div>

              <div class="col-sm-4">
                <div class="form-group">
                  <label for="" class="font600">Identificación:<span class="text-red">*</span></label>
                  <input type="number" name="identification" value="" class="form-control  required number maxNumber" maxlength="14">
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="" class="font600">Teléfono 1:<span class="text-red">*</span></label>
                  <input type="number" name="phone1" value="" class="form-control  required number maxNumber" maxlength="10">
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="" class="font600">Teléfono 2</label>
                  <input type="number" name="phone2" value="" class="form-control  number maxNumber" maxlength="10">
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="" class="font600">Universidad<span class="text-red">*</span></label>
                  <input type="text" name="university" value="" class="form-control  required" maxlength="70">
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="" class="font600">Carrera<span class="text-red">*</span></label>
                  <input type="text" name="career" value="" class="form-control  required" maxlength="50">
                </div>
              </div>
          </div>



      </div>
      <div class="modal-footer">
        <button type="button" class=" btn btn-secondary btn-lg" name="button" onclick="cancelModal('#modalCreate','#create');">Cancelar</button>
        <button type="sumbmit" class="btn btn-primary btn-lg mr-2" name="button">Guardar</button>
      </div>
    </form>
    </div>
  </div>
</div>
