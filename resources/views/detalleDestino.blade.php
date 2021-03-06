@extends('layout.plantilla')

@section('css')
     {{ asset('css/styleDetalleProductos.css') }}
@endsection

@section('principal')

<div class="container-fluid p-0 m-0 ">
<div class="row p-0 m-0">
<div class="col-12 p-0 m-0">

<div class="fondo_producto">
    
    <div class="contenedor-detalle">

<!-- icono Mi carrtito-->
    <div class="carritoIcono">
    
        <div class="tit-carrito">
            <a type="button" class="btn btn-dark" href="/carritoCompra">       
                <i class="fas fa-shopping-cart carrito-nav"> @if(Session::has('carrito'))<span class="bg-danger circulo-detalle"></span>@endif</i>
            </a>
           
        </div>  
    </div> 

        <div class="row">
            <div class="col-xs-12 box1">
                 <h4>{{$Destino->nombre_destino}}
                   
                </h4>
            </div>
        </div>

        <div class="row">
        
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <a href="#modalImagenes" data-target="#modalImagenes" data-toggle="modal">
                <div class="contenedor-collage">
                    <div class="collage">
                        <img class="img-Principal" src=
                        "{{ asset('images/destinos') }}/{{ $Destino->avatar_destino}}"alt="Bariloche"> 
                    </div>
            
                    <div class="collage">
                        <img class="img-Principal" src=
                        "{{ asset('images/destinos') }}/{{ $Destino->avatar_destino}}" alt="Bariloche">
                    </div>

                    <div class="collage">
                        <img class="img-Principal" src=
                        "{{ asset('images/destinos') }}/{{ $Destino->avatar_destino}}"  alt="Bariloche">
                    </div>

                    <div class="collage">
                        <img class="img-Principal" src=
                        "{{ asset('images/destinos') }}/{{ $Destino->avatar_destino}}"  alt="Bariloche">
                    </div>
                </div>
                </a>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <article class="detalle-infao">        
                    <span class="m-1">{{$Destino->nombre_destino}}
                        
                    </span>
                    <p class="m-0">
                       <i class="fas fa-heart text-danger"></i>{{$Destino->favoritos()->count()}} 
                    </p>
                    <p class="m-0">
                    <i class="fas fa-star text-warning"></i>{{round($Destino->comentarios()->avg('puntuacion'),2)}}
                    </p>
               
                    
                    <div class="costos">
                        <h6 class="text-right m-1">Costo por Pasajero</h6>
                   @if ($Destino->promocion > 0)
                   <h4 class="text-right m-1"> <span class="precio-promo">${{$Destino->precio}} </span><small>{{$Destino->promocion}}%OFF</small></h4>
                   <h3 class="text-right m-1"><b>${{$Destino->precio - ($Destino->precio *($Destino->promocion/100))}}</b></h3>
                   @else
                       <h4 class="text-right m-1">${{$Destino->precio}}</h4>
                   @endif
                        
                        <h3 class="m-1">Detalle</h3>
                        <p class="m-1">{{$Destino->detalle}}</p>
                        <h3 class="m-1">Descripción</h3>
                        <p class="m-1">{{$Destino->descripcion}}</p>
                    </div> 
                </article>  
            </div>
            
            <div class="col-xs-12">               
                <div class="iconos-pie-card box-iconos">
                   
                   {{--  <img class="icon-compar" src="
                    {{ asset('images/compartir-Icon.png') }}"
                    alt="compartir" title="Compartir">
                    <img class="icon-compar" src="
                    {{ asset('images/botonCarritoCompra-2.png') }}"
                    alt="carrito" title="Agregar al Carrito de Compras">
                    <span>
                        @if (Auth::user()->idFavoritos()->search($Destino->id_destino) !== false)
                        <form action="/quitarFavorito" method="post" class="form-fav">
                          @csrf
                        <input type="hidden" name="usuario" value="{{Auth::user()->id}}">
                        <button type="submit" class="favorito-red" title="Eliminar Favorito" name="quitarFav" value="{{$Destino->id_destino}}"><i class="fas fa-heart"></i></button>
                        </form>
                        @else
                        <form action="/agregarFavorito" method="post" class="form-fav">
                          @csrf
                        <input type="hidden" name="usuario" value="{{Auth::user()->id}}"> 
                        <button type="submit" class="favorito" title="Agregar Favorito" name="agregarFav" value="{{$Destino->id_destino}}"><i class="fas fa-heart"></i></button>
                      </form>
                        @endif
                    </span> --}}
                </div>
            </div>
            <div class="container mt-4">
                <div class="row justify-content-center">
                    {{-- <img class="icon-compar" src="
                    {{ asset('images/compartir-Icon.png') }}"
                    alt="compartir" title="Compartir">
                    <img class="icon-compar" src="
                    {{ asset('images/botonCarritoCompra-2.png') }}"
                    alt="carrito" title="Agregar al Carrito de Compras"> --}}
                   <span>

                        <a href="#agregarCarrito" class="carrito-agregar mx-2" data-toggle="modal" data-target="#agregarCarrito"><i class="fas fa-shopping-cart" title="Agregar al Carrito"></i></a>        
                   </span> 
                    <span>
                        @if (Auth::user()->idFavoritos()->search($Destino->id_destino) !== false)
                        <form action="/quitarFavorito" method="post" class="form-fav">
                          @csrf
                        <input type="hidden" name="usuario" value="{{Auth::user()->id}}">
                        <button type="submit" class="favorito-red" title="Eliminar Favorito" name="quitarFav" value="{{$Destino->id_destino}}"><i class="fas fa-heart">{{-- <span class="position-absolute text-white cantidadFav d-flex justify-content-center align-items-center">100000</span> --}}</i></button>
                        </form>
                        @else
                        <form action="/agregarFavorito" method="post" class="form-fav">
                          @csrf
                        <input type="hidden" name="usuario" value="{{Auth::user()->id}}"> 
                        <button type="submit" class="favorito" title="Agregar Favorito" name="agregarFav" value="{{$Destino->id_destino}}"><i class="fas fa-heart"></i></button>
                      </form>
                        @endif
                    </span>
                </div>
            </div>        
        </div>

        <div class="row">
        
            <div class="col-12">
                
                    <div class="card my-4 "> 
                        <h4 class="card-header comentarios"> Opiniones del Destino </h4>

                    @forelse ($Destino->comentarios as $item)
                        <div class="">
                            
                            <div class="card-body row col-12">
                                <div class="imagen-card col-sm-3 col-md-1">
                            <img src="{{asset('images/usuarios/'. $item->avatar)}}" class="card-img border text-center border-dark rounded-circle mt-1 shadow-lg img-comentario" alt="">
                            </div>
                            <div class="col-7">
                                <h5 class="card-title m-0"> {{$item->name}} </h5>
                                <div>
                                    <span class="card-title badge badge-light m-0">
                                        <img class="estrella mb-1" src=
                                     "{{ asset('images/iconoEstrella.png') }}"
                                         alt="Estrellas">
                                     {{$item->pivot->puntuacion}}
                                      
                                    </span>
                                    
                                </div>
                                <p class="card-subtitle mb-2 text-muted m-0">
                                    {{$item->pivot->comentario}} 
                                </p>
                            </div>
                                
                            </div>
                        </div>
                        @empty
                            <div class="my-3">
                                <h5 class="text-center">🌴Se el primero en comentar!🌴</h5>
                            </div>       
                    @endforelse
                    
            </div>
            
        </div>
    </div>
    <div id="comentario" class="card ">
        <h5 class="card-header comentarios">Comentar</h5>

        <div class="card-body">
          <form action="/comentario" method="post">
            @csrf
          <input type="hidden" name="usuario" value="{{Auth::user()->id}}">
          
              <div class="form-group">
                  <input type="hidden" name="puntuacion" value="" id="puntuacion"> 
                    <label for="puntuacion">Calificar:</label>
                    <i class="fas fa-star estrella m-1" id="1"></i><i class="fas fa-star estrella m-1" id="2"></i><i class="fas fa-star estrella m-1" id="3"></i><i class="fas fa-star estrella m-1" id="4"></i><i class="fas fa-star estrella m-1" id="5"></i><b><span class="star-elegida ml-3">0</span><span> / 5</span></b>
              </div>             
              @error('puntuacion')
              <div class="alert alert-danger">
                <strong>{{$message}}</strong>
              </div>
              @enderror
              <div class="form-group">
                  <label for="comentario">Agregar Comentario</label>
              <textarea class="form-control @error('comentario') is-invalid @enderror" name="comentario" id="comentario" cols="" rows="5" placeholder="Escribe un comentario....">{{old('comentario')}}</textarea>
              </div>
              @error('comentario')
              <div class="alert alert-danger">
                <strong>{{$message}}</strong>
              </div>
              @enderror
            <button type="submit" class="btn btn-info btn-lg btn-block" name="destino" value="{{$Destino->id_destino}}">Comentar</button>
          </form>
        </div>

      </div>
