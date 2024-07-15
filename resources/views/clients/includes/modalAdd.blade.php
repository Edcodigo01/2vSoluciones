
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modalAdd" style="overflow-y: scroll">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h4 class="text-white"><i class="fas fa-folder"></i> Crear Proyecto </span> </h4>

            </div>
            <form class="formula validate4 form-add" action="{{route('proyectos.store')}}" method="post" id="add">
                <div class="modal-body">
                    <input type="hidden" name="project_id" value="" id="proyectoTemp_id">

                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="">Nombre del Proyecto</label>
                            <input type="text" name="name" value="" class="form-control required" id="projectNameTemp">
                        </div>
                        <div class="col-sm-8">
                            <div class="float-right"><span class="font600">Cliente:</span> <span id="UserProjectCreate"></span></div>
                        </div>
                        <div class="col-12">
                            <h5>Servicios</h5>
                            <table class=" table table-bordered" data-route="list_clients" data-update="clientes/servicios-de-proyecto/{id}" data-delete="" data-updateService="servicios-de-proyecto/{id}" id="table-project-services" style="width:100%">

                                <thead>
                                    <tr>
                                        <th>Servicio</th>
                                        <th>Precio</th>
                                        <th>Precio Final</th>
                                        <th style="width:50px">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>

                            <button onclick="modalAddService('proyectoTemp_id')" type="button" name="button" class="float-right btn btn-success btn-sm mt-2"><i class="fas fa-plus"></i> Servicio</button>


                        </div>
                        <div class="col-12 mt-4">
                            <div style="max-width:400px" class="card float-right">
                                <div class="card-header">
                                    <h5>Acord.</h5>
                                </div>
                                <div class="card-body">
                                    <h5 id="totalAgreed">0,00</h5>

                                    </div>
                            </div>
                            <div style="max-width:400px" class="card float-right">
                                <div class="card-header">
                                    <h5 class="total">Total</h5>
                                </div>
                                <div class="card-body">
                                    <h5 id="total">0,00</h5>

                                </div>
                            </div>

                        </div>

                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" name="button" onclick="cancelModal('#modalAdd','#add');$('#table-project-services').DataTable().clear().destroy();$('#bgObscure').hide();">Cancelar</button>
                    <button type="sumbmit" class="btn btn-primary mr-2" name="button">Guardar</button>
                </div>
            </form>
        </div>

    </div>
</div>
