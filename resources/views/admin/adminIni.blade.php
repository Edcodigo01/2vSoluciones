@extends("front.layouts.index")
@section('title')
    Inicio de sesión
@endsection

@section("content")
   <div style="height:170px">

   </div>
    <div class="bg-" style="">
        <div class="card mt-5 m-auto" style="width:350px !important">
            <div class="card-body ">
                <div class="text-center">
                    <img src="{{asset('public\images\default\logos\logo-t.png')}}" alt="" style="width:100px" class="text-center">
                </div>

                    <h5 class="text-center text-purple-l">Iniciar Sesión</h5>
                    {{-- <h6 class="text-center">Panel Administración</h6> --}}
                    <form class="formula validate" action="{{route('login')}}" method="post" id="form-login">
                        <div class="form-group">
                            <label for="" class="" ><i class="fas fa-envelope"></i> Email</label>
                            <input type="text" name="email" value="2v@admin.com" class="form-control required">
                        </div>
                        <div class="form-group">
                            <label for="" class="" ><i class="fas fa-envelope"></i> Contraseña</label>
                            <input type="password" name="password" value="" class="form-control required password" id="blockMayus">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="button" class="btn bg-purple btn-block">Iniciar Sesión</button>
                            <button type="button" name="button" class="btn btn-light btn-block">Cancelar / Inicio</button>

                        </div>
                    </form>
            </div>
        </div>
    </div>
@endsection

{{-- @section('scripts')
    <script type="text/javascript">
    $(document).ready(function() {

        var message = $('#noAuth').val();
        warning(message);
    });
    </script>
@endsection --}}
