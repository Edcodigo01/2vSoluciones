<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modalVideo">
  <div class="modal-dialog modal-lgx">
    <div class="modal-content">
        {{-- <div class="modal-header bg-gradient p-3">
          <h4 class="text-white" style="margin:0px"><i class="fas fa-video"></i> Reproductor de Video</h4>
          <button type="button"  class="close" data-toggle="tooltip" data-placement="top" title="Cerrar" onclick="closeModalVideo();">
              <span aria-hidden="true"><i class="fas fa-times"></i></span>
          </button>

        </div> --}}
        <div class="modal-body p-1">

                  <iframe src="" id="videoYoutube" allowfullscreen = "allowfullscreen"></iframe>

                  <h2 id="titleVideoModal" class="text-center text-purple  mt-2"></h2>
                  <p id="descVideoModal" class="text-justify font600 mt-2"></p>

            <button type="button" class=" btn bg-green font600 float-right" name="button" onclick="closeModalVideo();">Cerrar</button>
        </div>
    </div>
  </div>
</div>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modalVideo2">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-gradient p-3">
        <h4 class="text-white" style="margin:0px"><i class="fas fa-video"></i> Reproductor de Video</h4>
        <button type="button"  class="close" data-toggle="tooltip" data-placement="top" title="Cerrar" onclick="closeModalVideo();">
            <span aria-hidden="true"><i class="fas fa-times"></i></span>
        </button>

      </div>

      <div class="modal-body">
          <div class="container">
                <iframe style="width:100%;height:400px" src="" id="videoYoutube" allowfullscreen = "allowfullscreen"></iframe>

                <h2 id="titleVideoModal" class="text-center text-purple  mt-2"></h2>
                <p id="descVideoModal" class="text-justify font600 mt-2"></p>
          </div>



          <button type="button" class=" btn bg-green font600 float-right" name="button" onclick="closeModalVideo();">Cerrar</button>

      </div>


    </div>
  </div>
</div>
