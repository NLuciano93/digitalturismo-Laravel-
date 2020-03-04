@extends('layout.plantillaAdmin')

@section('principal')

<div class="container-fluid mt-5">
    <div class="row">
        @if (session('mensaje'))
            <div class="col-12 my-3 alert alert-success">
                {{session('mensaje')}}
            </div>
        @endif
        
        <div class="col-12 my-3">
            <a href="/carritoAlta" class="btn btn-primary btn-lg" tabindex="-1" role="button">AGREGAR DESTINO AL CARRITO</a>
        </div>
    <table class="table table-striped table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Id Item</th>
                <th scope="col">Destino</th>
                <th scope="col">Usuario</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Costo x Unidad</th>
                <th scope="col">update_at </th>
                <th scope="col">created_at</th>
            </tr>
        </thead>
        <tbody>    
        @foreach ($itemsCarrito as $item)
        
            <tr>
                
                <td>{{$item->id}}</td>
                <td>{{$item->id_destino}}</td>
                <td>{{$item->id_usuario}}</td>
                <td>{{$item->cantidad}}</td>
                <td>{{$item->costoXunidad}}</td>
                <td>{{$item->updated_at}}</td>
                <td>{{$item->created_at}}</td>
            
            </tr>
        
        @endforeach
        </tbody>
    </table>
    </div>
</div>
    <div class="container">
        <div class="row">
            {{$itemsCarrito->links()}}
        </div>
    </div>
@endsection