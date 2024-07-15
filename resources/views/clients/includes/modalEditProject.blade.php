<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modalEditProject" style="overflow-y: scroll">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h4 class="text-white"><i class="fas fa-folder"></i> Editar Proyecto </span> </h4>

            </div>
            <form class="formula validate8 form-add" action="{{route('proyectos.store')}}" method="post" id="form-edit-project">
                <div class="modal-body">


                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="">Nombre del Proyecto</label>
                            <input type="text" name="name" value="" class="form-control required" id="nameProject">
                        </div>
                        <div class="col-sm-8">
                            <div class="float-right"><span class="font600">Cliente:</span> <span id="UserProjectEdit"></span></div>
                        </div>
                        <div class="col-12">
                            <h5>Servicios</h5>
                            <table class=" table table-bordered" data-route="list_clients" data-update="clientes/servicios-de-proyecto/{id}" data-delete="" data-updateService="servicios-de-proyecto/{id}" id="table-project-services-edit" style="width:100%">

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
                    <button type="button" class="btn btn-secondary" name="button" onclick="cancelModal('#modalEditProject','#form-edit-project');$('#table-project-services-edit').DataTable().clear().destroy();$('#bgObscure').hide();">Cancelar</button>
                    <button type="sumbmit" class="btn btn-primary mr-2" name="button">Guardar</button>
                </div>
            </form>
        </div>

    </div>
</div>
