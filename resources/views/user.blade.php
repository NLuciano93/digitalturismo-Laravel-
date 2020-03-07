@extends('layout.plantilla')
@section('css')
     {{ asset('css/style-user.css') }}
 @endsection
 @section ('principal')
 
{{--  Auth::user() --}}
 <!-- Imagen usuario-->
 <div class="contenedor_usuario">
    <div class="container">
      <div class="jumbotron jumbotron-fluid mt-0">
        <div class="container">
        <h2>{{Auth::user()->name}}</h2>
          <div class="d-flex justify-content-center h-100">
            <div class="image_outer_container">
              <div class="image_inner_container">
                <img class="img-fluid img-thumbnail" src="{{ asset('images/usuarios/' . Auth::user()->avatar)}}">
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!--Datos-->
   
      <div class="row">
        <div class="col-4">
          <div class="list-group" id="list-tab" role="tablist">
            <a class="list-group-item list-group-item-action @if(!($errors->first('passwordActual') || $errors->first('password')))active @endif" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Información personal</a>
            <a class="list-group-item list-group-item-action @if(($errors->first('passwordActual') || $errors->first('password')))show active @endif" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Cambiar contraseña</a>
            <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Favoritos</a>
            <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Contactos</a>
          </div>
        </div>
        <div class="col-8">
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade @if(!($errors->first('viejaPassword') || $errors->first('password')))show active @endif" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
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

            <div class="tab-pane fade @if(($errors->first('viejaPassword') || $errors->first('password')))show active @endif" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
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

            <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
              <section class="section pb-3 text-center">                
                <div class="row">                    
                  <div class="col-lg-4 col-md-12 mb-4">                      
                    <div class="card testimonial-card">                        
                      <div class="card-up teal lighten-2">
                      </div>                        
                      <div class="avatar mx-auto white"><img src="images/img-user/sanluis.jpg"
                        alt="avatar mx-auto white" class="rounded-circle img-fluid">
                      </div>                        
                      <div class="card-body">
                        <h4 class="card-title mt-1">Valle de Talampaya</h4>
                        <hr>
                        <p>El parque nacional Talampaya se encuentra ubicado en el centro-oeste de la provincia de La Rioja en Argentina </p>
                      </div>                        
                    </div>                      
                  </div>                    
                  <div class="col-lg-4 col-md-12 mb-4">                      
                    <div class="card testimonial-card">                        
                      <div class="card-up blue lighten-2">
                      </div>                        
                      <div class="avatar mx-auto white"><img src="images/img-user/bariloche.jpg"
                        alt="avatar mx-auto white" class="rounded-circle img-fluid">
                      </div>                        
                      <div class="card-body">
                        <h4 class="card-title mt-1">Bariloche
                        </h4>
                        <hr>
                        <p>San Carlos de Bariloche, conocida simplemente como Bariloche,1​ es una ciudad ubicada en la provincia de Río Negro, Argentina.
                        </p>
                      </div>                        
                    </div>                      
                  </div>                    
                  <div class="col-lg-4 col-md-12 mb-4">                      
                    <div class="card testimonial-card">                        
                      <div class="card-up deep-purple lighten-2"></div>                        
                      <div class="avatar mx-auto white"><img src="images/img-user/calafate.jpg"
                        alt="avatar mx-auto white" class="rounded-circle img-fluid">
                      </div>                        
                      <div class="card-body">
                        <h4 class="card-title mt-1">El Calafate</h4>
                        <hr>
                        <p>Es una ciudad ubicada en la ribera meridional del lago Argentino, en la región de la Patagonia, en la provincia de Santa Cruz, Argentina</p>
                      </div>                        
                    </div>                      
                  </div>                    
                </div>                  
              </section>
            </div>
            <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
              <section class="section pb-3 text-center">               
                <div class="row">                    
                  <div class="col-lg-4 col-md-12 mb-4">                      
                    <div class="card testimonial-card">                        
                      <div class="card-up teal lighten-2">
                      </div>                        
                      <div class="avatar mx-auto white"><img src="images/img-user/mariano.jpg"
                        alt="avatar mx-auto white" class="rounded-circle img-fluid">
                      </div>                        
                      <div class="card-body">
                        <h4 class="card-title mt-1">Mariano Rojas</h4>
                        <hr>
                        <p> @Mariano10</p>
                      </div>                        
                    </div>                      
                  </div>                    
                  <div class="col-lg-4 col-md-12 mb-4">                      
                    <div class="card testimonial-card">                        
                      <div class="card-up blue lighten-2">
                      </div>                        
                      <div class="avatar mx-auto white"><img src="images/img-user/carlos.png"
                        alt="avatar mx-auto white" class="rounded-circle img-fluid">
                      </div>                        
                      <div class="card-body">
                        <h4 class="card-title mt-1">Carlos Jose </h4>
                        <hr>
                        <p> @JoseHernandez </p>
                      </div>                        
                    </div>                      
                  </div>                    
                  <div class="col-lg-4 col-md-12 mb-4">                      
                    <div class="card testimonial-card">                        
                      <div class="card-up deep-purple lighten-2"></div>                        
                      <div class="avatar mx-auto white"><img src="images/img-user/maria.png"
                        alt="avatar mx-auto white" class="rounded-circle img-fluid">
                      </div>                        
                      <div class="card-body">
                        <h4 class="card-title mt-1">Maria Sanchez</h4>
                        <hr>
                        <p> @MariaSanchez </p>
                      </div>                        
                    </div>                      
                  </div>                    
                </div>                  
              </section>
            </div>
          </div>
        </div>
        @endsection
