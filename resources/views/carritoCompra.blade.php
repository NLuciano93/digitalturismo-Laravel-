@extends('layout.plantilla')

@section('css')
     {{ asset('css/style.css') }}
@endsection

@section('principal')
    <div class="container mt-5">
        <div class="row">

<table class="table table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col"></th>
      <th scope="col">Nombre Destino</th>
    
      <th scope="col">Cantidad</th>
      <th scope="col">Precio</th>
      <th scope="col">Eliminar</th>
    </tr>
  </thead>
  <tbody>
   
  @forelse ($productos as $producto)
      <tr class="shadow-sm">
        <td class=""><a href="/detalleDestino/{{$producto['item']['id_destino']}}" title="Ver Destino"><img class="imagen-compra img-thumbnail" src="{{asset('images/destinos/'. $producto['item']['avatar_destino'])}}"></a></td>
     
         <td class="">{{$producto['item']['nombre_destino']}}</td>
         <td class="">{{$producto['cantidad']}}</td>
        <td class="">
        @if ($producto['item']['promocion'])
        ${{$producto['precioPromo']}} <p> <small class="precio-promo">${{$producto['precio']}}</small><small>{{$producto['item']['promocion']}}%OFF</small></p>
        @else
             ${{$producto['precio']}}
        @endif 
        </td>        
      <td class=""><a href="/borrarItemCarritoCompra/{{$producto['item']['id_destino']}}" class="btn btn-danger">Eliminar</a></td>
    </tr>
  @empty
      <tr>
        <td colspan="12">
          <h3>No hay Productos en el carrito</h3>
        </td>
        
      </tr>
  @endforelse
        
  </tbody>
</table>
  @isset($precioTotal)
      <div class="col-12">
        <h3 class="text-right">Precio total: ${{$precioTotal}}</h3>
    </div>
  @endisset
    
    <div class="col-12 text-right">
        <a href="/borrarCarrito" type="button" class="btn btn-secondary">Borrar Todo</a>
        <a href="/checkout" type="button" class="btn btn-warning">Pagar</a>
    </div>
        </div>
    </div>

@endsection