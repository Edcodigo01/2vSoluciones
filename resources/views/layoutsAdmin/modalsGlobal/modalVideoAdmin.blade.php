<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modalVideo">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-gradient p-3">
        <h5 class="text-white" style="margin:0px"><i class="fas fa-video"></i> Reproductor de Video</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" data-toggle="tooltip" data-placement="top" title="Cerrar">
            <span aria-hidden="true"><i class="fas fa-times"></i></span>
        </button>

      </div>

      <div class="modal-body">
          <div class="container">
                <iframe style="width:100%;height:400px" src="https://www.youtube.com/embed/tgbNymZ7vqY" id="videoYoutube" allowfullscreen = "allowfullscreen"></iframe>
          </div>

          <h2 id="titleVideoModal" class="text-center text-purple  mt-2"></h2>
          <p id="descVideoModal" class="text-justify"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class=" btn btn-secondary font600" name="button" onclick="closeModalVideo();">Cerrar</button>

      </div>

    </div>
  </div>
</div>
