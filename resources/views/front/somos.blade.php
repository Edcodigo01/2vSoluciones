@extends("front.layouts.index")
@section("content")



    <div class="" id="scrollPaginate">
{{-- public\images\default\somos\somo4.jpeg --}}
    </div>
    <div class="text-center paralax" style="background-image: url('public/images/default/somos/quienes-somos.jpeg');background-position:top;background-size: 100% 400px;background-size: cover">
      <div class="container-title" style="background:rgba(36, 35, 35, 0.38)">
           <span class="b px-3 py-2" style="display:inline-block">
               <h2 class="text-center text-white mt-1 titleArticle" ><i class="fas fa-users"></i> Nosotros</h2>
           </span>
      </div>
   </div>


    <div class="container2" style="max-width:1400px">

        <div class="row  m-auto" style="width:100%">
            <div class="col-12 wow fadeInUp my-5">
                <div class="">
                    <h3 style="text-align:center !important">Identidad </h3>
                </div>
                <div class="text-justify">
                    <p class="" style="font-size:18px">Dedicada a la asesoría y desarrollo de tesis y proyectos de fin de grado, para estudiantes de diferentes niveles de estudios: bachillerato, pregrado y posgrado.</p>
                       <p class="" style="font-size:18px">De igual modo, dedicada a la asesoría para emprendedores en la materialización de sus proyectos de negocios.</p>
                </div>
            </div>

        </div>

        <div class="row  m-auto" style="width:100%">
            <div class="col-md-6 wow fadeInLeft mb-5">
               <div style="max-width:450px;margin:auto">
               <img src="{{asset('public/images/default/somos/adriana-mision.jpeg')}}" alt="" width="100%" style="height:300px;object-fit:cover;border-radius:5px;object-position: top;">
                <h3 class="mt-2">Misión</h3>
                <p class="text-justify" style="font-size:18px">Brindar a nuestros clientes un servicio con altos estándares de calidad, para que logren sus objetivos académicos y empresariales; alcanzando la excelencia.</p>
             </div>

            </div>

            <div class="col-md-6 wow fadeInRight mb-5">
               <div style="max-width:450px;margin:auto">
                  <img src="{{asset('public/images/default/somos/escribiendo.jpg')}}" alt="" width="100%" style="height:300px;object-fit:cover;border-radius:5px">
                  <h3 class="">Visión</h3>
                  <p class="text-justify" style="font-size:18px">Ser reconocidos como una marca proveedora del servicio de asesoría académica y empresarial, caracterizada por su calidad, ética y compromiso.</p>

               </div>
            </div>

            <div class="col-md-12 wow fadeInRight">
               <div style="max-width:450px;margin:auto">
                  <img src="{{asset('public/images/default/somos/cliente-satisfecho.jpg')}}" alt="" width="100%" style="height:300px;object-fit:cover;border-radius:5px">
                  <h3 style="text-align:center !important">Filosofía de Trabajo </h3>
                  <p class="text-justify" style="font-size:18px">Garantizar la satisfacción de nuestra distinguida clientela para que sea nuestra mejor carta de presentación.</p>

               </div>
            </div>
        </div>
        <div class="row m-auto" style="width:100%">
            <div class="col-12 wow fadeInLeft mb-4">
                <div style="max-width:margin:auto">
                    <h3 style="text-align:center !important">Historia</h3>

                <div class="text-justify">
                    <p class="" style="font-size:18px">
                        Fundada en Quito - Ecuador, en el año 2017, por la Lic. Adriana Vargas y Lic. Anggi Vergara, de ahí el significado de 2V: Vargas, Vergara & Asociados, para los efectos comerciales 2V Soluciones Académicas & Empresariales. 
                    </p>
                    <p class="" style="font-size:18px">
                       En 2020, Vargas, Vergara & Asociados, pasa a ser gestionada por Adriana Vargas y socio, siendo replanteado el significado de 2V a Vargas, Venezuela & Asociados.
                    </p>
                    <p class="" style="font-size:18px">
                       Para 2023, Vargas, Venezuela & Asociados, pasa a ser Vargas, Venezuela.
                    </p>
                </div>
                 </div>
            </div>

        </div>
    </div>


        <div class="container2 mb-5">
            <div class="row m-auto" style="width:100%">
                <div class="col-12 text-center">
                   <img class="logo-n-exito-nosotros wow fadeInUp" src="{{asset('public/images/default/logos/logo-t.png')}}" alt="" style="margin:auto">
                   <h5 style="margin-top:-10px" class="text-center  wow fadeInUp"><span style="">¡Tu logro es nuestro éxito!</span></h5>
                </div>
            </div>
        </div>


@endsection