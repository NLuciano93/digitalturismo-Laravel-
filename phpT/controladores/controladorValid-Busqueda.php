<?php 

function validarBuscar($data) {

// Creo un array de errores vacío.
$errores = [];

// CAMPO NOMBRE
$destino = trim($data['destino']);
// si está vacío,
if($destino == "") {
  // creo la posición "name" en el array de errores y guardo el string con el error que le quiero mostrar al usuario
  $errores['destino'] = "Debes completar este campo";
}

  return $errores;

}
if($_POST) {
  if (isset($_POST["destino"])) {
    // ver función validar() en archivo funciones.php
      $errores = validarBuscar($_POST);

      if(!$errores) {

          // redirecciono a buscar destinos
          header('Location: buscarDestinos.php');

      }

  }


}

?>