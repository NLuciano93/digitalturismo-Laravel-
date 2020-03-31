@extends('layout.plantillaAdmin')


@section('principal')
<div class="container-fluid mt-5">
    <div class="row">
        <table class="table table-striped table-bordered table-hover mb-0">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Email</th>
                    <th scope="col">Comentario</th>
                    <th scope="col">Eliminar</th>
                
                </tr>
            </thead>
            <tbody>

                @forelse ($mensajes as $mensaje)
                <tr>
                    <td>{{$mensaje->email}}</td>
                    <td>{{$mensaje->mensaje}}</td>
                <td><a href="/borrarMensaje/{{$mensaje->id}}" class="btn btn-danger">Eliminar</a></td>
                </tr>
                @empty
                <h3>No se registraron mensajes...</h3>
                @endforelse
           
            </tbody>
        </table>
    </div>
</div>
@endsection