
$(document).ready(function() {
    if($('#data').length > 0){
        data = $('#data').val();
        data = JSON.parse(data);
        listar(data,'no');
        $('#data').val('');
    }

});

function updateTable(){


    var tableId = $('.listar').attr('id');
    var route = $('.listar').attr('data-route');
    filtro1 = '';
    filtro2 = '';
    filtro3 = '';
    filtro4 = '';
    filtro5 = '';

    if ( $("#filtro1").length > 0 ){
        var filtro1 = $("#filtro1").val();
    }else if ($("#filtroModal1").length > 0) {
        var filtro1 = $("#filtroModal1").val();
    }

    if ( $("#filtro2").length > 0 ){
        var filtro2 = $("#filtro2").val();
    }else if ($("#filtroModal2").length > 0) {
        var filtro2 = $("#filtroModal2").val();
    }
    if ( $("#filtro3").length > 0 ){
        var filtro3 = $("#filtro3").val();
    }else if ($("#filtroModal3").length > 0) {
        var filtro3 = $("#filtroModal3").val();
    }

    if ( $("#filtro4").length > 0 ){
        var filtro4 = $("#filtro4").val();
    }else if ($("#filtroModal4").length > 0) {
        var filtro4 = $("#filtroModal4").val();
    }

    if ( $("#filtro5").length > 0 ){
        var filtro5 = $("#filtro5").val();
    }else if ($("#filtroModal5").length > 0) {
        var filtro5 = $("#filtroModal5").val();
    }
    
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        method:'get',
        url:route,
        data:{filtro1:filtro1,filtro2:filtro2,filtro3:filtro3,filtro4:filtro4,filtro5:filtro5},
        error:function(error){

            console.log(error);
            warning('Hubo un error al traer los datos de la tabla.');
        },
        success:function(result){
            listar(result,'si');
        },
    });
}

