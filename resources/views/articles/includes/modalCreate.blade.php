<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modalCreate">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h4 class="text-white"><i class="fas fa-list"></i> Agregar artículo</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" data-toggle="tooltip" data-placement="top" title="Minimizar">
            <span aria-hidden="true"><i class="fas fa-minus"></i></span>
        </button>

      </div>
       <form class="form-file validateH" action="{{route('administrar-articulos.store')}}" method="post" id="create">
      <div class="modal-body">

              <div class="row">

                  <div class="col-md-6 form-group">
                      <label for="">título</label>
                      <input type="text" name="title" value="" class="form-control required">
                  </div>
                  <div class="col-md-3 form-group">
                      <label for="">Autor</label>
                      <input type="text" name="autor" value="" class="form-control required autorCreate noVaciar">
                  </div>
                  {{-- <div class="col-md-3 form-group">
                      <label for="">Estado</label>
                      <select class="form-control published" name="disabled">

                          <option value="no">Publicado</option>
                          <option value="si">No Publicado</option>
                      </select>
                  </div> --}}
                  <div class="col-md-3 form-group">
                      <label for="">Categoría</label>

                          <select class="form-control published select required" name="category_id">
                              <option selected="selected" value="">Seleccione una Opción</option>
                                @foreach ($categories as $key => $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach

                          </select>

                  </div>


                  {{-- <div class="col-md-9">
                      <label for="">Etiquetas</label>

                      <select class="js-example-basic-multiple form-control select2" name="tags[]" multiple="multiple" style="width:100%">
                          @foreach ($tags as $key => $tag)
                              <option value="{{$tag->id}}">{{$tag->name}}</option>
                          @endforeach
                      </select>
                  </div> --}}
                  <div class="col-12 form-group">
                      <label for="">Contenido</label>
                      <textarea name="content" rows="4" cols="40" class="form-control ckedit" id="contentCreate"></textarea>
                  </div>

                  <div class="col-2 text-center">
                      <label for="">Imagen <span class="text-danger">*</span></label>
                      <div class="contentInputImg" style="max-width:300px;max-height:200px">
                          <div class="mb-1">
                              <img src="{{ asset('public\images\default\image-default.jpg') }}" class="imagePreviewInput" width="100%;" style="height:100px;object-fit:contain">
                          </div>
                          <div class="updateDeleteImage" style="display:none">
                              <button type="button" name="button" class="btn btn-success btn-file btn-block"><i class="fas fa-sync-alt mr-1"></i>Cambiar</button>
                          </div>
                          <button type="button" name="button" class="btn btn-primary btn-file btn-block btn-up"><i class="fas fa-upload mr-1"></i>Subir Imagen</button>
                          <input type="file" name="imageP" class="inputFile required imageP form-control" style="display:none">
                      </div>
                  </div>
                  {{-- <div class="col-2 text-center">
                      <label for="">Imagen Adicional 1</label>
                      <div class="contentInputImg" style="max-width:300px;max-height:200px">
                          <div class="mb-1">
                              <img src="{{ asset('public\images\default\image-default.jpg') }}" class="imagePreviewInput">
                          </div>

                            <div class="updateDeleteImage" style="display:none">
                                <button type="button" name="button" class="btn btn-success btn-file"><i class="fas fa-sync-alt mr-1"></i>Cambiar</button>
                                <button type="button" name="button" class="btn btn-danger float-right btn-dtFile">x</button>
                            </div>
                          <button type="button" name="button" class="btn btn-primary btn-file btn-block btn-up"><i class="fas fa-upload mr-1"></i>Subir Imagen</button>

                          <input type="hidden" name="deleteImageA1" value="" class="form-control inputDtImage">
                          <input type="file" name="imageA1" class="inputFile form-control imageA1" style="display:none">
                      </div>
                  </div>
                  <div class="col-2 text-center">
                      <label for="">Imagen Adicional 2</label>
                      <div class="contentInputImg" style="max-width:300px;max-height:200px">
                          <div class="mb-1">
                              <img src="{{ asset('public\images\default\image-default.jpg') }}" class="imagePreviewInput">
                          </div>

                            <div class="updateDeleteImage" style="display:none">
                                <button type="button" name="button" class="btn btn-success btn-file"><i class="fas fa-sync-alt mr-1"></i>Cambiar</button>
                                <button type="button" name="button" class="btn btn-danger float-right btn-dtFile">x</button>
                            </div>
                          <button type="button" name="button" class="btn btn-primary btn-file btn-block btn-up"><i class="fas fa-upload mr-1"></i>Subir Imagen</button>

                          <input type="hidden" name="deleteImageA2" value="" class="form-control inputDtImage">
                          <input type="file" name="imageA2" class="inputFile form-control imageA2" style="display:none">
                      </div>
                  </div>
                  <div class="col-2 text-center">
                      <label for="">Imagen Adicional 3</label>
                      <div class="contentInputImg" style="max-width:300px;max-height:200px">
                          <div class="mb-1">
                              <img src="{{ asset('public\images\default\image-default.jpg') }}" class="imagePreviewInput">
                          </div>

                            <div class="updateDeleteImage" style="display:none">
                                <button type="button" name="button" class="btn btn-success btn-file"><i class="fas fa-sync-alt mr-1"></i>Cambiar</button>
                                <button type="button" name="button" class="btn btn-danger float-right btn-dtFile">x</button>
                            </div>
                          <button type="button" name="button" class="btn btn-primary btn-file btn-block btn-up"><i class="fas fa-upload mr-1"></i>Subir Imagen</button>

                          <input type="hidden" name="deleteImageA3" value="" class="form-control inputDtImage">
                          <input type="file" name="imageA3" class="inputFile form-control imageA3" style="display:none">
                      </div>
                  </div>
                  <div class="col-2 text-center">
                      <label for="">Imagen Adicional 4</label>
                      <div class="contentInputImg" style="max-width:300px;max-height:200px">
                          <div class="mb-1">
                              <img src="{{ asset('public\images\default\image-default.jpg') }}" class="imagePreviewInput">
                          </div>

                            <div class="updateDeleteImage" style="display:none">
                                <button type="button" name="button" class="btn btn-success btn-file"><i class="fas fa-sync-alt mr-1"></i>Cambiar</button>
                                <button type="button" name="button" class="btn btn-danger float-right btn-dtFile">x</button>
                            </div>
                          <button type="button" name="button" class="btn btn-primary btn-file btn-block btn-up"><i class="fas fa-upload mr-1"></i>Subir Imagen</button>

                          <input type="hidden" name="deleteImageA4" value="" class="form-control inputDtImage">
                          <input type="file" name="imageA4" class="inputFile form-control imageA4" style="display:none">
                      </div>
                  </div> --}}
              </div>
      </div>
      <div class="modal-footer">
        <button type="button" class=" btn btn-secondary " name="button" onclick="cancelModal('#modalCreate','#create');">Cancelar</button>
        <button type="sumbmit" class="btn btn-primary  mr-2" name="button">Guardar</button>
      </div>
    </form>
    </div>
  </div>
</div>
