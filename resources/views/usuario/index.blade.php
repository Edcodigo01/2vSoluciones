@extends("layouts.index")
@section("content")

  <div class="container mb-5" style="margin-top:150px">
    <h2 class="mb-4 text-green">Clientes</h2>

    <table id="table-clients" class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>Nombres:</th>
        <th>Apellidos:</th>
        <th>Correo:</th>
        <th>Registro:</th>
      </tr>
    </thead>
    <tbody>

    </tbody>
    </table>

    <input type="hidden" name="" value="{{$dataClients}}" id="dataClients">
  </div>
@endsection
@section('scripts')

    <script type="text/javascript">
      $(document).ready(function() {

        data = $('#dataClients').val();
        data = JSON.parse(data);

        tableNoAjax(data,'#table-clients');

      } );
    </script>
@endsection
