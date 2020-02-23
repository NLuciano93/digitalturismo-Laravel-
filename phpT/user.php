<?php 

    require_once 'config.php';

    if (!isset($_SESSION["email"])){
          header('Location:login.php');
      }else{
          $usuario = new UsuarioComun($_SESSION);
      }

   
    $erroresActulizarPerfil =[];
    $erroresArchivo =[];
    
     if($_POST){
       
        $erroresActulizarPerfil = Validador::validarFormulario($_POST);
        if($_FILES){
          $erroresArchivo = Validador::validarImagenPerfil($_FILES);
        }
        //DIVIDO SI ME LLEGA CAMBIO DE PASSWORD NO ACTUALIZO LOS DEMAS ATRIBUTOS
        if(!isset($_POST["password"])){

          if(count($erroresActulizarPerfil)==0 && count($erroresArchivo) == 0){

          if($_FILES){

            if($_FILES["imagenPerfil"]["error"] != UPLOAD_ERR_NO_FILE){              
              $nombreImagen = $usuario->guardarAvatar($_FILES);
            }else{
              $nombreImagen = $usuario->getImagenPerfil();
            }
          }
          $cambioPerfil = $usuario->actualizarUsuario($_POST, $nombreImagen);
          }
        }else{
          if (count($erroresActulizarPerfil) == 0) {
             $passCambiada=$usuario->cambiarPassword($_POST["password"]);
          }
        }
      }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>user</title>
  
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito+Sans&display=swap" rel="stylesheet">
  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style-user.css">
  
  <body>
    <!--Nav-->
    <div class="container-fluid contenedor-nav p-0">
      <div class="row">
      <?php include_once('nav.php') ?>
      </div>
    </div>
    <!-- Imagen usuario-->
    <div class="contenedor_usuario">
      <div class="container">
        <div class="jumbotron jumbotron-fluid mt-0">
          <div class="container">
            <h2><?= $usuario->getNombre() ?></h2>
            <div class="d-flex justify-content-center h-100">
              <div class="image_outer_container">
                <div class="image_inner_container">
                  <img class="img-fluid img-thumbnail" src="images/<?= $usuario->getImagenPerfil() ?>">
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!--Datos-->
        
        <div class="row">
          <div class="col-4">
            <div class="list-group" id="list-tab" role="tablist">
              <a class="list-group-item list-group-item-action <?= !isset($_POST["viejaPassword"]) ? "active" : "" ?>" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Información personal</a>
              <a class="list-group-item list-group-item-action <?= isset($_POST["viejaPassword"]) ? "active" : "" ?>" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Cambiar contraseña</a>
              <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Favoritos</a>
              <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Contactos</a>
            </div>
          </div>
          <div class="col-8">
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade <?= !isset($_POST["viejaPassword"]) ? "show active" : "" ?>" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                <h2 class="mb-3">Actualizar Usuario</h2>
                <form action="user.php" method="post" enctype="multipart/form-data">
                  <div class="form-row">
                    <div class="col-md-12">
                      <div class="md-form form-group">
                      <?php
                    if (isset($cambioPerfil)):
                      if ($cambioPerfil) : ?>
                        <div class="alert alert-success" role="alert">
                        🌴 Cambios realizados exitosamente. 😄
                      </div>
                      <?php else: ?>
                        <div class="alert alert-danger" role="alert">
                          No se pudieron realizar los cambios intente nuevamente.
                      </div>
                      <?php 
                      endif;
                      endif;
                      ?>
                        <input type="email" class="form-control" id="inputEmail4MD" placeholder="Insertar Email" name="email" value="<?= $usuario->getEmail() ?>">      
                        <span id="emailHelp" class="form-text text-danger"><?=  Validador::existeError($erroresActulizarPerfil, "email"); ?> </span>
                      </div>
                    </div>                    
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="md-form form-group">
                        <input type="text" class="form-control" id="inputAddressMD" placeholder="Insertar Nombre" name="nombre" value="<?= $usuario->getNombre()?>"> 
                        <span id="emailHelp" class="form-text text-danger"><?=  Validador::existeError($erroresActulizarPerfil, "nombre"); ?> </span>
                      </div>
                    </div>  
                </div>                  
                  <div class="form-row">
                    <div class="col-md-12">
                      <div class="md-form form-group">
                        <input type="text" class="form-control" id="inputCityMD" placeholder="Insertar Facebook" name="facebook" value="<?= $usuario->getFacebook() ?>">
                      </div>
                    </div>                    
                    <div class="col-md-12">
                      <div class="md-form form-group">
                        <input type="text" class="form-control" id="inputZipMD" placeholder="Insertar twitter" name="twitter" value="<?= $usuario->getTwitter() ?>">      
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="md-form form-group">
                        <input type="text" class="form-control" id="inputZipMD" placeholder="Insertar Instagram" name="instagram" value="<?= $usuario->getInstagram() ?>"> 
                      </div>
                    </div>
                  </div>                  
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFileLang" lang="es" name="imagenPerfil">
                    <label class="custom-file-label" for="customFileLang">Seleccionar Foto de Perfil</label>
                    <span id="archivoHelp" class="form-text text-danger"><?=  Validador::existeError($erroresArchivo, "imagenPerfil");?></span>
                  </div>
                  <div class="mt-3">
                    <button type="submit" class="btn btn-primary btn-md">Actualizar datos</button>                    
                  </div>                   
                </form>
              </div>

              <div class="tab-pane fade <?= isset($_POST["viejaPassword"]) ? "show active" : "" ?> " id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                <h2>Cambia tu contraseña</h2>
                <?php
                    if (isset($passCambiada)):
                      if ($passCambiada) : ?>
                        <div class="alert alert-success" role="alert">
                        🌴 Contraseña cambiada exitosamente. 😄
                      </div>
                      <?php else: ?>
                        <div class="alert alert-danger" role="alert">
                          La contraseña no se pudo cambiar intente nuevamente.
                      </div>
                      <?php 
                      endif;
                      endif;
                      ?>
                <form action="user.php" method="POST">
                  <div class="form-group">
                    <label for="inputPassword6" class="font-weight-bold">Contraseña actual</label>
                    <input type="password" id="inputPassword6" class="form-control mx-sm-3" aria-describedby="passwordHelpInline" name="viejaPassword">
                    <span id="emailHelp" class="form-text text-danger"><b><?=  Validador::existeError($erroresActulizarPerfil, "viejaPassword"); ?> </b></span>
                  </div>                  
                  <br>                  
                  <div class="form-group">
                    <label for="inputPassword6" class="font-weight-bold">Nueva contraseña</label>
                    <input type="password" id="inputPassword6" class="form-control mx-sm-3" aria-describedby="passwordHelpInline" name="password">
                    <span id="emailHelp" class="form-text text-danger"><b><?=  Validador::existeError($erroresActulizarPerfil, "password"); ?> </b></span>
                  </div>                  
                  <br>
                  <div class="form-group">
                    <label for="inputPassword6" class="font-weight-bold">Repetir nueva contraseña</label>
                    <input type="password" id="inputPassword6" class="form-control mx-sm-3" aria-describedby="passwordHelpInline" name="repassword">
                    <span id="emailHelp" class="form-text text-danger"><b><?= Validador::existeError($erroresActulizarPerfil, "repassword"); ?> </b></span>
                  </div>                  
                  <br>
                  <div>
                    <button type="submit" class="btn btn-dark">Cambia tu contraseña</button>
                  </div>
                  
                  
                  
                  
                </form>               
              </div>

              <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
                <section class="section pb-3 text-center">                
                  <div class="row">                    
                    <div class="col-lg-4 col-md-12 mb-4">                      
                      <div class="card testimonial-card">                        
                        <div class="card-up teal lighten-2">
                        </div>                        
                        <div class="avatar mx-auto white"><img src="images/img-user/sanluis.jpg"
                          alt="avatar mx-auto white" class="rounded-circle img-fluid">
                        </div>                        
                        <div class="card-body">
                          <h4 class="card-title mt-1">Valle de Talampaya</h4>
                          <hr>
                          <p>El parque nacional Talampaya se encuentra ubicado en el centro-oeste de la provincia de La Rioja en Argentina </p>
                        </div>                        
                      </div>                      
                    </div>                    
                    <div class="col-lg-4 col-md-12 mb-4">                      
                      <div class="card testimonial-card">                        
                        <div class="card-up blue lighten-2">
                        </div>                        
                        <div class="avatar mx-auto white"><img src="images/img-user/bariloche.jpg"
                          alt="avatar mx-auto white" class="rounded-circle img-fluid">
                        </div>                        
                        <div class="card-body">
                          <h4 class="card-title mt-1">Bariloche
                          </h4>
                          <hr>
                          <p>San Carlos de Bariloche, conocida simplemente como Bariloche,1​ es una ciudad ubicada en la provincia de Río Negro, Argentina.
                          </p>
                        </div>                        
                      </div>                      
                    </div>                    
                    <div class="col-lg-4 col-md-12 mb-4">                      
                      <div class="card testimonial-card">                        
                        <div class="card-up deep-purple lighten-2"></div>                        
                        <div class="avatar mx-auto white"><img src="images/img-user/calafate.jpg"
                          alt="avatar mx-auto white" class="rounded-circle img-fluid">
                        </div>                        
                        <div class="card-body">
                          <h4 class="card-title mt-1">El Calafate</h4>
                          <hr>
                          <p>Es una ciudad ubicada en la ribera meridional del lago Argentino, en la región de la Patagonia, en la provincia de Santa Cruz, Argentina</p>
                        </div>                        
                      </div>                      
                    </div>                    
                  </div>                  
                </section>
              </div>
              <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
                <section class="section pb-3 text-center">               
                  <div class="row">                    
                    <div class="col-lg-4 col-md-12 mb-4">                      
                      <div class="card testimonial-card">                        
                        <div class="card-up teal lighten-2">
                        </div>                        
                        <div class="avatar mx-auto white"><img src="images/img-user/mariano.jpg"
                          alt="avatar mx-auto white" class="rounded-circle img-fluid">
                        </div>                        
                        <div class="card-body">
                          <h4 class="card-title mt-1">Mariano Rojas</h4>
                          <hr>
                          <p> @Mariano10</p>
                        </div>                        
                      </div>                      
                    </div>                    
                    <div class="col-lg-4 col-md-12 mb-4">                      
                      <div class="card testimonial-card">                        
                        <div class="card-up blue lighten-2">
                        </div>                        
                        <div class="avatar mx-auto white"><img src="images/img-user/carlos.png"
                          alt="avatar mx-auto white" class="rounded-circle img-fluid">
                        </div>                        
                        <div class="card-body">
                          <h4 class="card-title mt-1">Carlos Jose </h4>
                          <hr>
                          <p> @JoseHernandez </p>
                        </div>                        
                      </div>                      
                    </div>                    
                    <div class="col-lg-4 col-md-12 mb-4">                      
                      <div class="card testimonial-card">                        
                        <div class="card-up deep-purple lighten-2"></div>                        
                        <div class="avatar mx-auto white"><img src="images/img-user/maria.png"
                          alt="avatar mx-auto white" class="rounded-circle img-fluid">
                        </div>                        
                        <div class="card-body">
                          <h4 class="card-title mt-1">Maria Sanchez</h4>
                          <hr>
                          <p> @MariaSanchez </p>
                        </div>                        
                      </div>                      
                    </div>                    
                  </div>                  
                </section>
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