function listar(data,update){
  var tableId = $('.listar').attr('id');
  var routeUpdate = $('.listar').attr('data-update');
  var routeDisabled = $('.listar').attr('data-routeDisable');
  var routeEnable = $('.listar').attr('data-routeEnable');
  let data_delete_table = $('.listar').attr('data-delete');

  var routeAdd = $('.listar').attr('data-routeAdd');

  if(update == 'si'){

      datatable.clear();
      datatable.rows.add(data);
      datatable.draw(false);
  }else{
      if(tableId == 'table-clients'){

        datatable = $('.listar').DataTable({
            responsive: true,
            dom: "<'fila' <<'float-right'f>l>>",
            "order": [[ 1, "desc" ]],
            "aLengthMenu": [[5,10,25,50,100, -1], [5,10,25,50,100, "All"]],
            "iDisplayLength": 10,

            "language": {
                "lengthMenu": "<div class='border bg-light p-1'><i class='fas fa-eye text-primary-light'></i> _MENU_</div>",
                "zeroRecords": "Sin datos registrados",
                "info": "<span class='text-primary-light'>Pagina _PAGE_ de _PAGES_</span>",
                "infoEmpty": "Sin datos registrados",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "search": '<button type="button" name="button" data-showModal="#modalCreate" data-form="#create" class="showModalCreate btn btn-primary float-right ml-1"><i class="fas fa-plus"></i> Nuevo</button><i class="fas fa-search text-primary-light"></i>'
            },
            data: data,
            "columns": [
              {data: 'id',},
              {render: function (data, type, dataRow) {
                  return '<div style="min-width:95px"><button type="button" class="editar btn btn-sm btn-success mr-1"><span class="fa fa-edit"></span><span class="hidden-xs"></span></button><button type="button" class="delete btn btn-sm btn-danger"><span class="fa fa-user-times"></span><span class="hidden-xs"></span></button><div>';
              }},
              {data: 'nameComplete',},
              {data: 'email',},
              {data: 'identification',},
              {render: function (data, type, dataRow) {
                  listProject = '';
                  number = 0;
                  $.each(dataRow.projects, function( index, project ) {
                      projectname = project.name.substring(0,10);
                      number = number + 1;
                      // if(number != 2){
                          listProject +='<div class="mb-1"><span class="font600">'+projectname+'</span><button type="button" class="float-right ml-1 btn btn-success btn-xs " onclick="viewProject('+dataRow+')"><i class="fas fa-eye"></i></button><button type="button" data-id="'+project.id+'" class="edit_project float-right ml-1 btn btn-info btn-xs"><i class="fas fa-edit"></i></button></div>';
                      // }
                      console.log(dataRow.id);
                  });
                  listProject = '<div style="widh:200px">'+listProject+'</div>'
                  if(number > 2){
                      btnTodos = '<button type="button" class="all_services btn btn-xs btn-secondary float-right mr-1 mt-1"><i class="fa fa-list"> Todos</i></button>';
                  }else{
                      btnTodos = '';
                  }
                  listProject = '<div style="width:200px;height:50px;overflow-y:auto">'+listProject+'</div>';
                  return listProject+'<button type="button" class="btn btn-xs btn-primary float-right mt-1" onclick="iniciarProyecto('+dataRow.id+')"><i class="fa fa-plus"> Nuevo</i></button>'+btnTodos;
              }},
              {data: 'phone1',},
            ],
        });
    }else if(tableId == 'table-emails-received'){
        datatable = $('.listar').DataTable({
            responsive: true,
            dom: "<'fila' <<'float-right'f>l>>",
            "order": [[ 1, "desc" ]],
            "aLengthMenu": [[5,10,25,50,100, -1], [5,10,25,50,100, "All"]],
            "iDisplayLength": 10,
            "language": {
                "lengthMenu": "<div class='border bg-light p-1'><i class='fas fa-eye text-primary-light'></i> _MENU_</div>",
                "zeroRecords": "Sin datos registrados",
                "info": "<span class='text-primary-light'>Pagina _PAGE_ de _PAGES_</span>",
                "infoEmpty": "Sin datos registrados",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "search": '<i class="fas fa-search text-primary-light"></i>'
            },
            data: data,
            "columns": [
              {data: 'id',},
              {data: 'email',},
              {data: 'whatsapp',},
              {data: 'affair',},

              {data: 'message',},
              {data: 'send',},
              {data: 'error',},

            ],
        });
    }else if(tableId == 'table-tags' || tableId == 'table-categories'){
        datatable = $('.listar').DataTable({
            responsive: true,
            dom: "<'fila' <<'float-right'f>l>>",
            "order": [[ 1, "desc" ]],
            "aLengthMenu": [[5,10,25,50,100, -1], [5,10,25,50,100, "All"]],
            "iDisplayLength": 10,
            "language": {
                "lengthMenu": "<div class='border bg-light p-1'><i class='fas fa-eye text-primary-light'></i> _MENU_</div>",
                "zeroRecords": "Sin datos registrados",
                "info": "<span class='text-primary-light'>Pagina _PAGE_ de _PAGES_</span>",
                "infoEmpty": "Sin datos registrados",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "search": '<button type="button" name="button" data-showModal="#modalCreate" data-form="#create" class="showModalCreate btn btn-primary float-right ml-1"><i class="fas fa-plus"></i> Nuevo</button><i class="fas fa-search text-primary-light"></i>'
            },
            data: data,
            "columns": [
              {data: 'id',},
              {render: function (data, type, dataRow) {
                  let data_delete = data_delete_table.replace('{id}',dataRow.id);
                  if(dataRow.disabled == 'si'){
                      return '<div style="min-width:95px"><button type="button" class="editar btn btn-sm btn-success"><span class="fa fa-edit"></span><span class="hidden-xs"></span></button><button type="button" class="enableRow btn btn-sm btn-primary ml-1"><i class="fas fa-check"></i><span class="hidden-xs"></span></button><div>';
                  }else{
                      return '<div style="min-width:95px"><button type="button" class="editar btn btn-sm btn-success"><span class="fa fa-edit"></span><span class="hidden-xs"></span></button>'+
                      '<button type="button" data-url="'+data_delete+'" class="show_modal_delete_p btn btn-sm btn-danger ml-1"><span class="fa fa-times"></span><span class="hidden-xs"></span></button><div>';
                  }

              }},
              {data: 'name',},

            ],
        });
    }else if(tableId == 'table-services'){
        datatable = $('.listar').DataTable({
            responsive: true,
            dom: "<'fila' <<'float-right'f>l>>",
            "order": [[ 1, "desc" ]],
            "aLengthMenu": [[5,10,25,50,100, -1], [5,10,25,50,100, "All"]],
            "iDisplayLength": 10,
            "language": {
                "lengthMenu": "<div class='border bg-light p-1'><i class='fas fa-eye text-primary-light'></i> _MENU_</div>",
                "zeroRecords": "Sin datos registrados",
                "info": "<span class='text-primary-light'>Pagina _PAGE_ de _PAGES_</span>",
                "infoEmpty": "Sin datos registrados",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "search": '<button type="button" name="button" data-showModal="#modalCreate" data-form="#create" class="showModalCreate btn btn-primary float-right ml-1"><i class="fas fa-plus"></i> Nuevo</button><i class="fas fa-search text-primary-light"></i>'
            },
            data: data,
            "columns": [
              {data: 'id',},
              {render: function (data, type, dataRow) {
                  return '<div style="min-width:95px"><button type="button" class="editar btn btn-sm btn-success mr-1"><span class="fa fa-edit"></span><span class="hidden-xs"></span></button><button type="button" class="delete btn btn-sm btn-danger"><span class="fa fa-user-times"></span><span class="hidden-xs"></span></button><div>';
              }},
              {data: 'name',},
              {data: 'price',},
            ],
        });
    }else if(tableId == 'table-articles'){
        datatable = $('.listar').DataTable({
            responsive: true,
            dom: "<'fila' <<'float-right'f>l>>",
            "order": [[ 1, "desc" ]],
            "aLengthMenu": [[5,10,25,50,100, -1], [5,10,25,50,100, "All"]],
            "iDisplayLength": 10,
            "language": {
                "lengthMenu": "<div class='border bg-light p-1'><i class='fas fa-eye text-primary-light'></i> _MENU_</div>",
                "zeroRecords": "Sin datos registrados",
                "info": "<span class='text-primary-light'>Pagina _PAGE_ de _PAGES_</span>",
                "infoEmpty": "Sin datos registrados",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "search": '<button onclick="autorArticle()" type="button" name="button" data-showModal="#modalCreate" data-form="#create" class="showModalCreate btn btn-primary float-right ml-1"><i class="fas fa-plus"></i> Nuevo</button><i class="fas fa-search text-primary-light"></i>'
            },
            data: data,
            "columns": [
              {data: 'id',},
              {render: function (data, type, dataRow) {
                    let data_delete = data_delete_table.replace('{id}',dataRow.id);
                    return '<div style="min-width:140px"><button type="button" class="editar btn btn-sm btn-success mr-1"><span class="fa fa-edit"></span><span class="hidden-xs"></span></button><a target="_blank" href="articulo/'+dataRow.id+'" class="ver btn btn-sm btn-info mr-1"><span class="fa fa-eye"></span><span class="hidden-xs"></span></a>'+
                    '<button data-url="'+data_delete+'" type="button" class="show_modal_delete_p btn btn-sm btn-danger"><span class="fa fa-times"></span></span></button><div>';


              }},
              {data: 'title'},
              {data: 'autor'},
            ],
        });
      }
      edit_row('#'+tableId+' tbody', datatable, routeUpdate);
      edit_project('#'+tableId+' tbody', datatable, routeUpdate);
      disabled_row('#'+tableId+' tbody', datatable, routeDisabled);
      delete_row('#'+tableId+' tbody', datatable, routeUpdate);
      all_services('#'+tableId+' tbody', datatable)
      enableRow('#'+tableId+' tbody', datatable, routeEnable);
  }

}

