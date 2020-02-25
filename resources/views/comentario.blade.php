@extends('layout.plantilla')

@section('css')
     {{ asset('css/style.css') }}
 @endsection

 @section('principal')
 
 @if (session()->has('mensaje'))
  <div class="alert alert-success m-0  d-flex justify-content-center">
    <strong>🌴{{ session()->get('mensaje') }}🌴</strong>
  </div>
@endif

    <form action="/comentario" method="post" class="mt-5 mx-5">
        @csrf
        <input type="hidden" name="usuario" value="1">
        <br>
        <input type="number" name="calificacion">
        <br>
        <textarea name="comentario" id="" cols="30" rows="10"></textarea>
        <br>

        <button type="submit" name="agregarComent" value="4">Agregar Comentario</button>
    </form>
     
 @endsection