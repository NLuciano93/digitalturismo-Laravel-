
<div class="col-12 p-0">
    <header>
      <nav class="navbar navbar-expand-lg navbar-dark barraNavegacion">
        <a class="navbar-brand" href="/"><img class="logo-barra" src="{{asset('images/digitalTurismoLogoBlanco.png')}}" alt="logo"> </a>
        <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon menu-hamburguesa"></span>
        </button>
        
        <div class="collapse navbar-collapse div-barralinks" id="navbarSupportedContent">
          <ul class="navbar-nav contenedor-links">
            <li class="nav-item items-barra">
              <a class="nav-link" href="/"><i class="fas fa-home"></i><p>HOME</p></a>
            </li>
            <li class="nav-item items-barra">
              <a class="nav-link" href="/faq"><i class="far fa-question-circle"></i><p>FAQ</p></a>
            </li>
            <li class="nav-item items-barra">
              <a class="nav-link" href="/destinos"><i class="fas fa-suitcase"></i><p>DESTINOS</p></a>
            </li>
            
          </ul>
          
          @guest
              
          
        
        <a href="{{route('login')}}"><button class="btn my-2 my-sm-0 boton-ingreso" type="submit"><i class="fas fa-user"></i>INGRESAR</button></a>
          @else
          
            <ul class="navbar-nav ml-md-auto">
            
                                <li class="nav-item dropdown ">
                                <a class="nav-link dropdown-toggle boton-ingreso p-2 d-flex justify-content-center align-items-center text-uppercase text-white" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown">{{ Auth::user()->name}}@if(Session::has('carrito'))<span class="aviso-carrito mb-3 bg-danger"></span>@endif</a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                 @if (Auth::user()->rol_id == 2)
                  <a class="dropdown-item" href="/adminInicio">Mi perfil</a>
                @else
                    <a class="dropdown-item" href="/user">Mi perfil</a>
                @endif
                  <a class="dropdown-item" href="/carritoCompra">Mi carrito<i class="fas fa-shopping-cart carrito-nav">
                      @if(Session::has('carrito'))<i class="fas fa-circle text-danger circulo"></i>@endif
                  </i></a>
                                        

                                          <div class="dropdown-divider"></div>
                                         
                                         <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">Salir</a>
                                         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                          @csrf
                                      </form>
                                    </div>
                                </li>
                            </ul>
            @endguest 

        </div>
      </nav>
    </header> 
</div>