var enableRow = function(tbody, datatable, routeEnable){
    $(tbody).on("click","button.enableRow", function(){
        if(datatable.row(this).child.isShown()){
            var data = datatable.row(this).data();
            console.log(data);
        }else{
            var data = datatable.row($(this).parents("tr")).data();
            console.log(data);
        }
        route = routeEnable.replace('{id}',data.id);

        $("#formEnable").attr('action',route);
        $('#modalEnable').modal({backdrop: 'static', keyboard: false});
    });
}

var disabled_row = function(tbody, datatable, routeDisabled){
    $(tbody).on("click","button.disabled_row", function(){

        if(datatable.row(this).child.isShown()){
            var data = datatable.row(this).data();
            console.log(data);
        }else{
            var data = datatable.row($(this).parents("tr")).data();
            console.log(data);
        }

        url = routeDisabled.replace('{id}',data.id);

        $("#form-disabled").attr('action',url);

        $('#modalDisabled').modal({backdrop: 'static', keyboard: false});
    });
}

var delete_row = function(tbody, datatable, routeUpdate){
    $(tbody).on("click","button.delete", function(){
        if(datatable.row(this).child.isShown()){
            var data = datatable.row(this).data();
            console.log(data);
        }else{
            var data = datatable.row($(this).parents("tr")).data();
            console.log(data);
        }
        url = routeUpdate.replace('{id}',data.id);

        $("#form-delete").attr('action',url);
        $('#modalDelete').modal({backdrop: 'static', keyboard: false});
    });
}
var edit_project = function(tbody, datatable){
    showLoader();
    routeUpdateProject = 'proyectos/{id}';
    $(tbody).on("click","button.edit_project", function(){
        if(datatable.row(this).child.isShown()){
            var data = datatable.row(this).data();
            console.log(data);
        }else{
            var data = datatable.row($(this).parents("tr")).data();
            console.log(data);
        }
        project_id = $(this).attr('data-id');
        route = 'proyectos/{id}/edit';
        route = route.replace('{id}',project_id);

        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            method:'get',
            url:route,
            error:function(error){
                console.log(error);
                warning('Hubo un error al hacer la petición.');
                hideLoader();
            },
            success:function(result){
                console.log(result);
                if(result.result == 'error'){
                    warning(result);
                }else if (result.result == 'ok') {
                    // $('#bgObscure').show();
                    listarServicios(result.services,'no','si');
                    routeUpdateProject = routeUpdateProject.replace('{id}',data.id);
                    $("#form-edit-project").attr('action',routeUpdateProject);
                    $("#UserProjectEdit").html(data.nameComplete);
                    project = result.project;
                    $("#form-edit-project").find('.form-control').each(function() {
                        var id = $(this).attr('id');
                        $(this).attr('disabled',false);
                        $(this).val(project[id]);
                    });
                    $('#modalEditProject').modal({backdrop: 'static', keyboard: false});
                }else {
                    warning('Hubo un error al solicitar los datos del projecto.');
                }
                hideLoader();
            },
        });
    });
}

