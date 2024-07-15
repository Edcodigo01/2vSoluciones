

<div class="modal" tabindex="-1" role="dialog" id="modalLogin">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-gradient">
        <h5 class="modal-title text-white" id="exampleModalLabel">Iniciar Sessión</h5>
        {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> --}}
      </div>
      <div class="modal-body">
        <div class="container">
          {{-- <input type="text" name="" value="{{route('login')}}"> --}}
          <form class="formula validate" action="{{route('login')}}" method="post" id="form-login">

            <div class="form-group ">
              <label class=""for=""><i class="fas fa-user"></i> Usuari@</label>
              <input type="text"  class="form-control form-control-lg required" name="email" value="">
            </div>
            <div class="form-group">
              <label for=""><i class="fas fa-key"></i> Contraseña</label>
              <input type="text" class="form-control form-control-lg required password" name="password" value="">
            </div>
            <div class="form-group">
              <button type="submit" class="btn  bg-green btn-lg btn-block">Iniciar Sessión</button>
              <button type="button" class="btn btn-secondary btn-lg btn-block cancel">Cancelar</button>
            </div>

            {{-- <button type="button" class="btn academy-btn btn-block">Iniciar Sessión</button>
            <button type="button" class="btn academy-btn btn-block" style="background:white;border:solid 1px grey;color:grey">Cancelar</button> --}}
          </form>
          <br>
        </div>

      </div>

    </div>
  </div>
</div>
