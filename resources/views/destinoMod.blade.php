@extends('layout.plantillaAdmin')




@section('principal')
<div class="container">
    <div class="row">
    <h1>Modifica el Destino</h1>

    
<div class="col-12">   
    <form action="/destinoMod" method="post" enctype="multipart/form-data">
        @csrf
    <input type="hidden" name="id" value="{{$destino->id_destino}}">
        <div class="form-group">
            <label for="exampleInputEmail1">Nombre Destino</label>
            <input type="text" class="form-control {{ null!=$errors->first('nombre') ? 'is-invalid' : '' }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nombre Destino" name="nombre" value ="{{old('nombre',$destino->nombre_destino)}}">
            <span id="archivoHelp" class="form-text text-danger">{{$errors->first('nombre')}}</span>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail2">Precio(No colocar signos solo numero)</label>
            <input type="text" class="form-control  {{ null!=$errors->first('precio') ? 'is-invalid' : '' }}" id="exampleInputEmail2" aria-describedby="emailHelp" placeholder="$precio" name="precio" value ="{{old('precio',$destino->precio)}}">
            <span id="archivoHelp" class="form-text text-danger">{{$errors->first('precio')}}</span>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail3">Promocion(0-100%)"Si no tiene promo colocar 0"</label>
            <input type="text" class="form-control {{ null!=$errors->first('promocion') ? 'is-invalid' : '' }}" id="exampleInputEmail3" aria-describedby="emailHelp" placeholder="%promocion" name="promocion" value ="{{old('promocion',$destino->promocion)}}">
            <span id="archivoHelp" class="form-text text-danger">{{$errors->first('promocion')}}</span>
        </div>
        
        <div class="form-group">
        <label for="exampleInputEmail5">Provincia</label>
            <select class="form-control  {{ null!=$errors->first('provincia') ? 'is-invalid' : '' }}" name="provincia">
                <option value="{{old('provincia',$provincia->id_provincia)}}" selected>{{$provincia->nombre_provincia}}</option>
                @foreach($provincias as $prov)
                <option value="{{$prov->id_provincia}}">
                {{$prov->nombre_provincia}}</option>
                @endforeach
            </select>
            <span id="archivoHelp" class="form-text text-danger">{{$errors->first('provincia')}}</span>
        </div>
        <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFileLang" lang="es" name="imagenPerfil">
                <label class="custom-file-label" for="customFileLang">Seleccionar Foto de Perfil</label>
                <span id="archivoHelp" class="form-text text-danger"></span>
        </div>

    <div class="mt-3">
        <button type="submit" class="btn btn-success">Editar</button>
    </div>
        
    </form>
</div>   
    
    
    
    </div>


</div>
    
@endsection