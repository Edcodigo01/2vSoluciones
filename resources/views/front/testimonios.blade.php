@extends("front.layouts.index")
@section("content")

    <div class="text-center paralax" style="background-image: url('public/images/default/home/manosOk.jpg');background-position:bottom">
        <div class="container-title" style="background:rgba(36, 35, 35, 0.38)">
            <span class=" px-3 py-2" style="display:inline-block">
                <h2 class="text-center text-white mt-1 titleArticle" ><i class="fas fa-comments"></i> Testimonios</h2>
            </span>
        </div>
    </div>

    {{-- <div class="triangle-commnets"></div> --}}
   <div class="-l" style="">
      <br>
      <div class="container2 ">
        {{-- <h4 class="text-center text-white">Testimonios</h4> --}}
        <h6 class="text-dark text-center mt-2">Por favor déjanos saber tu opinión acerca de nosotros.</h6>
        <br>
        
        <!--https://2vsoluciones.com/2v/-->
        
        <div class="card" style="">
            <div class="card-body pt-0" >
               <h6 class="text-center text-purple mt-5" id="messageLoadComment"><img src="{{asset('public/images/default/loader/spinner.gif')}}" alt="" style="width:40px;height:40px"> Cargando comentarios desde "Facebook" por favor espere.</h6>
               <div data-order-by="reverse_time" style="width:100%" class="fb-comments containerScroll" data-href="https://2vsoluciones.com/2v/" data-numposts="6" width="100%" data-width="100%"></div>
            </div>
        </div>
        <br>
        <p class="text-center" style="max-width:1000px;margin:auto">Más comentarios en nuestra cuenta de Facebook.</p>

        <div class="text-center mt-2">
            <a target="_blank" href="https://www.facebook.com/tesis2V/reviews"><img src="{{asset('public\images\default\redes sociales\logo-facebook.jpg')}}" alt="" style="border-radius:12px;max-width:50px;border:solid 2px white"></a>
            {{-- <p class="text-center text-white font14" style="font-size:14px">ClicK Aqui</p> --}}
        </div>

     </div>
     <br>
     <br>

   </div>

@endsection
@section('scripts')
   <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v7.0&appId=201064434390930&autoLogAppEvents=1" nonce="EAUQffoA"></script>

   <script>
   window.fbAsyncInit = function(){
      FB.Event.subscribe("xfbml.render", function(){
           $('#messageLoadComment').hide();
      });
   };
   </script>

@endsection