var all_services = function(tbody, datatable){
    $(tbody).on("click","button.all_services", function(){
        if(datatable.row(this).child.isShown()){
            var data = datatable.row(this).data();
            console.log(data);
        }else{
            var data = datatable.row($(this).parents("tr")).data();
            console.log(data);
        }
        $('#clientOwner').html(data.nameComplete)
        listar_proyectos(data.projects,'no');
        console.log(data.projects);
        $('#all_project_client').modal({backdrop: 'static', keyboard: false});
        // $('#bgObscure').show();
    });
}

var edit_row = function(tbody, datatable, routeUpdate){
    // CKEDITOR.replaceClass = 'ckeditor2';
    $(tbody).on("click","button.editar", function(){
        if(datatable.row(this).child.isShown()){
            var data = datatable.row(this).data();
            console.log(data);
        }else{
            var data = datatable.row($(this).parents("tr")).data();
            console.log(data);
        }
        $(".form-update").find('.form-control').each(function() {
            var id = $(this).attr('id');
            if($(this).hasClass('ckeditor')){

                CKEDITOR.instances[id].setData(data[id]);
            }else if ($(this).hasClass('published')) {

                if(data[id] == 'si'){

                    $(this).addClass('text-danger');
                }else{
                    $(this).removeClass('text-danger');
                }
                $(this).val(data[id]);
            }else if ($(this).hasClass('multiple')) {
                console.log(data[id]);
                $(this).select2('destroy');
                // .find('option').prop('selected', 'selected').end().select2();
                $(this).find('option').each(function() {
                    $(this).prop("selected",false);
                    option = $(this);
                    value = $(this).attr('value');
                    $.each(data[id], function( index,val) {
                        console.log(val+' '+value);
                        if (val == value) {
                            $(option).prop("selected","selected");
                        }
                    });
                });
                $(this).select2();
            }else if ($(this).hasClass('inputFile')) {
                if(data[id] != undefined){
                    $(this).parents('.contentInputImg').find('.imagePreviewInput').attr('src',data[id]+'?'+Math.random());
                    $(this).parents('.contentInputImg').find('.updateDeleteImage').show();
                    $(this).parents('.contentInputImg').find('.btn-up').hide();
                }else{
                     $(this).parents('.contentInputImg').find('.imagePreviewInput').attr('src','public/images/default/image-default.jpg');
                    $(this).parents('.contentInputImg').find('.updateDeleteImage').hide();
                    $(this).parents('.contentInputImg').find('.btn-up').show();
                }
            }else if($(this).hasClass('dateTimeMax')){
                $(this).val(moment(data[id],'YYYY-MM-DD').format('DD-MM-YYYY'));
            }else if($(this).hasClass('datetime')){
                $(this).val(moment(data[id],'YYYY-MM-DD').format('DD-MM-YYYY'));

            }else if($(this).hasClass('default')){
                default2 = $(this).attr('data-default');
                $(this).val(default2);

            }else if($(this).hasClass('No')){
                $(this).val('No');
            }else{
                $(this).attr('disabled',false);
                $(this).val(data[id]);
            }
        });
        url = routeUpdate.replace('{id}',data.id);
        $(".form-update").attr('action',url);
        $('#modalEdit').modal({backdrop: 'static', keyboard: false});

    });
}



