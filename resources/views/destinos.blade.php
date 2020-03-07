@extends('layout.plantilla')

@section('css')
     {{ asset('css/styleProductos.css') }}
@endsection

@section('principal')


<div class="container-fluid">
<div class="row">
<div class="col-12 p-0 m-0">
  
    <!-- titulo pagina -->
    <div class="fondo_productos">
        
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="titEncabeza">
                        <h2>¡ ENCONTRÁ TU DESTINO ...!</h2> 
                    </div>
                </div>
            </div>  
        </div>     
    
        <!-- carousel -->
        <div class="container">
            <div class="row">
                <div class="col-12 carrusel">
                    <section class="carrusel m-3">
                        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                            
                            <!-- imagenes carousel -->
                            <div class="carousel-inner">
                                <div class="carousel-item active imgCarrusel">
                                    <img class = "imgCarruseltamano" src=
                        "{{ asset('images/destinos') }}/{{ $destinosRandom[0]->avatar_destino}}"
                                     class="d-block w-100 img-fluid" alt="Bariloche">
                                     <div class="puntuacion-carrusel">
                                        <small class="letra-puntuacion-carrusel">
                                            {{ $puntajeRandom[0] }}
                                        </small>
                                        <img class="estrella-carrusel" src=
                                        "{{ asset('images/iconoEstrella.png') }}"
                                        alt="Estrellas">
                                    </div> 
                                    <div class="tit-Destino-carru" >
                                        <a href="detalleProducto.php">
                                            <h3>{{$destinosRandom[0]->nombre_destino}}</h3>
                                        </a>
                                    </div>
                                </div>
                                
                                <div class="carousel-item imgCarrusel">
                                    <img class = "imgCarruseltamano" src=
                    "{{ asset('images/destinos')}}/{{$destinosRandom[1]->avatar_destino}}"         
                                class="d-block w-100 img-fluid" alt="...">
                                <div class="puntuacion-carrusel">
                                    <small class="letra-puntuacion-carrusel">
                                        {{ $puntajeRandom[1] }}
                                    </small>
                                    <img class="estrella-carrusel" src=
                                    "{{ asset('images/iconoEstrella.png') }}"
                                    alt="Estrellas">
                                </div>
                                    <div class="tit-Destino-carru" >
                                        <a href="detalleProducto.php">
                                            <h3>{{$destinosRandom[1]->nombre_destino}}</h3>
                                        </a>
                                    </div>
                                </div>
                                
                                <div class="carousel-item imgCarrusel">
                                    <img class = "imgCarruseltamano" src=
                        "{{ asset('images/destinos') }}/{{ $destinosRandom[2]->avatar_destino}}"
                                    class="d-block w-100 img-fluid" alt="...">
                                    <div class="puntuacion-carrusel">
                                        <small class="letra-puntuacion-carrusel">
                                            {{ $puntajeRandom[2] }}
                                        </small>
                                        <img class="estrella-carrusel" src=
                                        "{{ asset('images/iconoEstrella.png') }}"
                                        alt="Estrellas">
                                    </div>
                                    <div class="tit-Destino-carru" >
                                        <a href="detalleProducto.php">
                                            <h3>{{$destinosRandom[2]->nombre_destino}}</h3>
                                        </a>
                                    </div>
                                </div>
                                
                                <div class="carousel-item imgCarrusel" >
                                    <img class = "imgCarruseltamano" src=
                        "{{ asset('images/destinos') }}/{{ $destinosRandom[3]->avatar_destino}}"
                                class="d-block w-100 img-fluid" alt="...">
                                <div class="puntuacion-carrusel">
                                    <small class="letra-puntuacion-carrusel">
                                        {{ $puntajeRandom[3] }}
                                    </small>
                                    <img class="estrella-carrusel" src=
                                    "{{ asset('images/iconoEstrella.png') }}"
                                    alt="Estrellas">
                                </div>
                                    <div class="tit-Destino-carru" >
                                        <a href="detalleProducto.php">
                                            <h3>{{$destinosRandom[3]->nombre_destino}}</h3>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- control carousel -->
                            <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                            
                        </div>
                    </section>
                </div> 
            </div>
        </div>
        
        
        <!-- Todos los destinos  -->
       <section>
        <nav class="navbar navbar-light bg-dark d-flex justify-content-center">
            <form class="form" action="/busDestinosUser" method="post">
                @csrf
             <div class="form-row">
                <div class="form-group my-1">
                    <input class="form-control mr-sm-3" type="search" name='busqueda' value="{{--  /* isset($_POST['destino']) ? $_POST['destino'] : ''  */ --}}" placeholder="Buscar Destino" aria-label="Default" 
                                    aria-describedby="inputGroup-sizing-default">
                                     
                </div>
            
           
                 
                <div class="form-group mx-3 my-1">
                <select id="inputState" class="form-control mr-sm-5" name="provincia">
                    <option value="">Elegir Provincia...</option>
                     @foreach ($provincias as $provincia)
                <option value="{{$provincia->id_provincia}}">{{$provincia->nombre_provincia}}</option>
                     
                     @endforeach
                        
                            
                </select>
                </div> 


                <button class="btn btn-outline-success boton my-1" type="submit">Buscar</button>
            </div>
            
               
            </form>
        </nav>
            <div class="container">
                <div class="row">

                    
                    @foreach ($Destinos as $destino)
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-3">
                                    
                            <article class="borderBox m-3 destino-individual">
                                
                                <div class="photo-container">
                                    <img class="photo" src=
                        "{{ asset('images/destinos/'. $destino->avatar_destino) }}"
                                     alt="foto destino">
                                    @guest
                                      <button class="favorito"><i class="fas fa-heart"></i></button>
                                      @else
                                      
                                      @if (Auth::user()->idFavoritos()->search($destino->id_destino) !== false)
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
                                    

                                    <a href="/detalleDestino/{{$destino->id_destino}}" title="Mas Informacion">
                                        <div class="tit-Destino" >
                                            <h3 class="texto-card-titulo">{{$destino->nombre_destino}}</h3>
                                            @if ($destino->promocion >0)
                                        <h3 class="texto-card-titulo"> <span class=" precio-promo">${{$destino->precio}} </span>{{$destino->promocion}}%OFF</h3>
                                        <h3><b>${{$destino->precio - ($destino->precio *($destino->promocion/100))}}</b></h3>
                                            @else
                                            <h3 class="texto-card-titulo">${{$destino->precio}}</h3>
                                                
                                            @endif
                                            
                                        </div>
                                    </a>
                                    <div class="fondo-coment">
                                        <div class="puntuacion">
                                            <small>{{ round($destino->comentarios()->avg('puntuacion'),2) }}</small>
                                            <img class="estrella" src=
                                            "{{ asset('images/iconoEstrella.png') }}"
                                            alt="Estrellas">
                                        </div>
                                        <div class="coment">
                                            <a href="/verComentariosDestino/ {{$destino->id_destino}}">
                                                <small>comentarios ( {{ $destino->comentarios()->count()}})
                                                </small>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="/verComentariosDestino/{{$destino->id_destino}}">
                                    <small>comentarios ( {{ $destino->comentarios()->count() }})
                                    </small>
                                </a>
                                
                            </article>                                
                        </div>
                        
                    @endforeach
                     
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 control-paginacion">
                            {{ $Destinos->links() }}
                    </div>  
                </div>

            </div>
        </section>
    </div>
</div>
</div>
</div>    
@endsection
{{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> 
</body>
</html> --}}