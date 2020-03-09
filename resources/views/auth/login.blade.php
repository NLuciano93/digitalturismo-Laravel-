@extends('layout.plantilla')

@section('css')
    {{ asset('css/style-login-registro.css') }} 
@endsection

@section('principal')

<div class="todo">

 <form class="formulario" method="post" action="{{ route('login') }}">
    @csrf
    
        <h1>Login</h1>
        <div class="contenedor">
            <div class="input-contenedor @error('email') border border-danger @enderror">
                    <i class="fas fa-envelope icon"></i>
                    <input class ="" type="email" placeholder="Correo Electronico" name="email" value="{{ old('email') }}" required autocomplete="email" >
                    
                    
            </div>
                @error('email')
                        <div class="alert alert-danger"> <strong>{{$message}}</strong></div>
                        
                    @enderror
    
            <div class="input-contenedor @error('password') border border-danger @enderror">
                    <i class="fas fa-key icon"></i>
                    <input class="" type="password" placeholder="Contraseña" name="password" required autocomplete="current-password">
               
            </div>
            @error('password')
            
                <div class="alert alert-danger"> <strong>{{$message}}</strong></div>
                
            @enderror 
    
            <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="custom-control-label" for="remember">Recordarme</label>
            </div>

            <input type="submit" value="Login" class="button">
            <div class="mt-2">
            <p>¿No tienes cuenta aun?<a class="link ml-2" href="{{ route('register') }}">Registrate</a></p>
            </div>
        <div class="mt-2">
            
            @if (Route::has('password.request'))
            <a class="btn btn-link link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
        @endif
        </div>
             
        </div>
    </form>
                
    {{-- ------------------------------------------------------ --}}
    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Loginasd') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}

     {{-- ------------------------------------------------------ --}}
</div>
@endsection
