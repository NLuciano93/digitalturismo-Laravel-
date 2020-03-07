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
                    <div>
                        <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLabel">MI CARRITO</h3>
                            <small> Cantidad de Productos:</small>
                        </div>
<!-- <-- renglon titulos -->
                        <div class="modal-body">       
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
                                @foreach ($items as $item)
                                    <small> {{$destino}} </small>
                                @endforeach 
                                <div class="col-xs-3">
                                    
                                    <h6>cantPasajeros</h6>
        
                                </div>
                    
                                <div class="col-xs-3">
                                    <h6>nombreDestino</h6>
                                </div>
                    
                                <div class="col-xs-3">
                                    <h6>precio</h6>
                                </div>
                    
                                <div class="col-xs-3">
                                    <h6>total</h6>
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
                            
                        <div class="modal-footer col-md-12 mx-auto">
                            <h6>footer</h6>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection