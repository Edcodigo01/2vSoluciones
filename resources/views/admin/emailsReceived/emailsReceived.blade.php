@extends("layoutsAdmin.index")
@section('title')
  2V-Correos-Recibidos
@endsection
@section("content")
    <h2 class="mb-4 text-green">Correos Recibidos</h2>

    <table class="listar table table-bordered table-striped listar" data-route="list_emailsrecibidos" data-update="emails-recibidos/{id}" data-delete="emails-recibidos/{id}" id="table-emails-received">

    <thead>
      <tr>
        <th>Id</th>
        <th>Correo Usuario</th>
        <th>Whatsapp </th>
        <th>Asunto </th>
        <th>Mensaje </th>
        <th>Enviado </th>
        <th>Error </th>

      </tr>
    </thead>
    <tbody>

    </tbody>
    </table>

    @include('category.includes.modalCreate')
    @include('category.includes.modalEdit')

    <input type="hidden" name="" value="{{$Messagescontact}}" id="data">
@endsection
