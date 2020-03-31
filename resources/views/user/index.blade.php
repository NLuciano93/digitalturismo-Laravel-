@extends('layout.plantilla')
@section('css')
     {{ asset('css/style-user.css') }}
 @endsection
 @section ('principal')
 
{{--  Auth::user() --}}
 <!-- Imagen usuario-->
 <div class="contenedor_usuario">
    <div class="container">
      <div class="jumbotron jumbotron-fluid mt-0">
        <div class="container">
        <h2>{{Auth::user()->name}}</h2>
          <div class="d-flex justify-content-center h-100">
            <div class="image_outer_container">
              <div class="image_inner_container">
                <img class="img-fluid img-thumbnail" src="{{ asset('images/usuarios/' . Auth::user()->avatar)}}">
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!--Datos-->
   
      <div class="row">
        <div class="col-4">
          <div class="list-group" id="list-tab" role="tablist">
            <a class="list-group-item list-group-item-action  @if(!session('favorito')) @if(!($errors->first('passwordActual') || $errors->first('password')))active @endif @endif" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Información personal</a>
            <a class="list-group-item list-group-item-action  @if(!session('favorito')) @if(($errors->first('passwordActual') || $errors->first('password')))active @endif @endif" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Cambiar contraseña</a>
            <a class="list-group-item list-group-item-action  @if(session('favorito')) active @endif" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Favoritos</a>
            
          </div>
        </div>
        <div class="col-8">
          <div class="tab-content" id="nav-tabContent">
           @include('user.partialInfoUser')

           @include('user.partialPasswordUser')

           @include('user.partialFavUser')

              

            </div>
            
          </div>
        </div>
        @endsection
        @section('script')
      <script src="{{asset("js/validarFormuActualizar.js")}}"></script>
    @endsection

 