<?php

    require_once 'config.php';

    $usuarios= UsuarioComun::listarUsuarios();
    $destinos= Destino::listarDestinos();

?>



    
    <?php 
    
    if (isset($_GET["list"])) {
    
    switch ($_GET["list"]) {
        case 'listU': ?>
                     <div class="container-fluid mt-5">
                        <div class="row">

                        <?php if(is_array($usuarios)): ?>
                                    <table class="table table-striped">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">Nombre</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Eliminar</th>
                                                
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($usuarios as $usuario): ?>
                                                <tr>
                                                    <td><?=$usuario->getNombre()?></td>
                                                    <td><?= $usuario->getEmail()?></td>
                                                    <td><a href="" class="btn btn-danger">Eliminar</a></td>
                                                </tr>
                                            <?php endforeach; ?>
                                            </tbody>
                                    </table>
                        <?php else: ?>

                            <div class="alert alert-danger" role="alert">
                                    <span class="alert-link"><?= $usuarios ?></span>
                                </div>
                            <?php endif;?>

                        </div>
                </div>
  
         <?php   break; 
         
         case 'listD': ?>
                    <div class="container-fluid mt-5">
                        <div class="row">
                        
                        <?php if (isset($_GET["delete"])) {
                            if ($_GET["delete"] =="ok") { ?>
                            <div class="alert alert-success" role="alert">
                                    🌴 Se borro el destino exitosamente. 😄
                                </div>   
                         <?php 
                            }else if($_GET["delete"] =="nok"){
                                ?>

                            <div class="alert alert-danger" role="alert">
                                    No se pudo borrar exitosamente.
                                </div>      


                        <?php    }
                        } 
                        ?>

                        <div class="col-12 m-3">
                                 <a href="destinoAlta.php" class="btn btn-primary btn-lg" tabindex="-1" role="button">AGREGAR DESTINO</a>
                        </div>
                            

                        <?php if(is_array($usuarios)): ?>
                                    <table class="table table-striped">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">NombreDestino</th>
                                                    <th scope="col">Precio</th>
                                                    <th scope="col">Promoción</th>
                                                    <th scope="col">Provincia</th>
                                                    <th scope="col">Editar</th>
                                                    <th scope="col">Eliminar</th>
                                                
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($destinos as $destino): ?>
                                                <tr>
                                                    <td><?=$destino->getNombre()?></td>
                                                    <td>$<?= $destino->getPrecio()?></td>
                                                    <td><?= $destino->getPromocion()?>%</td>
                                                    <td><?= $destino->getProvincia()?></td>
                                                    <td><a href="destinoMod.php?id=<?= $destino->getId() ?>" class="btn btn-success" tabindex="-1" role="button">Editar</a></td>
                                                    <td><a href="destinoDelete.php?id=<?= $destino->getId() ?>" class="btn btn-danger" tabindex="-1" role="button">Eliminar</a></td>
                                                </tr>
                                            <?php endforeach; ?>
                                            </tbody>
                                    </table>
                        <?php else: ?>

                            <div class="alert alert-danger" role="alert">
                                    <span class="alert-link"><?= $usuarios ?></span>
                                </div>
                            <?php endif;?>

                        </div>
                    </div>

      <?php  default:
            # code...
            break;
        }
    }else{ ?>
    
  <?php  } ?>

    


       

        
    





