@extends('layout.plantilla')



@section('css')
    {{ asset('css/styleProductos.css') }}
@endsection

@section('principal')
    
                        @foreach ($Destinos as $Destino)
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-3">
                                    
                            <article class="borderBox m-3 destino-individual">
                                
                                <div class="photo-container">
                                    <img class="photo" src=
                        "{{ asset('images/Destinos') }}/{{ $Destino->avatar_destino}}"
                                    alt="foto destino">
                                    <button class="favorito"><i class="fas fa-heart"></i></button>
                                    <a href="detalleProducto.php" title="Mas Informacion">
                                        <div class="tit-Destino" >
                                            <h3 class="texto-card-titulo">{{$Destino->nombre_destino}}</h3>
                                            <h3 class="texto-card-titulo">${{$Destino->precio}}</h3>
                                        </div>
                                    </a>
                                    <div class="fondo-coment">
                                        <div class="puntuacion">
                                            <small>{{ round($Destino->comentarios()->avg('puntuacion'), 2) }}</small>
                                            <img class="estrella" src=
                                            "{{ asset('images/iconoEstrella.png') }}"
                                            alt="Estrellas">
                                        </div>
                                        <div class="coment">
                                            <small>comentarios (  {{ $Destino->comentarios->count() }} )
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                
                            </article>                                
                        </div>
                        
                        @endforeach
@endsection