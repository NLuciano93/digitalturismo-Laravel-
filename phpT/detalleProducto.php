<?php session_start();
    include_once 'controladores/autoload.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Digital Turismo | Detalle Producto</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styleDetalleProductos.css">
    <link href="https://fonts.googleapis.com/css?family=Anton|Oswald:500|Roboto&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/67f61afa3e.js" crossorigin="anonymous"></script>
</head>

<body>

<div class="container-fluid p-0 m-0">
<div class="row p-0 m-0">
<div class="col-12 p-0 m-0">
<!-- Cabecera - barra navegadora -->
<div class="container-fluid p-0">
    <div class="row m-0">
        <?php include_once('nav.php') ?>
    </div>
</div>

<div class="fondo_producto">
    
    <div class=contenedor-detalle>

<!-- icono Mi carrtito-->
    <div class="carritoIcono">
    
        <div class="tit-carrito">
            <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal">       
                <i class="fas fa-shopping-cart"></i>
            </button>
            <span> 1 </span>
        </div>  
    </div> 

        <div class="row">
            <div class="col-xs-12 box1">
                 <h4>BARILOCHE SKI</h4>
            </div>
        </div>

        <div class="row">
        
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="contenedor-collage">
                    <div class="collage">
                        <img class="img-Principal" src="images/Destinos/Bariloche/barilocheCentroCivico.jpg"  alt="Bariloche"> 
                    </div>
            
                    <div class="collage">
                        <img class="img-Principal" src="images/Destinos/Bariloche/barilocheBaseNieve.jpg" alt="Bariloche">
                    </div>

                    <div class="collage">
                        <img class="img-Principal" src="images/Destinos/Bariloche/barilocheEsquiando.jpg"  alt="Bariloche">
                    </div>

                    <div class="collage">
                        <img class="img-Principal" src="images/Destinos/Bariloche/barilocheAeroSilla.jpg"  alt="Bariloche">
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <article class="detalle-info">        
                    <p>Cerro Catedral a pleno ...!! Ski libre, equipos e indumentaria incluida. Intructores para todos los niveles.</p>
                    <div class="costos">
                        <h6> Costo por Pasajero</h6>
                        <h4> $15.800</h4>
                    </div> 
                </article>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">               
                <div class="iconos-pie-card box-iconos">
                    <img class="icon-compar" src="images/iconos/compartir-Icon.png" alt="compartir" title="Compartir">
                    <img class="icon-compar" src="images/iconos/botonCarritoCompra-2.png" alt="carrito" title="Agregar al Carrito de Compras">
                </div>
            </div>        
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">MI CARRITO</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
      
            <div class="modal-body">
            <!-- <-- renglon titulos -->
                <div class="row">
                    <div class="col-xs-3">
                        <h5>Cant</h5>
                    </div>

                    <div class="col-xs-3">
                        <h5>Destino</h5>
                    </div>

                    <div class="col-xs-3">
                        <h5>Costo Unit.</h5>
                    </div>

                    <div class="col-xs-3">
                        <h5>Costo Total</h5>
                    </div> 
                </div>

            <!-- renglon productos -->
                <div class="row">
                    <div class="col-xs-3">
                        <h6>2</h6>
                    </div>
                    <div class="col-xs-3">
                        <h6>Bariloche Ski</h6>
                    </div>
                    <div class="col-xs-3">
                        <h6>$6.500,00</h6>
                    </div>
                    <div class="col-xs-3">
                        <h6>$13.000,00</h6>
                    </div>
                </div>
            <!-- renglon total -->           
                <div class="row">
                    <div class="col-xs-6 total">
                        <h4>TOTAL COMPRA</h4>
                    </div>
                    <div class="col-xs-6 total">
                        <h4>$13.000,00</h4>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-warning">Finalizar Compra</button>
            </div>
        </div>
    </div>
</div>

    <!--------FOOTER------------------------------->
    <div class="container-fluid p-0">
            <div class="row m-0">
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
