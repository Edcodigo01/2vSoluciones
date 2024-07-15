<div class="main">
   <span class="close-main float-right mr-2"> <i class="fas fa-times"></i> </span>
   <span class="ml-2">Menú</span>
   <div class="content">
      <a href="{{url('/')}}" class="  @if(url('/') == url()->current()) active @endif">Inicio</a>
      <a href="{{url('servicios')}}" class="  @if(url('servicios') == url()->current()) active @endif">Servicios</a>
      <a href="{{url('nosotros')}}" class="  @if(url('nosotros') == url()->current()) active @endif">Nosotros</a>
      <a href="{{url('testimonios')}}" class="  @if(url('testimonios') == url()->current()) active @endif">Testimonios</a>
     {{-- <a href="{{url('videos')}}" class="  @if(url('videos') == url()->current()) active @endif">Videos</a> --}}
      <a href="{{url('articulos')}}" class="  @if(url('articulos') == url()->current()) active @endif">Artículos</a>
      <a href="{{url('contactanos')}}" class="  @if(url('contactanos') == url()->current()) active @endif">Contáctanos</a>
   </div>
   </div>
</div>