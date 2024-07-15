@extends("layoutsAdmin.index")
@section('title')
  2V-Admin-Etiquetas
@endsection
@section("content")

    <div class="row">
        <div class="col-12">
            <div class="input-group float-right my-4" style="max-width:230px;">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-green">Estado: </span>
                </div>
                <select class="form-control" name="" id="filtro1">
                    <option value="no" selected>Todos</option>
                    <option value="si">Deshabilitadas</option>
                </select>
            </div>
            <h2 class="mb-4 text-green">Etiquetas</h2>
        </div>
    </div>
    <table class="listar table table-bordered table-striped listar" data-route="list_admintags" data-update="administrar-etiquetas/{id}" data-delete="administrar-etiquetas/{id}" id="table-tags" data-routeDisable="disabledTag/{id}"  data-routeEnable="enabledTag/{id}">

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

    @include('tags.includes.modalCreate')
    @include('tags.includes.modalEdit')
    @include('tags.includes.modalDisabled')
    @include('tags.includes.modalEnable')
    <input type="hidden" name="" value="{{$dataTags}}" id="data">
@endsection
@section('scripts')

    <script type="text/javascript">

    </script>
@endsection
