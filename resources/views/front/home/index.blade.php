@extends("front.layouts.index")
@section("content")
   {{-- Inicio --}}
   <div class="paralax" id="imgP">
      <div class="overlay" style="background:rgba(0, 121, 242, 0.322);">

      </div>
      <div class="text-img-p">
         <div class="row m-auto" style="width:100%">
             <div class="col-12">
                <div class="text" style="max-width:95%">



                   <h2 class="text text-center text-white wow zoomIn" data-wow-duration="1.5s">2V Soluciones Académicas & Empresariales</h2>
                 <br>
                 <br>
               


                 <h3 class="text text-center text-white font400 wow fadeInLeft" data-wow-duration="2s">
                     <strong>Tesis:</strong>
                     Asesoría. Desarrollo. Capacitación</h3>
                 <br>
                  <h3 class="text text-center text-white font400 wow fadeInLeft" data-wow-duration="2s"><strong>Proyectos de Negocios:</strong> Asesoría</h3>
                 <br>

                 <h4 class="text text-center text-white wow fadeInRight" data-wow-duration="2.5s">¡TU LOGRO ES NUESTRO ÉXITO! </h4>
                </div>
             </div>
         </div>

      </div>
   </div>
   {{-- seccion 1 --}} {{-- seccion 2 --}}
   @include('front.servicios.contentServices')

      {{-- section 3 --}}
      <div class="container2 porque p-0">
         <h4 class="text-center my-5 text-purple-l">¿Por qué escogernos?</h4>
         <div class="mt-5">
            <div class="row m-auto" style="width:100%">
               <div class="col-lg-3 col-sm-4 col-6">
                  <div style="max-width:300px;margin:auto">

                     <img class="icon2v icon2v2" style="margin-bottom:-10px" src="{{asset('public/images/default/ICONOS/icono2v-15.png')}}" alt="">
                     <h6 class="text-center font600 m-0 mb-4" > Cientos de testimonios de clientes satisfechos.</h6>
                  </div>
               </div>
               <div class="col-lg-3 col-sm-4 col-6">
                  <div style="max-width:300px;margin:auto">
                     <img class="icon2v icon2v2" src="{{asset('public/images/default/ICONOS/icono2v-12.png')}}" alt="">

                     <h6 class="text-center font600 mb-4" > Especialistas con estudios de cuarto nivel y amplia experiencia. </h6>

                  </div>
               </div>

               <div class="col-lg-3 col-sm-4 col-6">
                  <div style="max-width:300px;margin:auto">
                     <img class="icon2v icon2v2" style="margin-bottom:-10px" src="{{asset('public/images/default/ICONOS/icono2v-09.png')}}" alt="">

                     <h6 class="text-center font600 mb-4" > Compromiso personal con cada cliente.</h6>

                  </div>
               </div>

               <div class="col-lg-3 col-sm-4 col-6">
                  <div style="max-width:300px;margin:auto">
                     <img class="icon2v icon2v2" style="margin-bottom:-10px" src="{{asset('public/images/default/ICONOS/icono2v-11.png')}}" alt="">

                     <h6 class="text-center font600 mb-4" > Tiempos de respuestas oportunos.</h6>

                  </div>
               </div>

               <div class="col-lg-3 col-sm-4 col-6">
                  <div style="max-width:300px;margin:auto">
                     <img class="icon2v icon2v2" style="margin-bottom:-10px" src="{{asset('public/images/default/ICONOS/icono2v-14.png')}}" alt="">

                     <h6 class="text-center font600 mb-4" > Honradez intelectual.</h6>

                  </div>
               </div>

               <div class="col-lg-3 col-sm-4 col-6">
                  <div style="max-width:300px;margin:auto">
                     <img class="icon2v icon2v2" style="margin-bottom:-10px" src="{{asset('public/images/default/ICONOS/icono2v-08.png')}}" alt="">

                     <h6 class="text-center font600 mb-4" > Comunicación efectiva y asertiva.</h6>

                  </div>
               </div>

               <div class="col-lg-3 col-sm-6 col-6">
                  <div style="max-width:300px;margin:auto">
                     <img class="icon2v icon2v2" style="margin-bottom:-10px" src="{{asset('public/images/default/ICONOS/icono2v-13.png')}}" alt="">

                     <h6 class="text-center font600 mb-4" > Responsabilidad garantizada.</h6>

                  </div>
               </div>

               <div class="col-lg-3 col-sm-6 col-6">
                  <div style="max-width:300px;margin:auto">
                     <img class="icon2v icon2v2" style="margin-bottom:-10px" src="{{asset('public/images/default/ICONOS/icono2v-10.png')}}" alt="">

                     <h6 class="text-center font600 mb-4" > Servicios de alta calidad.</h6>

                  </div>
               </div>

               </div>
               <br>

               <br>
               <br>
            </div>
         </div>

         {{-- section 4 --}}
         {{-- <div class="triangle-commnets"></div> --}}
         <div class=" paralax p-0" style="" id="section5" style="width:100%">
            <div class="overlay" style="background:rgba(0, 0, 0, 0.49)"></div>


            <div class="container2 p-0">
               <div class="row m-auto" style="width:100%">
                   <div class="col-12 p-0">
                      <br>
                      <h4 class="text-center text-white">Testimonios</h4>
                      <h6 class="text-white text-center mt-2">Por favor déjanos saber tu opinión acerca de nosotros.</h6>
                      <div class="card" style="box-shadow:none">
                          <div class="card-body pt-0" >
                             <h6 class="text-center text-purple mt-5" id="messageLoadComment"><img src="{{asset('public/images/default/loader/spinner.gif')}}" alt="" style="width:40px;height:40px"> Cargando comentarios desde "Facebook" por favor espere.</h6>
                             <div style="overflow:auto;max-height:600px;width:100%" class="fb-comments containerScroll" data-href="https://2vsoluciones.com/2v/" data-numposts="3" width="100%" data-width="100%" data-order-by="reverse_time"></div>
                          </div>
                      </div>
                      <br>
                      <p class="text-center text-white" style="max-width:1000px;margin:auto">Más comentarios en nuestra cuenta de Facebook.</p>

                      <div class="text-center mt-2">
                          <a target="_blank" href="https://www.facebook.com/tesis2V/reviews"><img src="{{asset('public/images/default/redes sociales/logo-facebook.jpg')}}" alt="" style="border-radius:12px;max-width:40px;border:solid 2px white"></a>
                          {{-- <p class="text-center text-white font14" style="font-size:14px">ClicK Aqui</p> --}}
                      </div>
                      <br>
                   </div>
               </div>
           </div>
         </div>
         {{-- <div class="triangle-commnets-bottom"></div> --}}

         {{-- tu logro --}}
         <div class="tuLogro text-center d-flex justify-content-center align-items-center">
            <img style="" class="mr-2 wow zoomIn" src="{{asset('public/images/default/logos/logo-t.png')}}" alt="">
            <h5 style="display:inline-block" class="text-center m-0 text-dark wow zoomIn">¡Tu logro es nuestro éxito!</h5>
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