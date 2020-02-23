<?php 

    
    include_once 'config.php';
    $erroresLogin =[];
    if($_POST){
        $erroresLogin = Validador::validarFormulario($_POST);
        if (!$erroresLogin) {
            if (isset($_POST["recordarme"])) {
                $erroresLogin = Validador::validarLogin($_POST, $_POST["recordarme"]);
            }else{
                $erroresLogin = Validador::validarLogin($_POST);
            }
        }
    }
    function okLogin(){
        if (isset($_GET["registro"])) {
            if ($_GET["registro"] == "ok") {
                return true;                
            }
        }   
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
   
    <div class="container-fluid contenedor-nav p-0 m-0">
        <div class="row m-0">
         <?php include_once('nav.php') ?>
              </div>
           </div>
   
    <div>
          <?php  if(okLogin()): ?>
            <div class="alert alert-success m-0" role="alert">
               <b>🌴 REGISTRO EXITOSO! 😄</b> 
            </div>
          <?php endif; ?>
    </div>
 <div class="todo">      
       
<form class="formulario" method="post" action="">
    <h1>Login</h1>
    <div class="contenedor">
        <div class="input-contenedor">
                <i class="fas fa-envelope icon"></i>
                <input type="text" placeholder="Correo Electronico" name="email" value="<?= Validador::persistirDato($erroresLogin, "email"); ?>">
        </div>
        <span id="emailHelp" class="form-text text-danger"><?= Validador::existeError($erroresLogin,"email"); ?> </span>

        <div class="input-contenedor">
                <i class="fas fa-key icon"></i>
                <input type="password" placeholder="Contraseña" name="password">   
        </div>
        <span id="passwordHelp" class="form-text text-danger"><?= Validador::existeError($erroresLogin, "password"); ?></span> 

        <div class="custom-control custom-checkbox mb-3">
            <input type="checkbox" class="custom-control-input" id="customCheck1" name="recordarme" value="1">
            <label class="custom-control-label" for="customCheck1">Recordarme</label>
        </div>
        <input type="submit" value="Login" class="button">
        <p>¿No tienes cuenta aun?<a class="link" href="registro.php">Registrate</a></p>
         
    </div>
</form>
<div class="alert alert-danger m-0" role="alert">
               <b> PARA HACER CRUD DE DESTINOS INGRESAR admin@admin.com, pass: 123456, luego ir a mi perfil y apareces en el perfil del admin </b> 
            </div>

</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>