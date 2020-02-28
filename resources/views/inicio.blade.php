@extends('layout.plantilla')


<?php
  
  /* include_once 'config.php'; */


/*   function okActualizar(){
    if (isset($_GET["actualizar"])) {
        if ($_GET["actualizar"] == "ok") {
            return true;                
        }
    }   
} */
/* 
if (isset($_SESSION)) {
    if ($_SESSION) {
        if ($_SESSION["email"] == "admin@admin.com") {
            $usuarioAdmin = new UsuarioAdmin($_SESSION);

            }else{
            
            $usuario = new UsuarioComun($_SESSION);

            }

    }

      
}
     */

        
?>
 @section('css')
     {{ asset('css/style.css') }}
 @endsection

@section('principal')
@if (session()->has('mensaje'))
  <div class="alert alert-success m-0  d-flex justify-content-center">
    <strong>🌴{{ session()->get('mensaje') }}🌴</strong>
  </div>
@endif

<div class="container-fluid contenedor-nav">
    <div class="row">
       
      <div class="col-12">
       <?php // if(okActualizar()): ?>
            {{-- <div class="alert alert-success m-0" role="alert">
               <b>🌴 ACTUALIZACIÓN EXITOSA! INGRESE PARA COMPROBAR CAMBIOS 😄</b> 
            </div> --}}
        <?php // endif; ?>
    </div>
    
      <div class="col-12 carrusel-container">
      
        <section class="texto-carrusel">
          
          <h1>DigitalTurismo <br>te acerca a los mejores destinos de Argentina<p>Veni a conocer nuestros Maravillosos Paisajes</p></h1>
        </section>
        <section class="carrusel">
          <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="{{asset('images/dibujo1.svg')}}" class="d-block w-100 img-fluid" alt="...">
              </div>
              <div class="carousel-item">
                <img src="{{asset('images/dibujo2.svg')}}" class="d-block w-100 img-fluid" alt="...">
              </div>
              
            </div>
          </div>
        </section>
      </div> 
    </div>
  </div>
  
  <!------------------ SECCION DE PRODUCTOS  ----------------- -->
  <div class="container-fluid ">
    <div class="row contenedor_seccion_productos">
      
      <section class="col-12">
        <div class="col-12">
          <h2>
            <i class="fas fa-percent"><span>off</span></i> Promociones
          </h2> 
        </div>
        
        <div class="img-cont-promo d-flex flex-wrap">
          @foreach ($destinosPromo as $destinoPromo)
            
              <article class="col-12 col-md-6 col-xl-4 flex-sm-shrink-0"> 
                <div class="card carta-promocion">
                  @guest
                  <button type="submit" class="favorito" title="Agregar Favorito"><i class="fas fa-heart"></i></button>
                  @else
                  {{-- Devuelvo posicion del id favorito tener cuidado que puede dar cero comprobar con false --}}
                    @if(Auth::user()->idFavoritos()->search($destinoPromo->id_destino) !== false)
                    <form action="/quitarFavorito" method="post">
                      @csrf
                    <input type="hidden" name="usuario" value="{{Auth::user()->id}}">
                    <button type="submit" class="favorito-red" title="Eliminar Favorito" name="quitarFav" value="{{$destinoPromo->id_destino}}"><i class="fas fa-heart"></i></button>
                    </form>
                    @else
                    <form action="/agregarFavorito" method="post">
                      @csrf
                    <input type="hidden" name="usuario" value="{{Auth::user()->id}}"> 
                    <button type="submit" class="favorito" title="Agregar Favorito" name="agregarFav" value="{{$destinoPromo->id_destino}}"><i class="fas fa-heart"></i></button>
                  </form>
                    @endif
                  @endguest
                  <img src="{{asset('images/OfertaEspecial.png')}}" alt="promo" class="logo-promo">
                  <div class="imagen-articulo-contenedor">
                    <a href="detalleProducto.php" class="acceso-carrito" title="Más información">
                      <h3>{{$destinoPromo->nombre_destino}}</h3>
                      
                    <h4 class="precio-promo">$ {{$destinoPromo->precio}}</h4><span> {{$destinoPromo->promocion}}%OFF</span>
                    <p><b>${{$destinoPromo->precio - ($destinoPromo->precio * ($destinoPromo->promocion/100))}}</b></p>
                    </a> 
                  </div>
                  <img src="{{asset('images/destinos/' .$destinoPromo->avatar_destino)}}" class="card-img-top avatar" alt="...">
                  <div class="fondo-coment">
                    <div class="puntuacion">
                        <small>{{ round($destinoPromo->comentarios()->avg('puntuacion'), 2) }}</small>
                        <img class="estrella" src=
                        "{{ asset('images/iconoEstrella.png') }}"
                        alt="Estrellas">
                    </div>
                    <div class="coment">
                        <small>comentarios ({{$destinoPromo->comentarios->count()}})
                        </small>
                    </div>
                </div>
                </div>
          </article>
          @endforeach
        </div>  
      </section> 
      <!--------------------- DESTACADOS---------------------------->
      
      <section class="col-12">
        <div class="col-12">
          <h2>
            <i class="fas fa-star"></i> Destacados
          </h2>
        </div>
        <div class="img-cont-destacado d-flex flex-wrap">
          @foreach ($destinosDestacados as $destinoDestacado)
            <article class="col-12 col-md-6 col-xl-4  flex-sm-shrink-0">
              <div class="card carta-promocion">
                @guest
                     <button class="favorito"><i class="fas fa-heart"></i></button>
                     @else
                     @if (Auth::user()->idFavoritos()->search($destinoDestacado->id_destino)!==false)
                     <form action="/quitarFavorito" method="post">
                      @csrf
                      <input type="hidden" name="usuario" value="{{Auth::user()->id}}">
                      <button type="submit" class="favorito-red" title="Eliminar Favorito" name="quitarFav" value="{{$destinoDestacado->id_destino}}"><i class="fas fa-heart"></i></button>
                    </form>                        
                     @else
                     <form action="/quitarFavorito" method="post">
                      @csrf
                      <input type="hidden" name="usuario" value="{{Auth::user()->id}}">
                      <button type="submit" class="favorito" title="Agregar Favorito" name="agregarFav" value="{{$destinoDestacado->id_destino}}"><i class="fas fa-heart"></i></button>
                    </form> 
                     @endif
                @endguest
               
                <img class="star-destacado" src="{{asset('images/stars.png')}}" alt="">
                <div class="imagen-articulo-contenedor">
                  <a href="detalleProducto.php" class="acceso-carrito" title="Más información">
                    <h3>{{$destinoDestacado->nombre_destino}}</h3>
                  
                    @if ($destinoDestacado->promocion > 0 )
                        <h4 class="precio-promo">$ {{$destinoDestacado->precio}}</h4><span> {{$destinoDestacado->promocion}}%OFF</span>
                        <p><b>${{$destinoDestacado->precio - ($destinoDestacado->precio * ($destinoDestacado->promocion/100))}}</b></p>
                    @else
                        <h4>${{$destinoDestacado->precio}}</h4>
                    @endif
                    
                  </a> 
                </div>
                <img src="{{asset('images/destinos/'. $destinoDestacado->avatar_destino)}}" class="card-img-top avatar" alt="...">
                  <div class="fondo-coment">
                    <div class="puntuacion">
                        <small>{{round($destinoDestacado->promedio,2)}}</small>
                        <img class="estrella" src=
                        "{{ asset('images/iconoEstrella.png') }}"
                        alt="Estrellas">
                    </div>
                    <div class="coment">
                        <small>comentarios ({{$destinoDestacado->comentarios}})
                        </small>
                    </div>
                </div>
              </div>
            </article>
          @endforeach
          

          
      <!--------------------- DESTINOS---------------------------->
      
      <section class="col-12">
        <div class="col-12">
          <h2>
            <i class="fas fa-plane-departure"></i>Destinos
          </h2> 
        </div>
        <div class="img-cont-destino d-flex flex-wrap">
          @foreach ($destinos as $destino)
          <article class="col-12 col-md-6 col-xl-4  flex-sm-shrink-0">
            <div class="card carta-promocion">
              @guest
                  <button type="submit" class="favorito" title="Agregar Favorito"><i class="fas fa-heart"></i></button>
                  @else
                  {{-- Devuelvo posicion del id favorito tener cuidado que puede dar cero comprobar con false --}}
                    @if(Auth::user()->idFavoritos()->search($destino->id_destino) !== false)
                    <form action="/quitarFavorito" method="post">
                      @csrf
                    <input type="hidden" name="usuario" value="{{Auth::user()->id}}">
                      <button type="submit" class="favorito-red" title="Eliminar Favorito" name="quitarFav" value="{{$destino->id_destino}}"><i class="fas fa-heart"></i></button>
                    </form>
                    @else 
                    <form action="/agregarFavorito" method="post">
                      @csrf
                      <input type="hidden" name="usuario" value="{{Auth::user()->id}}">
                    <button type="submit" class="favorito" title="Agregar Favorito" name="agregarFav" value="{{$destino->id_destino}}"><i class="fas fa-heart"></i></button>
                    </form>
                    @endif
                  @endguest
              <div class="imagen-articulo-contenedor">
                <a href="detalleProducto.php" class="acceso-carrito" title="Más información">
                <h3>{{$destino->nombre_destino}}</h3>
                 
                  <h4>$ {{$destino->precio}}</h4>
                </a> 
              </div>
              <img src="{{asset('images/destinos/'.$destino->avatar_destino)}}" class="card-img-top avatar" alt="...">
              <div class="fondo-coment">
                <div class="puntuacion">
                    <small>{{ round($destino->comentarios()->avg('puntuacion'), 2) }}</small>
                    <img class="estrella" src=
                    "{{ asset('images/iconoEstrella.png') }}"
                    alt="Estrellas">
                </div>
                <div class="coment">
                    <small>comentarios ({{$destino->comentarios->count()}})
                    </small>
                </div>
            </div>
            </div>
          </article>
          @endforeach 
          

        </div>
      </section>
    </div>
  </div>
  </div>
  
  
  
  
  <!--------------FOOTER------------------------------->
  
  <div class="container-fluid">
    <div class="row">
        <div class="col-12 p-0">
            <footer>
              <div class="social d-flex flex-wrap">
                <div class="mision col-12 row justify-content-center">
                  <div class="col-sm-6">
                    <h2>Nuestra Misión</h2>
                    <h4 class="mt-3">DigitalTurismo busca fomentar el turismo en Argentina, para que crezca el sector, trayéndole a los usuarios los más lindos paisajes para visitar.</h4>
                </div>
                </div>
                
                <div id="contacto" class="contacto mt-5 col-md-6">
                  <h3>Contacto</h3>
                  <form action="/contacto" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email</label>
                      <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email..." name="email" value="">
                      
                    </div>
                    @error('email')
                      <div class="alert alert-danger"> <strong>{{$message}}</strong></div>                        
                    @enderror
                    
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Mensaje</label>
                      <textarea class="form-control @error('mensaje') is-invalid @enderror" id="exampleFormControlTextarea1" rows="5" placeholder="Mensaje..." name="mensaje" value=""></textarea>
                      
                    </div>
                    @error('mensaje')
                      <div class="alert alert-danger"> <strong>{{$message}}</strong></div>                        
                    @enderror
                    <button type="submit" class="btn btn-info btn-block">Enviar</button>
                  </form>
                </div>
              <!-- ICONOS DE RED SOCIAL !-->
                <div class="red-social mt-5 col-md-6">
                  <h3 class="mb-4">Visitanos</h3>
                  <a class="a-iconos" href="#"><i class="fab fa-facebook-f icono-facebook mb-5"></i></a>
                  <a class="a-iconos" href="#"><i class="fab fa-instagram mb-5"></i></a>
                  <a class="a-iconos" href="#"><i class="fab fa-twitter mb-5"></i></a> 
                </div>
              </div>  
              
              <div class="copyright p-5 bg-dark">
                <span>Design DigitalTeam<i class="far fa-copyright"></i> 2020</span>
              </div>
            </footer>
            
          </div>
    </div>
    
  </div>
  
  

@endsection
  