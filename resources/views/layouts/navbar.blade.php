{{-- <div class="" style="position:-webkit-sticky;position:sticky;top:0;width:100%"> --}}
  <nav class="navbar navbar-expand-lg navbar-light bg-light bg-gradient fixed-top" style="padding:15px">
    <a class="navbar-brand" href="#" style="padding:0px">
      <img class="logo-g" src="{{asset("public\images\default\logo.jpg")}}" alt="" style="margin:0">
      <img class="logo-p" src="{{asset("public\images\default\logo-sm.jpg")}}" alt="" style="display:none" style="margin:0">

    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav mt-2 mt-lg-0" style="margin:auto;">
        <li class="nav-item">
          <a class="btn btn-outline-light ml-2 font600 @Route('home') active @endRoute" href="{{route('home')}}"><i class="fas fa-home"></i> Incio <span class="sr-only">(current)</span></a>
        </li>

        <li class="dropdown nav-item">

          <a class="btn btn-outline-light ml-2 font600 @Route('serviciosEmp') active @endRoute @Route('serviciosA') active @endRoute"><i class="fas fa-list"></i>   Servicios <i class="fa fa-chevron-down"></i></a>
          <div class="dropdown-content bg-secondary">

              <a class="dropdown-item text-white font600" href="{{url('servicios-academicos')}}"><i class="fas fa-university"></i> Académicos</a>
              <a class="dropdown-item text-white font600" href="{{url('servicios-empresariales')}}"><i class="fas fa-user-tie"></i> Empresariales</a>
          </div>
        </li>
        <li class="nav-item active">
          <a class="btn btn-outline-light  ml-2 font600 @Route('somos') active @endRoute" href="{{route('somos')}}"><i class="fas fa-users"></i> Quiénes somos</a>
        </li>
        <li class="dropdown nav-item">
          <a href="{{route('articles')}}" class="btn btn-outline-light ml-2 font600 @Route('articles') active @endRoute"><i class="fas fa-book-open"></i> Artículos de Interés <i class="fa fa-chevron-down"></i></a>
          <div class="dropdown-content bg-secondary">

              @foreach (Categories() as $key => $value)
                  @if($value->articles->count() != 0)
                      <a class="dropdown-item text-white font600" href="{{url('articulos?categoria='.$value->name)}}"> <i class="fas fa-check ml-1"></i> {{$value->name}}</a>
                  @endif

              @endforeach
              <a class="dropdown-item text-white font600" href="{{route('articles')}}"><i class="fas fa-list ml-1"></i> Todos</a>
          </div>
        </li>
        <li class="nav-item active">
          <a class="btn btn-outline-light  ml-2 font600 @Route('testimonios') active @endRoute" href="{{route('testimonios')}}"><i class="fas fa-comments"></i> Testimonios</a>
        </li>
        @Videos
        <li class="nav-item active">
          <a class="btn btn-outline-light  ml-2 font600 @Route('videos') active @endRoute" href="{{route('videos')}}"><i class="fas fa-video"></i>  Videos</a>
        </li>
        @endVideos

        <li class="nav-item active">
          <a class="btn btn-outline-light  ml-2 font600 @Route('contactanos') active @endRoute" href="{{route('contactanos')}}"><i class="fas fa-phone-alt text-white"></i>  Contáctanos</a>
        </li>
      </ul>
      {{-- <ul class="navbar-nav ml-auto mt-2 mt-lg-0">


        @if(Auth::check())
          <li class="dropdown">
            <button class="btn btn-outline-light mr-5"> <i class="fa fa-cogs"></i> Administrar <i class="fa fa-chevron-down"></i></button>
            <div class="dropdown-content bg-secondary" style="margin-left:-1%">

              <a class="dropdown-item font600 text-white" href="{{route('clientes.index')}}"><i class="fas fa-users"></i> Clientes</a>

              <a class="dropdown-item font600 text-white" href="{{route('administrar-servicios.index')}}"><i class="fas fa-list"></i> Servicios</a>

            </div>
          </li>
          <li class="dropdown">
            <button class="btn btn-outline-light mr-5"> <i class="fa fa-user"></i> {{Auth::user()->usuario}} <i class="fa fa-chevron-down"></i></button>
            <div class="dropdown-content bg-secondary" style="margin-left:-50px">
              <a class="dropdown-item font600 text-white" href="{{route('logout')}}"><i class="fas fa-sign-out-alt"></i> Cerrar Sessión</a>
            </div>
          </li>
        @else
          <li class="nav-item">
            <a class="btn btn-outline-light ml-2" onclick="showModalEmpty('#modalLogin','#form-login')"><i class="fa fa-user"></i> Iniciar Sessión<span class="sr-only">(current)</span></a>
          </li>

        @endif

      </ul> --}}
      {{-- <form class="form<li class="nav-item">
        <a class="btn btn-outline-light ml-2" onclick="showModal('modalLogin')" href="#"><i class="fa fa-user"></i> Iniciar Sessión<span class="sr-only">(current)</span></a>
      </li>-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form> --}}
    </div>
  </nav>

  {{-- <div class="p-1 bg-white" style="border:solid 1px grey;">

      <h4 class="text-primary">Mensajes</h4>
      <button type="button" name="button" class="btn btn-primary btn-sm" >No leidos</button>
      <button type="button" name="button" class="btn btn-secondary btn-sm" >Recibidos</button>
      <button type="button" name="button" class="btn btn-success btn-sm" >Enviados</button>


  </div> --}}
{{-- </div> --}}