function iniciarProyecto(id){
    showLoader();
    var id = id;
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        method:'post',
        url:'iniciar-proyecto/'+id,
        error:function(error){
            console.log(error);
            warning('Hubo un problema al iniciar proyecto.');
            hideLoader();
        },
        success:function(result){
            console.log(result);
             $('#UserProjectCreate').html(result.user.nameComplete);
             $('#projectNameTemp').val(result.project.name);
             $('#proyectoTemp_id').val(result.project.id);
             $('#modalAdd').modal({backdrop: 'static', keyboard: false});
             data = {'service':'1','price':'2','priceF':'3'};
            listarServicios(data,'no');
            hideLoader();

        },
    });
}


function listarServicios(data,update,modalEdit){


  var routeUpdate = $('#table-project-services').attr('data-update');
  var routeUpdateService = $('#table-project-services').attr('data-updateService');
  var routeDeleteService = $('#table-project-services').attr('data-updateService');
  // alert(routeUpdateService);
  if(modalEdit == 'si'){
      if(update == 'si'){
              datatable3.clear();
              datatable3.rows.add(data);
              datatable3.draw(false);
      }else{
          tableId = 'table-project-services-edit';
            datatable3 = $('#table-project-services-edit').DataTable({
                responsive: true,
                  "dom": '<"clear">',
                "order": [[ 1, "desc" ]],
                "aLengthMenu": [[5,10,25,50,100, -1], [5,10,25,50,100, "All"]],
                "iDisplayLength": 10,
                "language": {
                    "lengthMenu": "<div class='border bg-light p-1'><i class='fas fa-eye text-primary-light'></i> _MENU_</div>",
                    "zeroRecords": "Sin Servicios Registrados",
                    "info": "<span class='text-primary-light'>Pagina _PAGE_ de _PAGES_</span>",
                    "infoEmpty": "Sin Servicios Registrados",
                    "infoFiltered": "(filtrado de _MAX_ registros totales)",
                },
                data: data,
                "columns": [
                    {data: 'name',},
                    {data: 'price',},
                    {data: 'priceAgreed',},
                    {render: function (data, type, dataRow) {
                        return '<button type="button" class="editar btn btn-sm btn-success mr-1"><span class="fa fa-edit"></span><span class="hidden-xs"></span></button><button type="button" class="delete btn btn-sm btn-danger"><span class="fa fa-times"></span><span class="hidden-xs"></span></button>';
                    }},
                ],
            });
            edit_service('#'+tableId+' tbody', datatable3, routeUpdateService);
            delete_service('#'+tableId+' tbody', datatable3, routeUpdateService);
      }
  }else{
      tableId = 'table-project-services';

      if(update == 'si'){
              datatable2.clear();
              datatable2.rows.add(data);
              datatable2.draw(false);
      }else{
            datatable2 = $('#table-project-services').DataTable({
                responsive: true,
                  "dom": '<"clear">',
                "order": [[ 1, "desc" ]],
                "aLengthMenu": [[5,10,25,50,100, -1], [5,10,25,50,100, "All"]],
                "iDisplayLength": 10,
                "language": {
                    "lengthMenu": "<div class='border bg-light p-1'><i class='fas fa-eye text-primary-light'></i> _MENU_</div>",
                    "zeroRecords": "Sin Servicios Registrados",
                    "info": "<span class='text-primary-light'>Pagina _PAGE_ de _PAGES_</span>",
                    "infoEmpty": "Sin Servicios Registrados",
                    "infoFiltered": "(filtrado de _MAX_ registros totales)",
                },
                data: data,
                "columns": [
                    {data: 'name',},
                    {data: 'price',},
                    {data: 'priceAgreed',},
                    {render: function (data, type, dataRow) {
                        return '<button type="button" class="editar btn btn-sm btn-success mr-1"><span class="fa fa-edit"></span><span class="hidden-xs"></span></button><button type="button" class="delete btn btn-sm btn-danger"><span class="fa fa-times"></span><span class="hidden-xs"></span></button>';
                    }},
                ],
            });

      }
      edit_service('#'+tableId+' tbody', datatable2, routeUpdateService);
      delete_service('#'+tableId+' tbody', datatable2, routeUpdateService);
  }
}

var edit_service = function(tbody, datatable, routeUpdateService){
    $(tbody).on("click","button.editar", function(){

        if(datatable.row(this).child.isShown()){
            var data = datatable.row(this).data();
            console.log(data);
        }else{
            var data = datatable.row($(this).parents("tr")).data();
            console.log(data);
        }
        // console.log();
        if(data.type == 'Adicional'){
            $("#selectServiceEdit").val('Adicional');
            inputs = '<div id="normal" class="row"><div class="col-9 form-group"><label for="">Nombre</label><input type="text" name="name" value="'+data.name+'" class="form-control  required" id="name"></div><div class="col-3 form-group"><label for="">Precio acordado</label><div class="decimalContent"><input type="hidden" name="hidden" value="" class="form-control decimalRespaldo"><input type="text" name="priceAgreed" value="'+data.priceAgreed+'" class="form-control   decimal required" id="priceAgreed"></div></div></div>';
            $(".inputsEditService").html(inputs);
        }else{
            $("#selectServiceEdit").val(data.service_id);
            inputs = '<div id="normal" class="row"><div class="col-6 form-group"><input type="text" name="service_id" value="'+data.service_id+'" class="form-control"><label for="">Nombre</label><input readonly type="text" name="name" value="'+data.name+'" class="form-control  required" id="name"></div><div class="col-3 form-group"><label for="">Precio</label><div class="decimalContent"><input type="hidden" name="hidden" value="" class="form-control decimalRespaldo"><input readonly type="text" name="price" value="'+data.price+'" class="form-control   decimal required" id="price"></div></div><div class="col-3 form-group"><label for="">Precio acordado</label><div class="decimalContent"><input type="hidden" name="hidden" value="" class="form-control decimalRespaldo"><input  type="text" name="priceAgreed" value="'+data.priceAgreed+'" class="form-control   decimal required" id="priceAgreed"></div></div></div>';
            $(".inputsEditService").html(inputs);
        }
        url = routeUpdateService.replace('{id}',data.id);
        $("#form-update-service").attr('action',url);
        $('#modalEditService').modal({backdrop: 'static', keyboard: false});
        $('#bgObscure').show();
});
}

