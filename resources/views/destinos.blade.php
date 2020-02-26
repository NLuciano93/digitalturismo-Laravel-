<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Digital Turismo | Productos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/styleProductos.css')}}">
    <link rel="stylesheet" href="css/style-login-registro.css">
    <link href="https://fonts.googleapis.com/css?family=Anton|Oswald:500|Roboto&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/67f61afa3e.js" crossorigin="anonymous"></script>
</head>
<body>

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
                        "{{ asset('images/Destinos') }}/{{ $destinosRandom[0]->avatar_destino}}"
                                     class="d-block w-100 img-fluid" alt="Bariloche">
                                     <div class="puntuacion-carrusel">
                                        <small class="letra-puntuacion-carrusel">4.5
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
                    "{{ asset('images/Destinos')}}/{{$destinosRandom[1]->avatar_destino}}"         
                                class="d-block w-100 img-fluid" alt="...">
                                <div class="puntuacion-carrusel">
                                    <small class="letra-puntuacion-carrusel">4.5
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
                        "{{ asset('images/Destinos') }}/{{ $destinosRandom[2]->avatar_destino}}"
                                    class="d-block w-100 img-fluid" alt="...">
                                    <div class="puntuacion-carrusel">
                                        <small class="letra-puntuacion-carrusel">4.5
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
                        "{{ asset('images/Destinos') }}/{{ $destinosRandom[3]->avatar_destino}}"
                                class="d-block w-100 img-fluid" alt="...">
                                <div class="puntuacion-carrusel">
                                    <small class="letra-puntuacion-carrusel">4.5
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
       
            <div class="container">
                <div class="row">

                    <?php $aux = 0; ?>
                    @foreach ($destinos as $destino)
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-3">
                                    
                            <article class="borderBox m-3 destino-individual">
                                
                                <div class="photo-container">
                                    <img class="photo" src=
                        "{{ asset('images/Destinos') }}/{{ $destino->avatar_destino}}"
                                     alt="foto destino">
                                    <button class="favorito"><i class="fas fa-heart"></i></button>
                                    <a href="detalleProducto.php" title="Mas Informacion">
                                        <div class="tit-Destino" >
                                            <h3 class="texto-card-titulo">{{$destino->nombre_destino}}</h3>
                                            <h3 class="texto-card-titulo">${{$destino->precio}}</h3>
                                        </div>
                                    </a>
                                    <div class="fondo-coment">
                                        <div class="puntuacion">
                                            <small>{{ $puntaje[$aux] }}</small>
                                            <img class="estrella" src=
                                            "{{ asset('images/iconoEstrella.png') }}"
                                            alt="Estrellas">
                                        </div>
                                        <div class="coment">
                                            <small>comentarios ( {{ $cantComments[$aux] }})
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                
                            </article>                                
                        </div>
                        <?php $aux = $aux + 1; ?>
                    @endforeach
                     
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 control-paginacion">
                            {{ $destinos->links() }}
                    </div>  
                </div>

            </div>
    </div>
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> 
</body>
</html>