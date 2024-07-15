@extends("layoutsAdmin.index")
@section('title')
  2V-Admin-Clientes
@endsection
@section("content")


    <h2 class="mb-4 text-green">Clientes</h2>


    <div id="bgObscure" style="display:none">
    </div>

    <table style="width:100%" class="listar table table-bordered table-striped listar" data-route="list_clients" data-update="clientes/{id}" data-updateService="servicios-de-proyecto/{id}" data-routeAdd="iniciar-proyecto/{id}"  id="table-clients">

    <thead>
      <tr>
        <th>Id</th>
        <th>Acciones:</th>
        <th>Nombre Completo</th>
        <th>Correo</th>
        {{-- <th>tipo Id</th> --}}
        <th>Nro Id</th>
        <th>ult. Proyectos</th>
        <th>Nro whatsapp</th>
        {{-- <th>Teléfono 2</th> --}}
        {{-- <th>Universidad</th> --}}
        {{-- <th>Carrera</th> --}}
        {{-- <th>Registro</th> --}}
      </tr>
    </thead>
    <tbody>

    </tbody>
    </table>

    @include('clients.includes.modalCreate')
    @include('clients.includes.modalEdit')
    @include('clients.includes.modalAdd')
    @include('clients.includes.modalAddService')
    @include('clients.includes.modalEditService')
    @include('clients.includes.modalDeleteService')
    @include('clients.includes.all_project_client')
    @include('clients.includes.modalEditProject')



    {{-- clientes --}}
    <input type="hidden" name="" value="{{$dataClients}}" id="data">
    {{-- servicios preagregados --}}
    <input type="hidden" name="" value="{{$services}}" id="servicesArray">
    {{-- <input type="hidden" name="" value="{{$projectServices}}" id="projectServices"> --}}



@endsection
@section('scripts')

    <script type="text/javascript">

    </script>
@endsection