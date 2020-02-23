<?php

function dbDeUsuarios() {
    $listaDeUsuarios = file_get_contents('usuarios.json');
    return json_decode($listaDeUsuarios, true);
  }

function registroUsuario($usuarioRegistro){
    $arrayUsuarios = dbDeUsuarios();
    $arrayUsuarios[] = $usuarioRegistro;
    $todosLosUsuarios = json_encode($arrayUsuarios);
    file_put_contents('usuarios.json', $todosLosUsuarios);
    header("Location: login.php?registro=ok");
}

function actualizarUsuario($usuarioActualizado){
    $arrayUsuarios = dbDeUsuarios();
    $len = count($arrayUsuarios);
    for($i= 0; $i< $len; $i++){
        if($_SESSION["email"] == $arrayUsuarios[$i]["email"]){
            
            $arrayUsuarios[$i]["email"] = $usuarioActualizado["email"];
            $arrayUsuarios[$i]["nombre"] = $usuarioActualizado["nombre"];
            $arrayUsuarios[$i]["facebook"] = $usuarioActualizado["facebook"];
            $arrayUsuarios[$i]["twitter"] = $usuarioActualizado["twitter"];
            $arrayUsuarios[$i]["instagram"] = $usuarioActualizado["instagram"];
            $arrayUsuarios[$i]["avatar"] = $usuarioActualizado["avatar"];
           
        }
    } 
    $todosLosUsuarios = json_encode($arrayUsuarios);
    file_put_contents('usuarios.json', $todosLosUsuarios);
    header("Location: logout.php?actualizar=ok");
}

function buscarUsuario($login, $recordar = 0){
    $error =[];
    $arrayUsuarios = dbDeUsuarios();
    foreach ($arrayUsuarios as $usuario) {
        if ($login["email"] == $usuario["email"]) {
            if (password_verify($login["password"], $usuario["password"])) {
                    $_SESSION["email"] = $usuario["email"];
                    $_SESSION["nombre"] = $usuario["nombre"];
                    $_SESSION["facebook"] = $usuario["facebook"];
                    $_SESSION["instagram"] = $usuario["instagram"];
                    $_SESSION["twitter"] = $usuario["twitter"];
                    $_SESSION["avatar"] = $usuario["avatar"];
                    
                    if ($recordar){
                        
                        setcookie("email", $usuario["email"], time() + (60 * 60 * 24 * 7));
                        setcookie("nombre", $usuario["nombre"], time() + (60 * 60 * 24 * 7));
                        setcookie("facebook", $usuario["facebook"], time() + (60 * 60 * 24 * 7));
                        setcookie("instagram", $usuario["instagram"], time() + (60 * 60 * 24 * 7));
                        setcookie("twitter", $usuario["twitter"], time() + (60 * 60 * 24 * 7));
                        setcookie("avatar", $usuario["avatar"], time() + (60 * 60 * 24 * 7));

                    }
                    header("Location: index.php");
                break;
            }else{
                 $error["password"] = "Password incorrecta, intente nuevamente";
                return $error;
            }
        }
    }
    $error["email"] = "El email ingresado no se encuentra registrado";
    return $error;
}

function cambiarPassword($password){
    $password = password_hash($password, PASSWORD_DEFAULT);
    $arrayUsuarios = dbDeUsuarios();
    $len = count($arrayUsuarios);
    for($i= 0; $i< $len; $i++){
        if($_SESSION["email"] == $arrayUsuarios[$i]["email"]){
            $arrayUsuarios[$i]["password"] = $password;
        }
    }
    $todosLosUsuarios = json_encode($arrayUsuarios);
    file_put_contents('usuarios.json', $todosLosUsuarios);
    header("Location: logout.php?actualizar=ok");
}
 