<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  
  <link rel="stylesheet" href="{{asset('css/style-admin.css')}}">
  <style>
    .imagen-preloader{
      max-width: 400px;
      max-height: 400px;
    }
    .cont-preloader{
      width: 100%;
      height: 100vh;
      background-color: #fff;
      position: fixed;
      top:0;
      left: 0;
      z-index: 100000;
    }
    .hidden{
      overflow: hidden;
    }
    .none{
      display: none;
    }
  </style>
  <script src="https://kit.fontawesome.com/67f61afa3e.js" crossorigin="anonymous"></script>
  <title>digitalturismo</title>
</head>

<body class="hidden">
    <div class="container-fluid cont-preloader">
        <div class="row cont-preloader justify-content-center align-items-center">
          <div class="col-12 text-center">
          <img class="imagen-preloader img-fluid " src="{{asset('images/digitalTurismoLogo1.png')}}" alt="">
          <p>
            <div class="lds-dual-ring"></div>
          </p>      
          </div>      
        </div> 
      </div>

            <div class="container-fluid">
                <div class="row">

                    <div class="col-12 p-0">
                        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                        <a class="navbar-brand" href="/"><img class="logo-barra" src="
                        {{asset('images/digitalTurismoLogoBlanco.png')}}" alt="logo"> </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                                <div class="navbar-nav">
                                <a class="nav-item nav-link active" href="/adminInicio">Home Admin</a>
                                <a class="nav-item nav-link active" href="/adminUsuarios">Lista de Usuarios</a>
                                <a class="nav-item nav-link active" href="/adminDestinos">Lista de Destinos</a>
                                <a class="nav-item nav-link active" href="#3">Viajes Comprados</a>
                                
                                </div>
                                <ul class="navbar-nav ml-md-auto">
                                    <li class="nav-item dropdown ">
                                    <a class="nav-link dropdown-toggle boton-ingreso p-2 d-flex justify-content-center align-items-center text-uppercase text-white" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown">{{ Auth::user()->name}}</a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                     @if (Auth::user()->email == "admin@admin.com" )
                      <a class="dropdown-item" href="/adminInicio">Mi perfil</a>
                    @else
                        <a class="dropdown-item" href="/user">Mi perfil</a>
                    @endif
                                            
    
                                              <div class="dropdown-divider"></div>
                                             
                                             <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">Salir</a>
                                             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                              @csrf
                                          </form>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            
                        </nav>
                    </div>    
                
                
                </div>
            </div>



            @yield('principal')




            @include('sweetalert::alert')
<script src="{{asset('js/preloader.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
@yield('script')
</body>

</html>