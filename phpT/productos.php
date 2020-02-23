<?php 
        require_once 'config.php';

        $destinos = Destino::listarDestinos();
        $paises = Pais::listarPais();
        $provincias = Provincia::listarProvincia();
        if(isset($_POST["destino"])){   
               $destinos = Destino::buscarDestinos($_POST["destino"], $_POST["provincia"]);
                        
        }
        
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Digital Turismo | Productos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styleProductos.css">
    <link rel="stylesheet" href="css/style-login-registro.css">
    <link href="https://fonts.googleapis.com/css?family=Anton|Oswald:500|Roboto&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/67f61afa3e.js" crossorigin="anonymous"></script>
</head>

<body>

<div class="container-fluid">
<div class="row">
<div class="col-12 p-0 m-0">
    <div class="container-fluid contenedor-nav">
        
        <!-- Cabecera - barra navegadora -->
        <div class="row p-0 m-0">
          <?php  include_once('nav.php') ?>
        </div>
    </div>
    
    <!-- titulo pagina -->
    <div class="fondo_productos">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="titEncabeza">
                        <h2>¡ ENCONTRÁ TU DESTINO ...!</h2> 
                    </div>
                </div>
            </div>  
        </div>     
        <!-- carousel -->
        <div class="container">
            <div class="row">
                <div class="col-12 carrusel">
                    <section class="carrusel m-3">
                        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                            <!-- imagenes carousel -->
                            <div class="carousel-inner">
                                <div class="carousel-item active imgCarrusel">
                                    <img class = "imgCarruseltamano" src="images/Destinos/Bariloche/barilocheBaseNieve.jpg" class="d-block w-100 img-fluid" alt="Bariloche"> 
                                    <div class="tit-Destino-carru" >
                                        <a href="detalleProducto.php">
                                            <h3>BARILOCHE SKI</h3>
                                        </a>
                                    </div>
                                </div>
                                
                                <div class="carousel-item imgCarrusel">
                                    <img class = "imgCarruseltamano" src="images/Destinos/Cataratas/cataratas-iguazu-panoramica.jpg" class="d-block w-100 img-fluid" alt="...">
                                    <div class="tit-Destino-carru" >
                                        <a href="detalleProducto.php">
                                            <h3>CATARATAS Extrem</h3>
                                        </a>
                                    </div>
                                </div>
                                
                                <div class="carousel-item imgCarrusel">
                                    <img class = "imgCarruseltamano" src="images/Destinos/Mendoza/mendozaUvasMontañas.jpg" class="d-block w-100 img-fluid" alt="...">
                                    <div class="tit-Destino-carru" >
                                        <a href="detalleProducto.php">
                                            <h3>MENDOZA CITY TOUR</h3>
                                        </a>
                                    </div>
                                </div>
                                
                                <div class="carousel-item imgCarrusel" >
                                    <img class = "imgCarruseltamano" src="images/Destinos/Salta/saltaMontañaColores.jpg" class="d-block w-100 img-fluid" alt="...">
                                    <div class="tit-Destino-carru" >
                                        <a href="detalleProducto.php">
                                            <h3>SALTA "LA LINDA"</h3>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- control carousel -->
                            <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                            
                        </div>
                    </section>
                </div> 
            </div>
        </div>
        <!-- Todos los destinos  -->
        <section class="destinos">
        <nav class="navbar navbar-light bg-dark d-flex justify-content-center">
            <form class="form" action="" method="post">
             <div class="form-row">
                <div class="form-group">
                    <input class="form-control mr-sm-3" type="search" name='destino' value="<?= isset($_POST['destino']) ? $_POST['destino'] : '' ?>" placeholder="Buscar Destino" aria-label="Default" 
                                    aria-describedby="inputGroup-sizing-default">
                                     
                </div>
            
           
                 
                <div class="form-group mx-3">
                <select id="inputState" class="form-control mr-sm-5" name="provincia">
                    <option value="">Elegir Provincia...</option>
                    <?php foreach($provincias as $provincia) : ?>
                        
                            <option value="<?= $provincia->getId()?>"><?= $provincia->getNombre() ?></option>
                    <?php endforeach;?>
                </select>
                </div> 


                <button class="btn btn-outline-success" type="submit">Buscar</button>
            </div>
            
               
            </form>
        </nav>
            <div class="container">
                <div class="row">
                    <?php if (is_array($destinos)):
                        foreach ($destinos as $destino) : ?>
                            
                         <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-3">
                                    
                                    <article class="borderBox m-3 destino-individual">
                                        
                                        <div class="photo-container">
                                            <img class="photo" src="images/Destinos/<?=$destino->getAvatar()?>" alt="Bari Esquiando">
                                            <?php if ($destino->getPromocion()) : ?>
                                                <img class="special" src="images/iconos/OfertaEspecial.png" alt="promo">
                                            <?php endif;?>
                                            <button class="favorito"><i class="fas fa-heart"></i></button>
                                            <a href="detalleProducto.php" title="Mas Informacion">
                                                <div class="tit-Destino" >
                                                    <h3 class="texto-card-titulo"><?= $destino->getNombre()?></h3>
                                                    <h3 class="texto-card-titulo">$<?= $destino->getPrecio()?></h3>
                                                </div>
                                            </a>
                                        </div>
                                        
                                    </article>                                
                                </div>

                        <?php
                        endforeach;   
                        ?>

                        
                   <?php else:?>
                    <div class="alert alert-danger" role="alert">
                        <span class="alert-link"><?= $destinos ?></span>
                    </div>
                   <?php endif;?>
                   
                    
                </div>
                
                <!-- controles de paginacion -->
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <nav aria-label="...">
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a></li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item active" aria-current="page">
                                        <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    
                </div>
            </section>
            
        </div>
        
        <!--------FOOTER------------------------------->
        <div class="container-fluid">
            <div class="row">             
                <?php include_once('footer.php') ?>
            </div>
        </div>

</div>
</div>
</div>
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
    </html>