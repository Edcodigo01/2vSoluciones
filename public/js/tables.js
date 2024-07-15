function listar(tableClass,update){

  // Solo tabla suarios
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
  // alert(filtro4);

  // Solo tabla suarios
  tableId = $(tableClass).attr('id');
  route = $(tableClass).attr('data-route');
  routeEdit = $(tableClass).attr('data-edit');
  routeUpdate = $(tableClass).attr('data-update');
  routeDelete = $(tableClass).attr('data-delete');
  routeDisabled = $(tableClass).attr('data-disabled');
  routeEnable = $(tableClass).attr('data-enable');

  $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    method:'get',
    url:route,
    data:{filtro1:filtro1,filtro2:filtro2,filtro3:filtro3,filtro4:filtro4,filtro5:filtro5},
    error:function(error){
      // hideLoader();
      console.log(error);
      warning('Hubo un error al traer los datos de la tabla.');
    },
    success:function(result){
      data = result;
      console.log(data);
      if(update !== 'si'){
        modalCreate = '#modalCreate','#create';

        if(tableId === 'table-clients'){
          datatable = $(tableClass).DataTable({
              // "retrieve": true,
              // "processing": true,
              // "serverSide": true,
              "order": [[ 1, "desc" ]],
              "aLengthMenu": [[5,10,25,50,100, -1], [5,10,25,50,100, "All"]],
              "iDisplayLength": 10,
              "language": {
                  "lengthMenu": "<div class='border bg-white p-1'><i class='fas fa-eye text-primary-light pl-2 pr-2'></i> _MENU_</div> ",
                  "zeroRecords": "Sin datos registrados",
                  "info": "<span class='text-primary-light'>Pagina _PAGE_ de _PAGES_</span>",
                  "infoEmpty": "No records available",
                  "infoFiltered": "(filtrado de _MAX_ registros totales)",
                  "search": '<button onclick="showModal('+modalCreate+');" type="button" name="button" class="btn btn-primary float-right ml-2"><i class="fas fa-plus"></i> Nuevo</button><i class="fas fa-search text-primary-light"></i>'
              },
              data: data,
              "columns": [
                {render: function (data, type, dataRow) {

                    return '<div style="min-width:95px"><button type="button" id="" class="editar btn btn-sm btn-success mr-1"><span class="fa fa-edit"></span><span class="hidden-xs"></span></button><button type="button" class="delete btn btn-sm btn-danger"><span class="fa fa-user-times"></span><span class="hidden-xs"></span></button><div>';

                }},
                {data: 'name',},
                {data: 'lastName',},
                {data: 'email',},
                {data: 'created_at',},

              ],
          });

        }
      }
    }
  });

}
  //Editar
  var edit_row = function(tbody, datatable, routeEdit){

      $(tbody).on("click","button.editar", function(){
          if(datatable.row(this).child.isShown()){
              var data = datatable.row(this).data();
              console.log(data);
          }else{
              var data = datatable.row($(this).parents("tr")).data();
              console.log(data);
          }
          // opcion para inputs que se ocultan si tienen o no datos relacionados
          verifyDescriptionActivity(data);

          $(".form-update").find('.form-control').each(function() {
              var id = $(this).attr('id');

              if($(this).hasClass('signInputDropdown')){
                  result = data[id]

                  $(this).val(data[id]);
                  var publicImages = $('#publicImages').val();
                  $(this).parents('.form-group').find('.img-select-edit').attr('src',publicImages+'/Signo-'+data[id]+'.png');
                  if(result == 'Dragon'){
                      result = 'Dragón';
                  }
                  $(this).parents('.form-group').find('.name-sign').html(result);
              }else if($(this).hasClass('condtionText')){
                  $(this).html(data.condition);
              }else if($(this).hasClass('dateTimeMax')){
                  $(this).val(moment(data[id],'YYYY-MM-DD').format('DD-MM-YYYY'));
              }else if($(this).hasClass('datetime')){
                  $(this).val(moment(data[id],'YYYY-MM-DD').format('DD-MM-YYYY'));

              }else if($(this).hasClass('default')){
                  default2 = $(this).attr('data-default');
                  $(this).val(default2);

              }else if($(this).attr('id') == 'plan_id'){
                  $(this).val(data[id]);
                  if(data[id] != 1 && data[id] != '1'){
                      $(this).parents(".row").find(".startPlan").show();
                      $(this).parents(".row").find(".endPlan").show();
                  }else{
                      $(this).parents(".row").find(".startPlan").hide();
                      $(this).parents(".row").find(".endPlan").hide();
                  }

              }else if($(this).attr('id') == 'approved'){

                  if(data[id] == 'Si'){
                      $(this).val(data[id]);
                      $(this).attr('readonly',true);
                  }else{
                      $(this).attr('readonly',false);
                      $(this).val(data[id]);
                  }

              }else if($(this).hasClass('No')){
                  $(this).val('No');
              }else{
                  $(this).attr('disabled',false);
                  $(this).val(data[id]);
              }
          });

          $('.inputs-change-pass').hide();
          url = routeUpdate.replace('{id}',data.id);

          $(".form-update").attr('action',url);
          $('.modal-delete').modal('hide');
          $('#id-offline-edit').val(data.id);
          datetimeEdit();
          $('.modalEdit').modal('show');
      });
  }

  // Deshabilitar
  var disabled_row = function(tbody, datatable, routeDelete){
      $(tbody).on("click","button.disabled", function(){

          if(datatable.row(this).child.isShown()){
              var data = datatable.row(this).data();
              console.log(data);
          }else{
              var data = datatable.row($(this).parents("tr")).data();
              console.log(data);
          }
          url = routeDelete.replace('{id}',data.id);
          $('.form-delete').attr('action',url);
          $('.modal-delete').modal('show');
          $('.modal-edit').modal('hide');

      })
  }

  var enable_row = function(tbody, datatable, routeEnable){
      $(tbody).on("click","button.enable", function(){

          if(datatable.row(this).child.isShown()){
              var data = datatable.row(this).data();
              console.log(data);
          }else{
              var data = datatable.row($(this).parents("tr")).data();
              console.log(data);
          }

          url = routeEnable.replace('{id}',data.id);
          $('.modal').modal('hide');
          $('.form-enable').attr('action',url);
          $('.modalEnable').modal('show');

      })
  }
