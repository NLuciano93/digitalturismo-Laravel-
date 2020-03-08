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
      <th scope="col">Precio</th>
    </tr>
  </thead>
  <tbody>
  @forelse ($productos as $producto)
      <tr class="shadow-sm">
        <td class=""><img class="imagen-compra img-thumbnail" src="{{asset('images/destinos/'. $producto['item']['avatar_destino'])}}"></td>
         <td class="">{{$producto['item']['nombre_destino']}}</td>
         <td class="">{{$producto['cantidad']}}</td>
        <td class="">${{$producto['precio']}}</td>        
        <td class="">asd</td>
    </tr>
  @empty
      
  @endforelse
        
  </tbody>
</table>
    <div class="col-12">
        <h3 class="text-right">Precio total: ${{$precioTotal}}</h3>
    </div>
    <div class="col-12 text-right">
        <button type="button" class="btn btn-secondary">Borrar Todo</button>
        <button type="button" class="btn btn-warning">Pagar</button>
    </div>
        </div>
    </div>

@endsection