function listar_proyectos(data,update){
  var tableId = $('.listar_proyectos').attr('id');
  var routeUpdate = $('.listar_proyectos').attr('data-update');

  if(update == 'si'){
      datatable3.clear();
      datatable3.rows.add(data);
      datatable3.draw(false);
  }else{
        datatable3 = $('.listar_proyectos').DataTable({
            responsive: true,
            dom: "<'fila' <<'float-right'f>l>>",
            "order": [[ 0, "desc" ]],
            "aLengthMenu": [[5,10,25,50,100, -1], [5,10,25,50,100, "All"]],
            "iDisplayLength": 10,
            "language": {
                "lengthMenu": "<div class='border bg-light p-1'><i class='fas fa-eye text-primary-light'></i> _MENU_</div>",
                "zeroRecords": "Sin datos registrados",
                "info": "<span class='text-primary-light'>Pagina _PAGE_ de _PAGES_</span>",
                "infoEmpty": "Sin datos registrados",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "search": '<button type="button" name="button" data-showModal="#modalCreate" data-form="#create" class="showModalCreate btn btn-primary float-right ml-1"><i class="fas fa-plus"></i> Nuevo</button><i class="fas fa-search text-primary-light"></i>'
            },
              data: data,
              "columns": [
              {data: 'name',},
              {render: function (data, type, dataRow) {
                  return '<div style="min-width:95px"><button type="button" class="editar btn btn-sm btn-success mr-1"><span class="fa fa-edit"></span><span class="hidden-xs"></span></button><button type="button" class="delete btn btn-sm btn-danger"><span class="fa fa-user-times"></span><span class="hidden-xs"></span></button><div>';
              }},

            ],

        });
  }

}
