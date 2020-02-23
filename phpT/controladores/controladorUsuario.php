<?php


function armarArrayUsuario($array){
    $usuarioRegistro = [
        "nombre" => trim($array["nombre"]),
        "email" => $array["email"],
        "password" => password_hash($array["password"], PASSWORD_DEFAULT),
        "facebook" =>$array["facebook"],
        "twitter" => $array["twitter"],
        "instagram"=> $array["instagram"]
    ];

    return $usuarioRegistro;
}
function armarArrayUsuarioActualizacion($array){
    $usuarioRegistro = [
        "nombre" => trim($array["nombre"]),
        "email" => $array["email"],
        "facebook" =>$array["facebook"],
        "twitter" => $array["twitter"],
        "instagram"=> $array["instagram"]
    ];
    return $usuarioRegistro;
}

function guardarAvatar($archivo){
    $nombreImagen = "userImage.png";
            if ($archivo["imagenPerfil"]["error"] != UPLOAD_ERR_NO_FILE) {
                $ext = strtolower(pathinfo($archivo["imagenPerfil"]["name"], PATHINFO_EXTENSION));
                $directorioTemporal = $archivo['imagenPerfil']['tmp_name'];

                $nombreImagen = uniqid('img_') . '.' . $ext;
                

                $carpetaFinal= dirname(__DIR__);
                $carpetaFinal = $carpetaFinal . '/images/';
                $carpetaFinal = $carpetaFinal . $nombreImagen;
                move_uploaded_file($directorioTemporal, $carpetaFinal);
            }
            return $nombreImagen;
}





?>