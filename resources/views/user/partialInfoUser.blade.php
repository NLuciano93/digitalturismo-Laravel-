<div class="tab-pane fade  @if(!session('favorito')) @if(!($errors->first('viejaPassword') || $errors->first('password')))show active @endif @endif" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
    <h2 class="mb-3">Actualizar Datos</h2>
    <form action="/usuarioActualizado" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}   
      
      <div class="form-row">
        <div class="col-md-12">
          <div class="md-form form-group">
           
      <input type="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail4MD" placeholder="Insertar Email" name="email" value="{{Auth::user()->email}}">
      @error('email')
          <div class="alert alert-danger">
              <strong id="emailHelp" class="form-text text-danger">{{$message}}</strong>
          </div>
          
      @enderror
          </div>
        </div>                    
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="md-form form-group">
            <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="inputAddressMD" placeholder="Insertar Nombre" name="nombre" value="{{Auth::user()->name}}">
            @error('nombre')
            <div class="alert alert-danger">
                <strong id="nombreHelp" class="form-text text-danger">{{$message}}</strong>
            </div>
         
            @enderror
          </div>
        </div>  
    </div>                  
      <div class="form-row">
        <div class="col-md-12">
          <div class="md-form form-group">
            <input type="text" class="form-control" id="inputCityMD" placeholder="Insertar Facebook" name="facebook" value="{{Auth::user()->facebook}}">
          </div>
        </div>                    
        <div class="col-md-12">
          <div class="md-form form-group">
            <input type="text" class="form-control" id="inputZipMD" placeholder="Insertar twitter" name="twitter" value="{{Auth::user()->twitter}}">      
          </div>
        </div>
        <div class="col-md-12">
          <div class="md-form form-group">
            <input type="text" class="form-control" id="inputZipMD" placeholder="Insertar Instagram" name="instagram" value="{{Auth::user()->instagram}}"> 
          </div>
        </div>
      </div>                  
      <div class="custom-file">
        <input type="file" class="custom-file-input @error('avatar') is-invalid @enderror" id="customFileLang" lang="es" name="avatar">
        <label class="custom-file-label" for="customFileLang">Seleccionar Foto de Perfil</label>
        @error('avatar')
          <div class="alert alert-danger">
              <strong id="archivolHelp" class="form-text text-danger">{{$message}}</strong>
          </div>
          
      @enderror
      </div>
      <div class="mt-3">
      <button type="submit" class="btn btn-primary btn-md" name="user" value="">Actualizar datos</button>                    
      </div>                   
    </form>
  </div>