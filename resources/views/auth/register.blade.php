@extends('layout.plantilla')

@section('css')
    {{ asset('css/style-login-registro.css') }}
@endsection

@section('principal')
<div class="todo">


    <form class="formulario" action="{{ route('register') }}" method="post" enctype="multipart/form-data">
        @csrf
      <h1>Registrate</h1>
      <div class="contenedor">
        
      <div class="form-group" id="name-group">
        <div class="input-contenedor  @error('name') border border-danger @enderror" id="contenedor-name">
          <i class="fas fa-user icon"></i>
          <input type="text" name="name" placeholder="Nombre Completo" value="{{old('name')}}" >  
        </div>
        
        @error('name')
            <div class="alert alert-danger"> <strong>{{$message}}</strong></div>
            
        @enderror
      </div>
    
      <div class="form-group" id="email-group">
        <div class="input-contenedor  @error('email') border border-danger @enderror" id="contenedor-email">
          <i class="fas fa-envelope icon"></i>
          <input type="email" name="email" placeholder="Correo Electronico" value="{{old('email')}}" >  
        </div>
        
        @error('email')
            <div class="alert alert-danger"> <strong >{{$message}}</strong></div>
            
        @enderror
      </div>
    
      <div class="form-group">
        <div class="input-contenedor @error('facebook') border border-danger @enderror">
          <i class="fab fa-facebook icon"></i>
        <input type="text" name="facebook" placeholder="Facebook" value="{{old('facebook')}}">
        </div>
        
      </div>
    
      <div class="form-group">
        <div class="input-contenedor @error('twitter') border border-danger @enderror">
          <i class="fab fa-twitter-square icon"></i>
        <input type="text" name="twitter" placeholder="Twitter" value="{{old('twitter')}}">
          </div>
          
        </div>

        <div class="form-group">
          <div class="input-contenedor @error('instagram') border border-danger @enderror">
            <i class="fab fa-instagram icon"></i>
            <input type="text" name="instagram" placeholder="Instagram" value="{{old('instagram')}}">
          </div>
          
        </div>
    
        <div class="form-group" id="password-group">
        <div class="input-contenedor @error('password') border border-danger @enderror" id="contenedor-password">
          <i class="fas fa-key icon"></i>
          <input type="password" name="password" placeholder="Contraseña" >
          
        </div>
        
        @error('password')
        <div class="alert alert-danger"> <strong>{{$message}}</strong></div>
        
    @enderror
        </div>
      
        <div class="form-group">
        <div class="input-contenedor">
          <i class="fas fa-key icon"></i>
          <input type="password" name="password_confirmation" placeholder="Repetir Contraseña" >
          
        </div>
        
        </div>
    
        <div class="custom-file mb-3" id="avatar-group">
          <input type="file" class="custom-file-input" lang="es" name="avatar" id="contenedor-avatar">
          <label class="custom-file-label" for="customFileLang">Seleccionar Foto de Perfil</label>
          
        @error('avatar')
        <div class="alert alert-danger"> <strong>{{$message}}</strong></div>       
        @enderror
        </div>
        <input type="submit" value="Registrate"  class="button">
        <p>Al hacer clic en "Registrate", aceptas nuestras Condiciones de uso y Politica de privacidad</p>
        <p>¿Ya tienes cuenta?<a class="link" href="/login">Iniciar Sesion</a></p>
        
      </div>
        </form>
    </div>
    
   
    




{{-- 

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
@section('script')
<script src="{{asset('js/validarRegistro.js')}}"></script>
@endsection
