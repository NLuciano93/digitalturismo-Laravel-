@extends('layout.plantillaAdmin')



@section('principal')

<div class="container">
    <div class="row">
    <h1>Agrega un nuevo Destino</h1>
        
    <div class="col-12">   
    <form action="/destinoAlta" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre Destino</label>
        <input type="text" class="form-control {{ null!=$errors->first('nombre') ? 'is-invalid' : '' }}" id="nombre" aria-describedby="emailHelp" placeholder="Nombre Destino" name="nombre"
        value="{{old("nombre")}}">
            <span id="archivoHelp" class="form-text text-danger invalid-fedback">{{$errors->first('nombre')}}</span>
        </div>
        <div class="form-group">
            <label for="detalle">Detalle Destino</label>
        <input type="text" class="form-control {{ null!=$errors->first('detalle') ? 'is-invalid' : '' }}" id="detalle" aria-describedby="emailHelp" placeholder="Detalle Destino" name="detalle"
        value="{{old("detalle")}}">
            <span id="archivoHelp" class="form-text text-danger invalid-fedback">{{$errors->first('detalle')}}</span>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción Destino</label>
        <textarea name="descripcion" id="descripcion" cols="30" rows="10" class="form-control" value="{{old('descripcion')}}" placeholder="Agrega una descripción del destino"></textarea>
            <span id="archivoHelp" class="form-text text-danger invalid-fedback">{{$errors->first('descripcion')}}</span>
        </div>
        <div class="form-group">
            <label for="precio">Precio(No colocar signos solo numero)</label>
            <input type="number" class="form-control {{ null!=$errors->first('precio') ? 'is-invalid' : '' }}" id="precio" aria-describedby="emailHelp" placeholder="$precio" name="precio" value="{{old("precio")}}">
        <span id="archivoHelp" class="form-text text-danger">{{$errors->first('precio')}}</span>
        </div>
        <div class="form-group">
            <label for="promocion">Promocion(0-100%)"Si no tiene promo colocar 0"</label>
            <input type="number" class="form-control {{ null!=$errors->first('promocion') ? 'is-invalid' : '' }}" id="promocion" aria-describedby="emailHelp" placeholder="%promocion" name="promocion"
            value="{{old("promocion")}}">
            <span id="archivoHelp" class="form-text text-danger">{{$errors->first('promocion')}}</span>
        </div>
        
        <div class="form-group">
        <label for="provincia">Provincia</label>
            <select class="form-control {{ null!=$errors->first('provincia') ? 'is-invalid' : '' }}" name="provincia" id="provincia">
                <option value="">Elegir provincia</option>
                <?php foreach($provincias as $provincia): ?>
                <option value="{{$provincia->id_provincia}}">
                 {{$provincia->nombre_provincia}} </option>
                <?php endforeach; ?>
            </select>
            <span id="archivoHelp" class="form-text text-danger">{{$errors->first('provincia')}}</span>
        </div>
        <div class="custom-file">
                <input type="file" class="custom-file-input {{ null!=$errors->first('imagenPerfil') ? 'is-invalid' : '' }}" id="customFileLang" lang="es" name="imagenPerfil">
                <label class="custom-file-label" for="customFileLang">Seleccionar Foto de Perfil</label>
                <span id="archivoHelp" class="form-text text-danger">{{$errors->first('imagenPerfil')}}</span>
        </div>

    <div class="mt-3">
        <button type="submit" class="btn btn-primary">Agregar</button>
    </div>
        
    </form>
</div>   
    
    
    
    </div>


</div>
    
@endsection

@section('script')
<script>
        $('.custom-file-input').on('change', function(event) {
            var inputFile = event.currentTarget;
            $(inputFile).parent()
                .find('.custom-file-label')
                .html(inputFile.files[0].name);
        }); 
</script>
@endsection