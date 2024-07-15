
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="all_project_client" style="overflow-y: scroll">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h4 class="text-white font600"><i class="fas fa-list"></i> Proyectos de <span id="clientOwner"> </span> </h4>

            </div>
            <form class="formula validate4 form-add" action="{{route('proyectos.store')}}" method="post">
                <div class="modal-body">

                    <table class="listar_proyectos table table-bordered"  data-update="clientes/servicios-de-proyecto/{id}" id="listar_proyectos" style="width:100%">

                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Acciones</th>

                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" name="button" onclick="cancelModal('#modalAdd','#add');$('#table-project-services').DataTable().clear().destroy();$('#bgObscure').hide();">Cancelar</button>
                    <button type="sumbmit" class="btn btn-primary mr-2" name="button">Guardar</button>
                </div>
            </form>
        </div>

    </div>
</div>