var delete_service = function(tbody, datatable, routeDeleteService){

    $(tbody).on("click","button.delete", function(){
        if(datatable.row(this).child.isShown()){
            var data = datatable.row(this).data();
            console.log(data);
        }else{
            var data = datatable.row($(this).parents("tr")).data();
            console.log(data);
        }

        url = routeDeleteService.replace('{id}',data.id);


        $("#form-delete-service").attr('action',url);
        $("#text-form-delete-service").html('¿Estas Segur@ de eliminar este servicio del proyecto?');

        $('#modalDeleteService').modal({backdrop: 'static', keyboard: false});
        $('#bgObscure').hide();

    });
}

// Agregar Servicio
function modalAddService(idAusar){
    showLoader();
    $('#formAddService').find('.predeterminado').show();
    $('#formAddService').find('.adicional').hide();
    $('#formAddService').find('.serviceType').val('Predeterminado');
    var nameService = $('.nameService');
    nameService.attr('readonly',true);
    nameService.val();

    var priceService = $('.priceService');
    priceService.attr('readonly',true);
    priceService.val();

    var priceAgreedService = $('.priceAgreedService');
    priceAgreedService.attr('readonly',true);
    priceAgreedService.val();

    var project_id = $('#'+idAusar).val();

    $('#formAddService').find('.project_id_service').val(project_id);
    $('#modalAddService').modal({backdrop: 'static', keyboard: false});
    $('#bgObscure').show();

    hideLoader();

}

$(document).on("change", ".selectService", function(){
    showLoader();
    var value = $(this).val();


    var services = $("#servicesArray").val();
    console.log(services)
    services = JSON.parse(services);

    verifyExist = 0;
    $.each(services, function( index,service) {
        if(value == service.id){
            verifyExist = verifyExist + 1;
            serviceSelect = service;
        }
    });

    if(verifyExist != 0){
        var inputsPre = '<div class="row predeterminado"><div class="col-6 form-group"><input type="hidden" name="service_id" value="'+serviceSelect.id+'" class=""><label for="">Nombre</label><input readonly type="text" name="name" value="'+serviceSelect.name+'" class="form-control  nameService required"></div><div class="col-3 form-group"><label for="">Precio</label><div class="decimalContent"><input type="hidden" name="hidden" value="" class="form-control decimalRespaldo"><input readonly type="text" name="price" value="'+serviceSelect.price+'" class="form-control  priceService decimal required"></div></div><div class="col-3 form-group"><label for="">Precio acordado</label><div class="decimalContent"><input type="hidden" name="hidden" value="" class="form-control decimalRespaldo"><input type="text" name="priceAgreed" value="'+serviceSelect.price+'" class="form-control  priceAgreed decimal required"></div></div></div>';

        $(this).parents('.row').find('.inputsAddService').html(inputsPre);
        $(this).parents('.row').find('.inputsAddService').find('.row').find('.priceAgreed').select();

    }else if(value == 'Adicional'){

        var inputsAditional = '<div class="row predeterminado"><div class="col-9 form-group"><label for="">Nombre</label><input type="text" name="name" value="" class="form-control  nameService required"></div><div class="col-3 form-group"><label for="">Precio acordado</label><div class="decimalContent"><input type="hidden" name="hidden" value="" class="form-control decimalRespaldo"><input type="text" name="priceAgreed" value="" class="form-control  priceAgreedService decimal required"></div></div></div>';

        $(this).parents('.row').find('.inputsAddService').html(inputsAditional);

        $(this).parents('.row').find('.inputsAddService').find('.row').find('.nameService').focus();

    }

    hideLoader();

});

//FORMULARIOS
$(document).on('submit','.formProject', function(e){
    e.preventDefault();
    showLoader();
    form = $(this);
    form_method = $(this).attr('method');
    route = $(this).attr('action');
    form_data = $(this).serialize();

    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        method:form_method,
        url:route,
        data:form_data,
        error:function(error){
            console.log(error);
                lista = "";
                $.each(error.responseJSON.errors, function( index, value ) {
                    lista+='</li>'+value+'</li>'
                });
                warning('</ul>'+lista+'</ul>');
                hideLoader();
        },
        success:function(result){
            console.log(result);
            if(result.result == 'error'){
                warning(result.message);
                hideLoader();
                return;
            }

            if(result.result == 'ok'){
                if(form.attr('id') == 'formAddService'){
                    cancelModal('#modalAddService','#formAddService');
                }else if (form.attr('id') == 'form-update-service') {
                    cancelModal('#modalEditService','#form-update-service');
                }else if (form.attr('id') == 'form-delete-service') {
                    $('#modalDeleteService').modal('hide');
                }
                listarServicios(result.data,'si');
                $('#total').html(result.totalPrice);
                $('#totalAgreed').html(result.totalAgreed);
                $('#bgObscure').hide();
                success(result.message);
            }else{
                warning('No se pudo realizar petición');
                console.log(result);
            }

            hideLoader();
        }
    });
});
