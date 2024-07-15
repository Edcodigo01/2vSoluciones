<!-- Modal -->
<div class="modal fade modalDelete" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-exclamation-triangle mr-2"></i>Atención</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4 class="" style="color:red">¿Estas segur@ de Eliminar esta configuración de Evento?</h4>
            </div>
            <div class="modal-footer">
                <form action="" class="form-config-calendar form-create form-delete" method="DELETE" id="deleteEvent">
                    {{-- <input type="hidden" name="model_offline" value="" id="model-offline"> --}}
                    <input type="hidden" name="id_offline" value="" id="id-offline">
                    <input type="hidden" name="name" value="" id="name-offline">
                    <input type="hidden" name="lastName" value="" id="lastName-offline">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                    <button class="btn btn-danger" name="button"><i class="fas fa-exclamation-triangle"></i> Aceptar</button>
                </form>

            </div>
        </div>
    </div>
</div>
