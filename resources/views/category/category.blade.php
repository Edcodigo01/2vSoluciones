@extends("layoutsAdmin.index")
@section('title')
  2V-Admin-categorías
@endsection
@section("content")


    <div class="row">
        <div class="col-12">
            {{-- <div class="input-group float-right my-4" style="max-width:230px;">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-green">Estado: </span>
                </div>
                <select class="form-control" name="" id="filtro1">
                    <option value="no" selected>Todos</option>
                    <option value="si">Deshabilitadas</option>
                </select>
            </div> --}}
            <h2 class="mb-4 text-">Categorías de Artículos</h2>
        </div>
    </div>

    <table class="listar table table-bordered table-striped listar" data-route="list_admincategories" data-update="administrar-categorias/{id}" data-delete="administrar-categorias/{id}" id="table-categories" data-routeDisable="disabledCategory/{id}"  data-routeEnable="enabledCategory/{id}" data-delete="{{url('administrar-categorias/{id}')}}">

    <thead>
      <tr>
        <th>Id</th>
        <th>Acciones:</th>
        <th>Nombre</th>
      </tr>
    </thead>
    <tbody>

    </tbody>
    </table>

    @include('category.includes.modalCreate')
    @include('category.includes.modalEdit')
    @include('category.includes.modalDelete')
    @include('category.includes.modalDisabled')
    @include('category.includes.modalEnable')




    <input type="hidden" name="" value="{{$dataCategories}}" id="data">
@endsection
