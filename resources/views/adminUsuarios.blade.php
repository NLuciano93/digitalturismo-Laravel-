@extends('layout.plantillaAdmin')



@section('principal')

<div class="container-fluid mt-5">
    <div class="row">
        <table class="table table-striped table-bordered table-hover">
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
 
<div class="container">
    <div class="row">
        {{$usuarios->links()}}
    </div>
</div>

    
@endsection