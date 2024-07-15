<div class="navP">
   <div class="containerNav relative form-inline" style="height:100%">
         <div style="height:100%" class="zone-logo">

            <a href="{{url('/')}}"><img src="{{asset('public\images\default\logos\logo-2v-sinfondo-trangular-sm.png')}}" alt="" class="logo-n"></a>
            {{-- <p class="m-0 text-white" style="font-size:14px;text-shadow:1px 1px black">2v Soluciones</p> --}}
        </div>
         <div style="" class="text-center linksN zone-links" style="height:100%">
            <a href="{{url('/')}}" class="linkN  @if(url('/') == url()->current()) active @endif">Inicio</a>
            <a href="{{url('servicios')}}" class="linkN  @if(url('servicios') == url()->current()) active  @endif">Servicios</a>
            <a href="{{url('nosotros')}}" class="linkN  @if(url('nosotros') == url()->current()) active @endif">Nosotros</a>
              <a href="{{url('testimonios')}}" class="linkN  @if(url('testimonios') == url()->current()) active @endif">Testimonios</a>
            {{-- <a href="{{url('videos')}}" class="linkN  @if(url('videos') == url()->current()) active @endif">Videos</a>--}}
               <a href="{{url('articulos')}}" class="linkN  @if(url('articulos') == url()->current()) active @endif">Artículos</a>
            <a href="{{url('contactanos')}}" class="linkN  @if(url('contactanos') == url()->current()) active @endif">Contáctanos</a>
         </div>
         <a type="button" name="button" class="float-right btn-main ml-auto mt-1" style="font-size:30px"> <i class="fas fa-bars"></i> </a>
   </div>
</div>

<div class="navP navP2" >
    <div class="containerNav relative form-inline" style="height:100%">
          <div style="height:100%" class="zone-logo">

             <a href="{{url('/')}}"><img src="{{asset('public\images\default\logos\logo-2v-sinfondo-trangular-sm.png')}}" alt="" class="logo-n"></a>
             {{-- <p class="m-0 text-white" style="font-size:14px;text-shadow:1px 1px black">2v Soluciones</p> --}}
         </div>
          <div style="" class="text-center " style="height:100%">
             <a href="{{url('/')}}" class="linkN  @if(url('/') == url()->current()) active @endif">Inicio</a>
             <a href="{{url('servicios')}}" class="linkN  @if(url('servicios') == url()->current()) active  @endif">Servicios</a>
             <a href="{{url('nosotros')}}" class="linkN  @if(url('nosotros') == url()->current()) active @endif">Nosotros</a>
                <a href="{{url('testimonios')}}" class="linkN  @if(url('testimonios') == url()->current()) active @endif">Testimonios</a>
            {{-- <a href="{{url('videos')}}" class="linkN  @if(url('videos') == url()->current()) active @endif">Videos</a> --}}
                <a href="{{url('articulos')}}" class="linkN  @if(url('articulos') == url()->current()) active @endif">Artículos</a>
             <a href="{{url('contactanos')}}" class="linkN  @if(url('contactanos') == url()->current()) active @endif">Contáctanos</a>
          </div>
          <a type="button" name="button" class="float-right btn-main ml-auto mt-1 text-dark" style="font-size:30px"> <i class="fas fa-bars"></i> </a>
    </div>
</div>

<div class="spaceNavbar">

</div>