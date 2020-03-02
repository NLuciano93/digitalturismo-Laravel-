@extends('layout.plantilla')

@section('css')
     {{ asset('css/style.css') }}
 @endsection


@section('principal')
    
<h1>COMENTARIOS</h1>
    
<table class="table table-hover table-striped table-border">
    <thead class="thead-dark">
    <tr>
        <th>Id</th>
        <th>Usuario</th>
        <th>Destino</th>
        <th>Puntuacion</th>
        <th>Comentario</th>
        <th>Fecha Publicacion</th>
        <th colspan="2">
            <a href="#" class="btn btn-dark">
                Agregar
            </a>
        </th>
    </tr>
    </thead>
    <tbody>
@foreach( $comentarios as $comentario )
    <tr>
        <td>{{ $comentario->id_comentario }}</td>
        <td>{{ $comentario->id_usuario }}</td>
        <td>{{ $comentario->id_destino }}</td>
        <td>{{ $comentario->puntuacion }}</td>
        <td>{{ $comentario->comentario }}</td>
        <td>{{ $comentario->fecha_publicacion }}</td>
        <td>
          <a href="#" class="btn btn-outline-secondary">
                Modificar
            </a>
        </td>
        <td>
            <a href="#" class="btn btn-outline-secondary">
                Eliminar
            </a>
        </td>
    </tr>
@endforeach
    </tbody>
</table>

@endsection