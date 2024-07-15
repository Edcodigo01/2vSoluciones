<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style media="screen">
    .text-purple{
      color:#e04bc9 !important;
    }


    .container {
      width: 100%;
      padding-right: 15px;
      padding-left: 15px;
      margin-right: auto;
      margin-left: auto;
    }

    @media (min-width: 576px) {
      .container {
        max-width: 540px;
      }
    }

    @media (min-width: 768px) {
      .container {
        max-width: 720px;
      }
    }

    @media (min-width: 992px) {
      .container {
        max-width: 960px;
      }
    }

    @media (min-width: 1200px) {
      .container {
        max-width: 1140px;
      }
    }

    .text-secondary {
      color: #6c757d !important;
    }

    .text-dark {
      color: #343a40 !important;
    }

    p {
      margin-top: 0;
      margin-bottom: 1rem;
    }

    h1, h2, h3, h4, h5, h6,
    .h1, .h2, .h3, .h4, .h5, .h6 {
      margin-bottom: 0.5rem;
      font-weight: 500;
      line-height: 1.2;
    }

    h1, .h1 {
      font-size: 2.5rem;
    }

    h2, .h2 {
      font-size: 2rem;
    }

    h3, .h3 {
      font-size: 1.75rem;
    }

    h4, .h4 {
      font-size: 1.5rem;
    }

    h5, .h5 {
      font-size: 1.25rem;
    }

    .mt-2,
    .my-2 {
      margin-top: 0.5rem !important;
    }

    .mt-4,
    .my-4 {
      margin-top: 1.5rem !important;
    }

    .text-green{
      color:rgba(37, 215, 87, 1) ! important;
    }
    </style>

    <title>Mensaje de cliente a 2v Soluciones</title>
</head>
<body>
    <div class="">


        <img class="mt-3" src="{{$message->embed(asset('public/images/default/logos/logo-2v-sinfondo-trangular-sm.png'))}}" style="width:150px;border-radius:10px;margin:auto;float:left;margin-right:15px" data-auto-embed="attachment"/>

        <div class="" style="overflow">
           <h4 class="text-green">Mensaje de cliente a 2V</h4>


           <p class="text-secondary" style="font-size:14px">Este mensaje es enviado desde el formulario de contacto del sitio web "2V".</p>
           <h5 class="text-green">Correo: <span class="text-dark">{{$data->email}}</span></h5>
           <h5 class="text-green">Teléfono: <span class="text-dark">@if($data->whatsapp != Null) {{$data->whatsapp}} @else <span class="text-secondary">No especificado</span>@endif </span></h5>
           {{-- <h5 class="text-green">Asunto: <span class="text-dark">{{$data->affair}}</span></h5> --}}
           <h5 class="text-green mt-4">Mensaje: <span class="text-dark">{{$data->message}}</span></h5>
        </div>


    </div>

</body>
</html>
