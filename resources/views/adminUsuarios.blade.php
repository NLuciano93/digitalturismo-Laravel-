@extends('layout.plantillaAdmin')



@section('principal')
<div class="container mt-5">
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            <form method="GET" action="" class="col-12">
               
            <div class="form-row d-flex justify-content-center">
                <div class="form-group mx-sm-3 mb-2 col-6">
                 
                  <input type="text" class="form-control" id="busqueda" placeholder="Busqueda por nombre o email" name="busqueda">
                </div>
                 <div class="form-group col-2">
                     <button type="submit" class="btn btn-primary mb-2">Buscar</button>
                </div>   
            </div>
                
                                    
                
              </form>
        </div>
    </div>
</div>
<div class="container-fluid mt-5">
    <div class="row">
        <table class="table table-striped table-bordered table-hover mb-0">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">Eliminar</th>
                
                </tr>
            </thead>
            <tbody>

                @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{$usuario->name}}</td>
                    <td>{{$usuario->email}}</td>
                <td><a href="/borrarUsuario/{{$usuario->id_usuario}}" class="btn btn-danger">Eliminar</a></td>
                </tr>
                @endforeach
           
            </tbody>
        </table>
    </div>
</div>
@if ($usuarios->count()==0)
     <h3 class="bg-light p-3 text-center">No se encontraron usuarios</h3>
@endif 
 
<div class="container">
    <div class="row">
        {{$usuarios->links()}}
    </div>
</div>

    
@endsection