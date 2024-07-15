@extends("layoutsAdmin.index")
@section('title')
  2V-Admin-Servicios
@endsection
@section("content")
    <h2 class="mb-4 text-green">Servicios</h2>

    <table class="listar table table-bordered table-striped listar" data-route="list_adminservices" data-update="administrar-servicios/{id}" data-delete="administrar-servicios/{id}" id="table-services">

    <thead>
      <tr>
        <th>Id</th>
        <th>Acciones:</th>
        <th>Nombre</th>
        <th>Precio</th>
      </tr>
    </thead>
    <tbody>

    </tbody>
    </table>

    @include('services.includes.modalCreate')
    @include('services.includes.modalEdit')

    <input type="hidden" name="" value="{{$dataServices}}" id="data">
@endsection
@section('scripts')

    <script type="text/javascript">

    </script>
@endsection
