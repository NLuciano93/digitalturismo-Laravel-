@extends('layout.plantillaDestinos')

@section('cssProductos')
     {{ asset('css/styleDetalleProductos.css') }}
@endsection

@section('principal')
@if (session()->has('mensaje'))
<div class="alert alert-success m-0  d-flex justify-content-center">
  <strong>🌴{{ session()->get('mensaje') }}🌴</strong>
</div>
@endif
<div class="container-fluid p-0 m-0 ">
<div class="row p-0 m-0">
<div class="col-12 p-0 m-0">

<div class="fondo_producto">
    
    <div class="contenedor-detalle">

<!-- icono Mi carrtito-->
    <div class="carritoIcono">
    
        <div class="tit-carrito">
            <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal">       
                <i class="fas fa-shopping-cart"></i>
            </button>
            <span> 1 </span>
        </div>  
    </div> 

        <div class="row">
            <div class="col-xs-12 box1">
                 <h4>{{$Destino->nombre_destino}}</h4>
            </div>
        </div>

        <div class="row">
        
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="contenedor-collage">
                    <div class="collage">
                        <img class="img-Principal" src=
                        "{{ asset('images/Destinos') }}/{{ $Destino->avatar_destino}}"alt="Bariloche"> 
                    </div>
            
                    <div class="collage">
                        <img class="img-Principal" src=
                        "{{ asset('images/Destinos') }}/{{ $Destino->avatar_destino}}" alt="Bariloche">
                    </div>

                    <div class="collage">
                        <img class="img-Principal" src=
                        "{{ asset('images/Destinos') }}/{{ $Destino->avatar_destino}}"  alt="Bariloche">
                    </div>

                    <div class="collage">
                        <img class="img-Principal" src=
                        "{{ asset('images/Destinos') }}/{{ $Destino->avatar_destino}}"  alt="Bariloche">
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <article class="detalle-info">        
                    <p>{{$Destino->nombre_destino}}</p>
                    <div class="costos">
                        <h6> Costo por Pasajero</h6>
                        <h4> {{$Destino->precio}}</h4>
                    </div> 
                </article>  
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">               
                <div class="iconos-pie-card box-iconos">
                    <img class="icon-compar" src="
                    {{ asset('images/compartir-Icon.png') }}"
                    alt="compartir" title="Compartir">
                    <img class="icon-compar" src="
                    {{ asset('images/botonCarritoCompra-2.png') }}"
                    alt="carrito" title="Agregar al Carrito de Compras">
                </div>
            </div>        
        </div>

        <div class="row">
        
            <div class="col-12">
                
                    <div> <h3> Opiniones del Destino </h3>

                    @foreach ($Destino->comentarios as $item)
                        <div class="card">
                            
                            <div class="card-body row col-12">
                                <div class="imagen-card col-2">
                            <img src="{{asset('images/usuarios/'. $item->avatar)}}" class="card-img border text-center border-dark rounded-circle mt-1 shadow-lg" alt="">
                            </div>
                            <div class="col-8">
                                <h4 class="card-title"> {{$item->name}} </h4>
                                <div>
                                    <span class="card-title">
                                        <img class="estrella" src=
                                     "{{ asset('images/iconoEstrella.png') }}"
                                         alt="Estrellas">
                                     {{$item->pivot->puntuacion}}
                                      
                                    </span>
                                    
                                </div>
                                <h5 class="card-subtitle mb-2 text-muted">
                                    {{$item->pivot->comentario}} 
                                </h5>
                            </div>
                                
                            </div>
                        </div>       
                    @endforeach
            </div>
            
        </div>
    </div>
    <div class="card">
        <h5 class="card-header">Comentar</h5>

        <div class="card-body">
          <form action="/comentario" method="post">
            @csrf
          <input type="hidden" name="usuario" value="{{Auth::user()->id}}">
              <div class="form-group">
                    <label for="puntuacion">Calificar:</label>
                    <select name="puntuacion" id="puntuacion" class="form-control">
                        <option>Elegir calificación</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
              </div>
              <div class="form-group">
                  <label for="comentario">Agregar Comentario</label>
                <textarea class="form-control" name="comentario" id="comentario" cols="" rows="5" placeholder="Escribe un comentario...."></textarea>
              </div>
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

@endsection