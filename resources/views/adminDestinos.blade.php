@extends('layout.plantillaAdmin')




@section('principal')
{{-- {{dd($destinos)}} --}}
<div class="container-fluid mt-5">
    <div class="row">
        @if (session('mensaje'))
            <div class="col-12 my-3 alert alert-success">
                {{session('mensaje')}}
            </div>
        @endif
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <form method="POST" action="/busquedaDestinos" class="form-inline">
                        @csrf
                        <div class="form-group mx-sm-3 mb-2">
                         
                          <input type="text" class="form-control" id="busqueda" placeholder="Busqueda" name="busqueda">
                        </div>
                        <div class="form-group mb-2 mx-sm-3">                                                           
                                <select id="inputState" class="form-control" name="provincia">
                                  <option value="">Elegir Provinicia</option>
                                  @foreach ($provincias as $provincia)
                                <option value="{{$provincia->id_provincia}}">{{$provincia->nombre_provincia}}</option>
                                  @endforeach
                                  
                                </select>                             
                        </div>                        
                        <button type="submit" class="btn btn-primary mb-2">Buscar</button>
                      </form>
                </div>
            </div>
        </div>
        
        <div class="col-12 my-3">
            <a href="/destinoAlta" class="btn btn-primary btn-lg" tabindex="-1" role="button">AGREGAR DESTINO</a>
        </div>
    <table class="table table-striped table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Nombre Destino</th>
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