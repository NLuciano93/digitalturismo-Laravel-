@extends('layout.plantilla')

@section('css')
     {{ asset('css/style.css') }}
 @endsection


@section('principal')
    
<h1>COMENTARIO DE UN DESTINO</h1>
    
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
    
    @if ($Destino->comentarios->count() > 0 )
        

        @foreach ($Destino->comentarios as $comentario)
        <tr>
        
        <td>{{ $comentario->pivot->id_comentario }}</td>
        <td>{{ $comentario->pivot->name }}</td>
        <td>{{ $comentario->pivot->id_destino }}</td>
        <td>{{ $comentario->pivot->puntuacion }}</td>
        <td>{{ $comentario->pivot->comentario }}</td>
        <td>{{ $comentario->pivot->fecha_publicacion }}</td>
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
    @else
    <tr>
        <td> 
        <div> <h3>No hay comentarios para este Destino ...</h3> </div>
        </td>
    </tr>
    @endif
    </tbody>
    
</table>

@endsection