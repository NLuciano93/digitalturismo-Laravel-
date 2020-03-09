<div class="tab-pane fade @if(!session('favorito')) @if(($errors->first('viejaPassword') || $errors->first('password')))show active @endif @endif" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
    <h2>Cambia tu contraseña</h2>
            
    <form action="/passActualizar" method="POST">
      {{ csrf_field() }}  
      <div class="form-group">
        <label for="inputPassword6" class="font-weight-bold">Contraseña actual</label>
        <input type="password" id="inputPassword6" class="form-control mx-sm-3" aria-describedby="passwordHelpInline" name="passwordActual">
        @error('passwordActual')
        <div class="alert alert-danger ml-sm-3">
          <strong id="passHelp" class="form-text text-danger">{{$message}}</strong>
        </div>                 
        @enderror
      </div>                  
      <br>                  
      <div class="form-group">
        <label for="inputPassword6" class="font-weight-bold">Nueva contraseña</label>
        <input type="password" id="inputPassword6" class="form-control mx-sm-3" aria-describedby="passwordHelpInline" name="password">
        @error('password')
        <div class="alert alert-danger ml-sm-3">
          <strong id="passwordlHelp" class="form-text text-danger">{{$message}}</strong>
        </div>               
        @enderror
      </div>                  
      <br>
      <div class="form-group">
        <label for="inputPassword6" class="font-weight-bold">Repetir nueva contraseña</label>
        <input type="password" id="inputPassword6" class="form-control mx-sm-3" aria-describedby="passwordHelpInline" name="password_confirmation">
        
      </div>                  
      <br>
      <div>
      <button type="submit" class="btn btn-dark" value="">Cambia tu contraseña</button>
      </div>
      
      
      
      
    </form>               
  </div>