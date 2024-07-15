<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{route('home')}}" class="brand-link text-center">
    <img src="{{asset('public\images\default\logos\logo-2v-sinfondo-trangular-sm.png')}}"
         alt="AdminLTE Logo"
         class="brand-image" style="width:45px;height:45px;object-fit:cover">
    <span class="brand-text" style="font-size:17px">2v S. Academicas</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
        {{-- <div class="user-panel mt-1 pb-1 mb-1 d-flex"> --}}
            {{-- <div class="image text-center">
                <i class="fas fa-cogs text-center"></i>
            </div> --}}
          {{-- <div class="info">
            <a href="{{route('admin')}}" class="d-block"> <i class="fas fa-cogs"></i> Panel de Administración</a>
          </div> --}}
        {{-- </div> --}}

    <!-- Sidebar Menu -->

    <nav class="mt-2">

      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
             <li class="nav-item">

               <a href="{{route('admin')}}" class="nav-link @if(Request::route()->getName() == 'admin') active @endif">
                <i class="fas fa-cogs nav-icon"></i>
                 <p>
                    Panel de Administración
                 </p>
               </a>
             </li>
             <li style="border-bottom:solid 1px grey" class=""></li>

         <li class="nav-item">
           <a href="{{route('administrar-articulos.index')}}" class="nav-link @if(Request::route()->getName() == 'administrar-articulos.index') active @endif">
            <i class="far fa-newspaper nav-icon"></i>
             <p>
               Artículos
             </p>
           </a>
         </li>
         <li class="nav-item">
           <a href="{{route('administrar-categorias.index')}}" class="nav-link @if(Request::route()->getName() == 'administrar-categorias.index') active @endif">
             <i class="nav-icon fas fa-list-alt"></i> <p>Categorías</p>
           </a>
         </li>
         {{-- <li class="nav-item">
           <a href="{{route('administrar-etiquetas.index')}}" class="nav-link  @if(Request::route()->getName() == 'administrar-etiquetas.index') active @endif">
             <i class="nav-icon fas fa-tag"></i>
             <p>
               Etiquetas
             </p>
           </a>
         </li> --}}
         <li style="border-bottom:solid 1px grey" class=""></li>
        {{-- <li class="nav-item">
          <a href="{{route('clientes.index')}}" class="nav-link @if(Request::route()->getName() == 'clientes.index') active @endif">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Clientes
            </p>
          </a>
        </li>
        <li style="border-bottom:solid 1px grey" class=""></li> --}}

        {{-- <li class="nav-item">
          <a href="{{route('administrar-servicios.index')}}" class="nav-link @if(Request::route()->getName() == 'administrar-servicios.index') active @endif">
            <i class="nav-icon fas fa-list"></i>
            <p>
              Servicios
            </p>
          </a>
        </li>
        <li style="border-bottom:solid 1px grey" class=""></li> --}}

        <li class="nav-item">
          <a href="{{route('administrar-videos.index')}}" class="nav-link @if(Request::route()->getName() == 'administrar-videos.index') active @endif">
            <i class="nav-icon fab fa-youtube"></i>
            <p>
              Videos
            </p>
          </a>
        </li>
         <li style="border-bottom:solid 1px grey" class=""></li>
        <li class="nav-item">
          <a href="{{route('mensajes-email.index')}}" class="nav-link @if(Request::route()->getName() == 'mensajes-email.index') active @endif">
            <i class="nav-icon fas fa-envelope"></i>
            <p>
              Emails Recibidos
            </p>
          </a>
        </li>

        {{-- <li class="nav-item">
          <a href="../widgets.html" class="nav-link">
            <i class="nav-icon fas fa-users-cog"></i>
            <p>
              Usuarios
            </p>
          </a>
        </li> --}}


      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
