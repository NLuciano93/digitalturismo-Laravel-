<?php 

    function validarFormulario($array){
        $errores=[];
            //validamos input nombre
        if(isset($array["nombre"])){
            if (empty($array["nombre"])) {
                //ERROR
                $errores["nombre"] = "Debes completar este campo";
            }elseif (strlen(trim($array["nombre"])) < 2) {
                $errores["nombre"] = "El nombre debe tener al menos 2 caracteres";
            }
        }

        //validamos input email
        if(isset($array["email"])){
            if (empty($array["email"])) {
                $errores["email"] = "Debes completar este campo";
            }elseif (!(filter_var($array["email"], FILTER_VALIDATE_EMAIL))) {
                $errores["email"]= "Debes ingresar un email válido";
            }
        }
        
        //validamos Password

        if (isset($array["password"])) {
            if (empty($array["password"])) {
                $errores["password"] = "Debes completar este campo";
            }elseif (strlen($array["password"]) < 6) {
                $errores["password"] = "Tu contraseña debe tener mínimo 6 caracteres";
            }
        }
        
        //validamos input repassword
        if (isset($array["repassword"])) {
            if (empty($array["repassword"])) {
                $errores["repassword"] = "Debes completar este campo";
            }elseif ($array["password"] != $array["repassword"]) {
                 $errores["repassword"] = "Las contraseñas deben coincidir";
            }
        }
        if (isset($array["mensaje"])) {
             if (empty($array["mensaje"])) {
                 $errores["mensaje"] = "Debes completar este campo";
             }elseif (strlen($array["mensaje"]) < 10) {
                $errores["mensaje"] = "Debes llenar este campo con al menos 10 caracteres";
             }
        }
        if(isset($array["viejaPassword"]) && isset($_SESSION["email"])){
            $verificarPassword = $array["viejaPassword"];
            //ARTICULO CON LA BASE DE DATOS PARA VERIFICAR QUE LA CONTRASEÑA DEL USUARIO ES LA MISMA QUE INGRESO
            if (empty($array["viejaPassword"])) {
                $errores["viejaPassword"] = "Debes completar este campo";
            }elseif (verificarPassword($verificarPassword)) {
                $errores["viejaPassword"] = "Contraseña incorrecta, intente nuevamente";
            }
        }
        
        return $errores;

    }

    function validarImagenPerfil($archivo){
            $errores =[];

            if ($archivo["imagenPerfil"]["error"] != UPLOAD_ERR_NO_FILE) {
                if ($archivo["imagenPerfil"]["error"] != UPLOAD_ERR_OK ) {
                $errores["imagenPerfil"] = "Hubo un error al cargar la imagen";
            }else{
                $ext = strtolower(pathinfo($archivo["imagenPerfil"]["name"], PATHINFO_EXTENSION));
                if ($ext != "png" && $ext != "jpg" && $ext != "jpeg") {
                    $errores["imagenPerfil"] = "La imagen debe ser formato png, jpg o jpeg";
                }
            }
        }
        return $errores;
        }


   
    function existeError($error, $consulta){
        if (isset($error[$consulta])) {
            return $error[$consulta];
        }

    }

    function persistirDato($arrayE, $consulta){
        if (!(isset($arrayE[$consulta]))) {
                if(isset($_POST[$consulta])){
                    return $_POST[$consulta];
                }
        }
    }

    function validarLogin($array, $recordarme = 0){
        $errores = [];
        if(isset($array["email"]) && isset($array["password"])){
            //ESTO VA A VERIFICAR EN EL CONTROLADORBBDD
            $errores = buscarUsuario($array, $recordarme);
        }
        return $errores;     
    }

    function verificarPassword($password){
        $arrayUsuarios = dbDeUsuarios();
        foreach ($arrayUsuarios as $usuario) {
            if ($_SESSION["email"] == $usuario["email"]) {
                if (password_verify($password, $usuario["password"])) {
                    return false;
                }
            }
        }
        return true;
    }
   









?>