</div>
</div>



</div>
</div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">MI CARRITO</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
      
            <div class="modal-body">
            <!-- <-- renglon titulos -->
                <div class="row">
                    <div class="col-xs-3">
                        <h5>Cant</h5>
                    </div>

                    <div class="col-xs-3">
                        <h5>Destino</h5>
                    </div>

                    <div class="col-xs-3">
                        <h5>Costo Unit.</h5>
                    </div>

                    <div class="col-xs-3">
                        <h5>Costo Total</h5>
                    </div> 
                </div>

            <!-- renglon productos -->
                <div class="row">
                    <div class="col-xs-3">
                        <h6>2</h6>
                    </div>
                    <div class="col-xs-3">
                        <h6>Bariloche Ski</h6>
                    </div>
                    <div class="col-xs-3">
                        <h6>$6.500,00</h6>
                    </div>
                    <div class="col-xs-3">
                        <h6>$13.000,00</h6>
                    </div>
                </div>
            <!-- renglon total -->           
                <div class="row">
                    <div class="col-xs-6 total">
                        <h4>TOTAL COMPRA</h4>
                    </div>
                    <div class="col-xs-6 total">
                        <h4>$13.000,00</h4>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-warning">Finalizar Compra</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal de agregar al carrito -->
<div class="modal fade" id="agregarCarrito" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">AGREGAR DESTINO</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
      
            <div class="modal-body">
            <!-- <-- renglon Titulos datos -->
                <div class="row">
                    <div class="col-4 mx-auto">
                        <h5>Destino</h5>
                    </div>

                    <div class="col-4 mx-auto">
                        <h5>Costo Unit.</h5>
                    </div>
                </div>

            <!-- renglon destinos -->
                <div class="row">
                    
                    <div class="col-4 mx-auto">
                        <h6>{{$Destino->nombre_destino}}</h6>
                    </div>
                    <div class="col-4 mx-auto">
                        <h6>{{$Destino->precio}}</h6>
                    </div>

                </div>

            <!-- renglon INGRESAR CANTIDAD -->           
                <div class="row">
                    <div class="col-md-12 mx-auto">
                        <form action="/agregarCarrito/{{$Destino->id_destino}}" method="GET">
                            
                            <input type="hidden" value='{{Auth::user()->id}}' name="idUsuario">
                            <input type="hidden" value='{{$Destino->id_destino}}' name="idDestino">
                            <input type="hidden" value='{{$Destino->nombre_destino}}' name="nombreDestino">
                            <input type="hidden" value='{{$Destino->precio}}' name="precio">
                            <div class="form-group col-md-4 mx-auto">
                                <label for="exampleInputEmail1">Cant.Pasajeros</label>
                                <input type="number" class="form-control {{ null!=$errors->first('cantidadPasajes') ? 'is-invalid' : '' }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="1" name="cantidadPasajes" min="1" max="10"
                                value="{{old("cantidadPasajes",1)}}">
                                <span id="archivoHelp" class="form-text text-danger invalid-fedback">{{$errors->first('cantidadPasajes')}}</span>
                            </div>

                            <div class="modal-footer col-md-12 mx-auto">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-warning">Agregar al Carrito</button>
                            </div>                        
                        </form>
                    </div>
            
                </div>

            </div>
        </div>      
    </div>
