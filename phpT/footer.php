<?php
    include_once 'controladores/helpers.php';
    include_once 'controladores/controladorValidacion.php';
    include_once 'controladores/controladorUsuario.php';
    include_once 'controladores/controladorBBDD.php';

    $erroresContacto =[];
    if($_POST){
       $erroresContacto = validarFormulario($_POST);
    }
?>

<div class="col-12 p-0">
        <footer>
          <div class="social d-flex flex-wrap">
            <div class="mision col-12">
              <h3>Nuestra Misión</h3>
              <h4 class="mt-3">DigitalTurismo busca fomentar el turismo en Argentina, para que crezca el sector, trayéndole a los usuarios los más lindos paisajes para visitar.</h4>
            </div>
            
            <div id="contacto" class="contacto mt-5 col-md-6">
              <h3>Contacto</h3>
              <form action="#contacto" method="POST">
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email..." name="email" value="<?= persistirDato($erroresContacto, "email"); ?>">
                  <span id="emailHelp" class="form-text text-danger"><?= existeError($erroresContacto, "email"); ?> </span>   
                </div>
                
                <div class="form-group">
                  <label for="exampleFormControlTextarea1">Mensaje</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="Mensaje..." name="mensaje" value="<?= persistirDato($erroresContacto, "mensaje"); ?>"></textarea>
                  <span id="textAreaHelp" class="form-text text-danger"><?= existeError($erroresContacto, "mensaje"); ?></span> 
                </div>
                <button type="submit" class="btn btn-info btn-block">Enviar</button>
              </form>
            </div>
          <!-- ICONOS DE RED SOCIAL !-->
            <div class="red-social mt-5 col-md-6">
              <h3 class="mb-4">Visitanos</h3>
              <a class="a-iconos" href="#"><i class="fab fa-facebook-f icono-facebook mb-5"></i></a>
              <a class="a-iconos" href="#"><i class="fab fa-instagram mb-5"></i></a>
              <a class="a-iconos" href="#"><i class="fab fa-twitter mb-5"></i></a> 
            </div>
          </div>  
          
          <div class="copyright p-5 bg-dark">
            <span>Design DigitalTeam<i class="far fa-copyright"></i> 2020</span>
          </div>
        </footer>
        
      </div>