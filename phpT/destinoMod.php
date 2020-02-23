<?php

    require_once 'config.php';
    $erroresRegistro=[];
    $erroresArchivo=[];
    $id = (int)$_GET["id"];
    
    $obtenerDestino= Destino::obtenerDestinoPorId($id);
        if($_POST){
            
            $erroresRegistro= Validador::validarFormulario($_POST);
            if($_FILES){
              $erroresArchivo = Validador::validarImagenPerfil($_FILES);
            }       
            
            if(count($erroresRegistro) == 0 && count($erroresArchivo) == 0){
                
                
                  Destino::actualizarDestino($_POST, $_FILES);          
            };

        }

    $provincias= Provincia::listarProvincia();
    $provinciaPorId= Provincia::provinciaPorId($obtenerDestino->getProvincia());
       
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  
  <link rel="stylesheet" href="css/style-admin.css">
  <script src="https://kit.fontawesome.com/67f61afa3e.js" crossorigin="anonymous"></script>
  <title>digitalturismo</title>
</head>
<body>
    <div class="container-fluid">
                <div class="row">

                    <div class="col-12 p-0">
                        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                        <a class="navbar-brand" href="index.php"><img class="logo-barra" src="images/digitalTurismoLogoBlanco.png" alt="logo"> </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                                <div class="navbar-nav">
                                <a class="nav-item nav-link active" href="adminIndex.php">Home Admin</a>
                                <a class="nav-item nav-link active" href="adminIndex.php?list=listU">Lista de Usuarios</a>
                                <a class="nav-item nav-link active" href="adminIndex.php?list=listD">Lista de Destinos</a>
                                <a class="nav-item nav-link active" href="#3">Viajes Comprados</a>
                                
                                </div>
                            </div>
                        </nav>
                    </div>    
                
                
                </div>
            </div>
    <div class="container">
        <div class="row">
        <h1>Agrega un nuevo Destino</h1>

        <?php if (isset($_GET["registro"])) {
                if ($_GET["registro"] =="ok") { ?>
                <div class="alert alert-success" role="alert">
                        🌴 Registro realizado exitosamente. 😄
                      </div>   
          <?php 
                }
             } 
             ?>
        
  <div class="col-12">   
        <form action="" method="POST" enctype="multipart/form-data">

            <div class="form-group">
                <label for="exampleInputEmail1">Nombre Destino</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nombre Destino" name="nombre" value ="<?= $obtenerDestino->getNombre() ?>">
                <span id="archivoHelp" class="form-text text-danger"><?=  Validador::existeError($erroresRegistro, "nombre");?></span>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail2">Precio(No colocar signos solo numero)</label>
                <input type="text" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp" placeholder="$precio" name="precio" value ="<?= $obtenerDestino->getPrecio() ?>">
                <span id="archivoHelp" class="form-text text-danger"><?=  Validador::existeError($erroresRegistro, "precio");?></span>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail3">Promocion(0-100%)"Si no tiene promo colocar 0"</label>
                <input type="text" class="form-control" id="exampleInputEmail3" aria-describedby="emailHelp" placeholder="%promocion" name="promocion" value ="<?= $obtenerDestino->getPromocion() ?>">
                <span id="archivoHelp" class="form-text text-danger"><?=  Validador::existeError($erroresRegistro, "promocion");?></span>
            </div>
            
            <div class="form-group">
            <label for="exampleInputEmail5">Provincia</label>
                <select class="form-control" name="provincia">
                    <option value="<?= $obtenerDestino->getProvincia() ?>" selected><?= $provinciaPorId->getNombre()?></option>
                    <?php foreach($provincias as $provincia): ?>
                    <option value="<?= $provincia->getId() ?>">
                    <?= $provincia->getNombre() ?> </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFileLang" lang="es" name="imagenPerfil">
                    <label class="custom-file-label" for="customFileLang">Seleccionar Foto de Perfil</label>
                    <span id="archivoHelp" class="form-text text-danger"><?=  Validador::existeError($erroresArchivo, "imagenPerfil");?></span>
            </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Agregar</button>
        </div>
            
        </form>
    </div>   
        
        
        
        </div>
    
    
    </div>

       

        
    





<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/562bf078ff.js" crossorigin="anonymous"></script>
          
  <script>
                $('.custom-file-input').on('change', function(event) {
                    var inputFile = event.currentTarget;
                    $(inputFile).parent()
                        .find('.custom-file-label')
                        .html(inputFile.files[0].name);
                }); 
        </script>
</body>

</html>