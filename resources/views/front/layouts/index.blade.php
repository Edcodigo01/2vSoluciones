<!DOCTYPE html>
<html lang="es" style="position:relative">
<head>
   @include("front.layouts.head")
   @yield("styles")
   <link rel="stylesheet" href="{{asset("public\libraries\animate.css")}}">
   
   <meta property="fb:app_id" content="201064434390930" />
</head>
<body>
   <div class="bg-lock"></div>

      @include("front.layouts.main")

      @if (!strpos(request()->url(),'inicio-de-sesion'))
          @include("front.layouts.navbar")
          @include("front.layouts.fixedSocial")
      @endif
      {{-- @include("layouts.loader") --}}
      <div class="bg-" style="min-height:80%;">
          @yield("content")
      </div>
      @if (!strpos(request()->url(),'inicio-de-sesion'))
      @include("front.layouts.footer")
      @endif

      @include("front.layouts.scripts")
      <input type="hidden" name="" value="{{url('/')}}" id="url_base">

      @yield("scripts")
      <script src="{{asset("public\libraries\wow.js")}}"></script>
      <script type="text/javascript">
      $(document).ready(function() {
          wow = new WOW(
              {
                  animateClass: 'animated',
                  offset:       100,
                  callback:     function(box) {
                      console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
                  }
              }
          );
          wow.init();
      });
      </script>
      <div id="loader">
          <div class="loader-background">
          </div>
          <div class="loader loader-1">
            <div class="loader-outter"></div>
            <div class="loader-inner"></div>
          </div>
      </div>

</body>

</html>