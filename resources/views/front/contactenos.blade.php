@extends("front.layouts.index")
@section('styles')
   {{-- <link rel="stylesheet" href="{{asset('public\css\formOneLine.css')}}"> --}}
   <style media="screen">
      .form-control{
         border-color: grey !important;
      }
      @media (max-width:567px) {
          .container2{
              width: 100%;

          }
      }

   </style>
@endsection
@section("content")

    <div class="text-center relative" style="overflow:hidden">
      <div class="overlay" style="background:rgba(0, 0, 0, 0.15)"></div>

      <img src="{{asset('public/images/contactenos/adriana-contactenos.jpg')}}" alt="" style="position:fixed;top:0;left:0;right:0;z-index:-5;height:450px;width:100%;object-fit:cover;object-position:top">
        <div class="container-title" style="">
            <span class=" px-3 py-2" style="display:inline-block">
                <div class="row m-auto" style="width:100%">
                    <div class="col-12">
                        <h2 class="text-center text-white mt-1 titleArticle pt-4" ><i class="fas fa-comments"></i>  Contáctanos</h2>
                    </div>
                </div>
            </span>
        </div>
    </div>

<div class="bg-white contactanos">
   <br>
      <div class="container2 ">
         <br>
           <div class="row m-auto" style="width:100%">
               <div class="col-md-6 col-xl-3 mb-4">
                   <div class="card  " style="height:100%">
                       <div class="card-body p-3">
                           <h1 class="text-center text-green-l" style="font-size:60px"><i class="fas fa-map-marked"></i></h1>
                           <h5 class="text-center text-">Dirección</h5>
                           <p class="font500 text-center">Av. Mariana de Jesús, Quito - Ecuador</p>
                       </div>
                   </div>
               </div>


               <div class="col-md-6 col-xl-3  mb-4">
                   <a class="whatsapp-mobile" href="https://api.whatsapp.com/send?phone=+593989558833" class="whatsapp-mobile">
                       <div class="card" style="height:100%">
                           <div class="card-body p-3 text-dark">
                              <h1 class="text-center text-green-l" style="font-size:60px"><i class="fab fa-whatsapp"></i></h1>
                              <h5 class="text-center -l">WhatsApp</h5>
                              <p class="font500 text-center" style="">Click aquí para abrir WhatsApp. <span class="" style="">+593989558833</span></p>

                           </div>
                       </div>
                   </a>
                   <a class="whatsapp-web" href="https://web.whatsapp.com/send?phone=593989558833&text=" class="whatsapp-web">

                       <div class="card" style="height:100%">
                          <div class="card-body text-dark p-3 text-center">
                             <h1 class="text-center text-green-l" style="font-size:60px"><i class="fab fa-whatsapp"></i></h1>
                             <h5 class="text-center ">WhatsApp</h5>
                             <span class="font500 text-center" style="font-size:12px">Click aquí para abrir WhatsApp. </span>
                             <p class=""><span class="font600" style="">+593989558833</span></p>
                          </div>
                       </div>
                   </a>
               </div>


               <div class="col-md-6 col-xl-3  mb-4">
                   <div class="card " style="height:100%">
                       <div class="card-body p-3">
                           <h1 class="text-center text-green-l" style="font-size:60px"><i class="fas fa-users"></i></h1>
                           <h5 class="text-center text-dark">Redes Sociales</h5>
                           <div class=" text-center">
                               <a href="https://www.instagram.com/2v_tesis/?hl=es-la" target="_blank" style="display:inline-block">
                    <h4 class="text-purple-l">
                       <i class="fab fa-instagram-square "></i>
                       {{-- <img  style="width:30px;height:30px ;border-radius:7px" src="{{asset('public/images/default/redes sociales/logo-facebook.jpg')}}" alt=""> --}}
                    </h4>
                </a>
                <a class="ml-3" href="https://www.facebook.com/tesis2V" target="_blank" class="" style="display:inline-block">
                   <h4 class="text-purple-l">
                      <i class="fab fa-facebook-square "></i>
                      {{-- <img  style="width:30px;height:30px ;border-radius:7px" src="{{asset('public/images/default/redes sociales/logo-instagram.jpg')}}" alt=""> --}}
                   </h4>
                </a>
                 <a class="ml-3" href="https://www.tiktok.com/@2v_tesis?lang=es" target="_blank" class="" style="display:inline-block">
                   <h4 class="text-purple-l">
                      <i class="fab fa-tiktok "></i>
                      
                   </h4>
                </a>
                              
                           </div>

                       </div>
                   </div>
               </div>

               <div class="col-md-6 col-xl-3  mb-4">
                       <div class="card" style="height:100%">
                           <div class="card-body text-dark p-3">
                              <h1 class="text-center text-green-l" style="font-size:60px"><i class="far fa-envelope"></i> </h1>
                              <h5 class="text-center ">Correo</h5>
                              <p class="font500 text-center mailContact"> tulogroesnuestroexito2v <br> @gmail.com</p>
                           </div>
                       </div>

               </div>
           </div>
           <br>
          {{-- <div class="row m-auto" style="width:100%">
               <div class="col-md-12 col-lg-6 mb-5">
                   <div class="card" style="height:100%">
                       <div class="card-header bg-white">
                           <h6 class="text-dark m-0"><i class="fas fa-paper-plane"></i> Realiza tu consulta:</h6>

                       </div>
                       <div class="card-body">

                           <form class="formula validate formP" action="{{route('message-contact')}}" method="post" id="message-contact">
                           <div class="row">
                              <div class="form-group col-lg-6 col-sm-6 col-md-6">
                                   <label class="labelInput" for="">Correo: <span class="text-danger">*</span></label>
                                   <input type="email" name="email" value="" class=" form-control form-control-sm required email" maxlength="60">
                              </div>
                              <div class="form-group col-lg-6 col-sm-6 col-md-6">
                                   <label class="labelInput" for="">Teléfono (opcional):</label>
                                   <input type="text" name="whatsapp" value="" class="form-control form-control-sm number onlyNumber" maxlength="16">
                              </div>
                      
                              <div class="form-group col-12">
                                   <label class="labelInput" for="">Mensaje:<span class="text-danger">*</span></label>
                                   <textarea style="min-height:60px" name="message" rows="4" cols="20" class="form-control form-control-sm required" maxlength="450"></textarea>

                              </div>
                              <div class="form-group text-center col-12">
                                   <div class="g-recaptcha" data-sitekey="6LdjBLAZAAAAANjl-8JYDdiFCQC_oSJb0p-Dnj42" data-callback="enableBtn" style="transform:scale(0.8);transform-origin:0;-webkit-transform:scale(0.8);transform:scale(0.8);-webkit-transform-origin:0 0;transform-origin:0 0;"></div>
                              </div>
                           </div>

                           <button disabled type="submit" name="button" class="mb-1 btn btn-purple text-white ml-2 float-right " id="btnFormContact" ><i class="fas fa-paper-plane"></i> Enviar</button>
                           <button type="button" name="button" class="mb-1 btn btn-light float-right " onclick="vaciarForm();$('#btnFormContact').attr('disabled',true);grecaptcha.reset()"><i class="far fa-times-circle"></i> Cancelar</button>
                           </form>
                       </div>
                   </div>

               </div> --}}

               <div class="col-md-12 col-lg-12 mb-5">
                       <div class="card" style="height:100%">
                           <div class="card-header bg-gradient bg-white">
                              <h6 class="text-dark m-0"><i class="fas fa-paper-plane"></i> Nuestra ubicación:</h6>
                           </div>
                           <div class="card-body p-0">


                                <iframe style="width:100%;height:100%;min-height:400px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.7965841435453!2d-78.49610688524673!3d-0.18912679986200842!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91d59a66ebb9d4c1%3A0x456cb7c580db5e55!2sEdificio%20Metro%20Park!5e0!3m2!1ses!2sec!4v1624189941098!5m2!1ses!2sec" frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                                 {{-- <iframe style="width:100%;height:100%;min-height:400px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d18978.7678549331!2d-78.50730632741512!3d-0.19813681025510507!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91d59b18e7a9d205%3A0x1af99cd88d9c0e29!2s2V%20Soluciones%20Acad%C3%A9micas%20%26%20Empresariales!5e0!3m2!1ses!2sec!4v1590257178607!5m2!1ses!2sec"  frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe> --}}

                           </div>
                       </div>


               </div>
           </div>



      </div>
</div>


@endsection

@section('scripts')
   <script src="{{asset('public\js\formOneLine.js')}}"></script>



    <script type="text/javascript">
    // alert('x');
    function vaciarForm(){
        form = $('#message-contact');
        $(form).find('.form-control').each(function() {
            $(this).val('');
        });
        (form).find('.asunto').val('');
        $(form).data('validator').resetForm();
    }
    </script>
@endsection