<?php 

      include_once 'config.php';
      $erroresRegistro =[];
      $erroresArchivo=[];
          if($_POST){

              $erroresRegistro= Validador::validarFormulario($_POST);
              if($_FILES){
                $erroresArchivo = Validador::validarImagenPerfil($_FILES);
              }       
              
              if(count($erroresRegistro) == 0 && count($erroresArchivo) == 0){

                  $erroresRegistro = Validador::validarEmailSimilar($_POST["email"]);
                  if (count($erroresRegistro)== 0) {
                    
                    UsuarioComun::agregarUsuario($_POST, $_FILES);
                    
                  }
              
              };

          }
 ?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/1d957837e6.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/style-login-registro.css">
  <title>DigitalTurismo</title>
</head>
<body>

<div class="container-fluid contenedor-nav">
  <div class="row p-0 m-0">
     <?php include_once('nav.php') ?>
  </div>
</div>

<div class="todo">


<form class="formulario" action="" method="post" enctype="multipart/form-data">
  <h1>Registrate</h1>
  <div class="contenedor">
    
  <div class="form-group">
    <div class="input-contenedor">
      <i class="fas fa-user icon"></i>
      <input type="text" name="nombre" placeholder="Nombre Completo" value="<?= Validador::persistirDato($erroresRegistro, "nombre"); ?>">  
    </div>
    <span id="nombrelHelp" class="form-text text-danger"><?= Validador::existeError($erroresRegistro, "nombre");?></span>
  </div>

  <div class="form-group">
    <div class="input-contenedor">
      <i class="fas fa-envelope icon"></i>
      <input type="text" name="email" placeholder="Correo Electronico" value="<?= Validador::persistirDato($erroresRegistro, "email"); ?>">  
    </div>
    <span id="emailHelp" class="form-text text-danger"><?= Validador::existeError($erroresRegistro, "email"); ?> </span> 
  </div>

  <div class="form-group">
    <div class="input-contenedor">
      <i class="fab fa-facebook icon"></i>
      <input type="text" name="facebook" placeholder="Facebook" value="<?= Validador::persistirDato($erroresRegistro, "facebook"); ?>">
    </div>
  </div>

  <div class="form-group">
    <div class="input-contenedor">
      <i class="fab fa-twitter-square icon"></i>
      <input type="text" name="twitter" placeholder="Twitter" value="<?= Validador::persistirDato($erroresRegistro, "twitter"); ?>">
      </div>
    </div>
    <div class="form-group">
      <div class="input-contenedor">
        <i class="fab fa-instagram icon"></i>
        <input type="text" name="instagram" placeholder="Instagram" value="<?= Validador::persistirDato($erroresRegistro, "instagram"); ?>">
      </div>
    </div>

    <div class="form-group">
    <div class="input-contenedor">
      <i class="fas fa-key icon"></i>
      <input type="password" name="password" placeholder="Contraseña">
      
    </div>
    <span id="repasswordHelp" class="form-text text-danger"><?= Validador::existeError($erroresRegistro, "password");?></span>
    </div>
  
    <div class="form-group">
    <div class="input-contenedor">
      <i class="fas fa-key icon"></i>
      <input type="password" name="repassword" placeholder="Repetir Contraseña">
      
    </div>
    <span id="repasswordHelp" class="form-text text-danger"><?= Validador::existeError($erroresRegistro, "repassword");?></span>
    </div>

    <div class="custom-file mb-3">
      <input type="file" class="custom-file-input" id="customFileLang" lang="es" name="imagenPerfil">
      <label class="custom-file-label" for="customFileLang">Seleccionar Foto de Perfil</label>
      <span id="archivoHelp" class="form-text text-danger"><?= Validador::existeError($erroresArchivo, "imagenPerfil");?></span>
    </div>
    <input type="submit" value="Registrate"  class="button">
    <p>Al hacer clic en "Registrate", aceptas nuestras Condiciones de uso y Politica de privacidad</p>
    <p>¿Ya tienes cuenta?<a class="link" href="login.php">Iniciar Sesion</a></p>
    
  </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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