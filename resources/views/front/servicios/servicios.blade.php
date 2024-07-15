@extends("front.layouts.index")

@section("content")
   <div class="text-center paralax" style="background-image: url('public/images/default/servicios/trabajando.jpg');">
      <div class="container-title" style="background:rgba(36, 35, 35, 0.38)">
           <span class="bg- px-3 py-2" style="display:inline-block">
               <h2 class="text-center text-white mt-1" ><i class="fas fa-user-tie"></i> Servicios</h2>
           </span>
      </div>
   </div>
@include('front.servicios.contentServices')
{{-- tu logro --}}
<div class="tuLogro text-center d-flex justify-content-center align-items-center">
   <img style="" class="mr-2 wow zoomIn" src="{{asset('public/images/default/logos/logo-t.png')}}" alt="">
   <h5 style="display:inline-block" class="text-center m-0 text-dark wow zoomIn">¡Tu logro es nuestro éxito!</h5>
</div>
@endsection