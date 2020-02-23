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
            <a href="/destinoAlta" class="btn btn-primary btn-lg" tabindex="-1" role="button">AGREGAR DESTINO</a>
        </div>
    <table class="table table-striped table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">NombreDestino</th>
                <th scope="col">Precio</th>
                <th scope="col">Promoción</th>
                <th scope="col">Provincia</th>
                <th scope="col">Imagen</th>
                <th scope="col">Editar</th>
                <th scope="col">Eliminar</th>
            
            </tr>
        </thead>
        <tbody>    
        @foreach ($destinos as $destino)
       
            <tr>
                <td>{{$destino->nombre_destino}}</td>
                <td>${{$destino->precio}}</td>
                <td>{{$destino->promocion}}%</td>
                <td>{{$destino->provincia->nombre_provincia}}</td>
                <td class="w-25 h-25"><img class ="img-fluid img-thumbnail "src="{{asset('images/destinos/'. $destino->avatar_destino)}}" alt=""></td>
                <td><a href="destinoMod/{{$destino->id_destino}}" class="btn btn-success" tabindex="-1" role="button">Editar</a></td>
                <td><a href="/borrarDestino/{{$destino->id_destino}}" class="btn btn-danger" tabindex="-1" role="button">Eliminar</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
</div>
    <div class="container">
        <div class="row">
            {{$destinos->links()}}
        </div>
    </div>
@endsection