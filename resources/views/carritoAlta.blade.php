@extends('layout.plantillaAdmin')



@section('principal')

<div class="container">
    <div class="row">
    <h1>Agrega un item en Carritos</h1>
        
    <div class="col-12">   
    <form action="/carritoAlta" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Destino</label>
            <input type="text" class="form-control {{ null!=$errors->first('idDestino') ? 'is-invalid' : '' }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="idDestino" name="idDestino"
            value="{{old("idDestino")}}">
            <span id="archivoHelp" class="form-text text-danger invalid-fedback">{{$errors->first('idDestino')}}</span>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail2">Usuario</label>
            <input type="text" class="form-control {{ null!=$errors->first('idUsuario') ? 'is-invalid' : '' }}" id="exampleInputEmail2" aria-describedby="emailHelp" placeholder="idUsuario" name="idUsuario" value="{{old("idUsuario")}}">
            <span id="archivoHelp" class="form-text text-danger">{{$errors->first('idUsuario')}}</span>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail3">Cantidad</label>
            <input type="number" class="form-control {{ null!=$errors->first('cantidad') ? 'is-invalid' : '' }}" id="exampleInputEmail3" aria-describedby="emailHelp" placeholder="cantidad" name="cantidad"
            value="{{old("cantidad")}}">
            <span id="archivoHelp" class="form-text text-danger">{{$errors->first('cantidad')}}</span>
        </div>
        
        <div class="form-group">
            <label for="exampleInputEmail5">Costo por Unidad</label>
            <input type="number" class="form-control {{ null!=$errors->first        ('costoXunidad') ? 'is-invalid' : '' }}" id="exampleInputEmail3" aria-describedby="emailHelp" placeholder="costoXunidad" name="costoXunidad"
            value="{{old("costoXunidad")}}">
            <span id="archivoHelp" class="form-text text-danger">{{$errors->first('costoXunidad')}}</span>
        </div>
     
        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Agregar</button>
        </div>
        
    </form>
</div>   
    
</div>

</div>
    
@endsection