</div>

{{-- Modal Imagenes --}}

<!-- Modal -->
<div class="modal fade" id="modalImagenes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title w-100" id="exampleModalLabel">Imágenes de {{$Destino->nombre_destino}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="{{ asset('images/destinos') }}/{{ $Destino->avatar_destino}}" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="{{ asset('images/destinos') }}/{{ $Destino->avatar_destino}}" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="{{ asset('images/destinos') }}/{{ $Destino->avatar_destino}}" class="d-block w-100" alt="...">
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          
        </div>
      </div>
    </div>
  </div>

@endsection

@section('script')
    <script>
          let i1= document.getElementById("1");
          let i2= document.getElementById("2"); 
          let i3= document.getElementById("3"); 
          let i4= document.getElementById("4"); 
          let i5= document.getElementById("5");
          let starSeleccionada = document.querySelector('.star-elegida');
          let puntuacion = document.querySelector('#puntuacion');
          let iconos = [i1, i2, i3, i4,i5];
          for (let i = 0; i < iconos.length; i++) {
              iconos[i].addEventListener('mouseover', function(){
                  for (let ix = 0; ix < iconos[i].getAttribute('id'); ix++) {
                    iconos[ix].classList.toggle('estrella-amarilla');
                      
                  }
              })
              
          }
          for (let i = 0; i < iconos.length; i++) {
              iconos[i].addEventListener('mouseout', function(){
                  for (let ix = 0; ix < iconos[i].getAttribute('id'); ix++) {
                    iconos[ix].classList.toggle('estrella-amarilla');
                      
                  }
              })   
          }
          for (let i = 0; i < iconos.length; i++) {
              iconos[i].addEventListener('click', function(){
                  starSeleccionada.innerText= iconos[i].getAttribute('id');
                  puntuacion.setAttribute('value', iconos[i].getAttribute('id')); 
                  for (let j = 0; j < iconos.length; j++) {
                      iconos[j].classList.remove('estrella-amarilla-confirm');
                      
                  }
                  for (let ix = 0; ix < iconos[i].getAttribute('id'); ix++) {
                    iconos[ix].classList.toggle('estrella-amarilla-confirm');
                      
                  }
              })   
          }
          
        


    </script>
@endsection