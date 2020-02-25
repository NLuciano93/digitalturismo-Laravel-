@extends('layout.plantilla')

@section('css')
     {{ asset('css/style.css') }}
 @endsection


@section('principal')
    

    
<h1>HOLA</h1>
     @foreach ($Destino->comentarios as $comentario)
        <div class="card" style="width: 18rem;">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
        <h5 class="card-title">{{$comentario->name}}</h5>
        <p class="card-text">{{$comentario->pivot->comentario}}</p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">{{$comentario->pivot->puntuacion}}</li>
          <li class="list-group-item">{{$comentario->pivot->created_at}}</li>
          <li class="list-group-item">Vestibulum at eros</li>
        </ul>
        <div class="card-body">
          <a href="#" class="card-link">Card link</a>
          <a href="#" class="card-link">Another link</a>
        </div>
      </div>
    @endforeach 
    
@endsection