@extends('layout.plantilla')

@section('css')
    {{ asset('css/style.css') }}
    
@endsection
@section('principal')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="alert alert-success m-0" role="alert">
                    <h4 class="alert-heading text-center">Registro Exitoso!</h4>
                    <p class="text-center">Será redirigido en 3 segundos</p>
                    <hr>
                <img class="img-fluid rounded-circle" src="{{asset('images/exito1.jpg')}}" alt="">                   
                </div>
                
               {{--  <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div> --}}

            </div>
        </div>
    </div>
</div>
<?php 

    header("refresh:3; url=/");

?>
   
@endsection
