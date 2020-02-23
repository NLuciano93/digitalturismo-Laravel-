<?php

    class Validador{


        public static function validarFormulario($array){
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
            }elseif (Validador::verificarPassword($verificarPassword)) {
                $errores["viejaPassword"] = "Contraseña incorrecta, intente nuevamente";
            }
        }

        //Validacion para destinos

        if (isset($array["precio"])) {
            if (empty($array["precio"])) {
               $errores["precio"] ="Debes completar este campo";
            }else if($array["precio"] < 0){
                $errores["precio"] = "Precio ingresado no válido";
            }else if(is_integer($array["precio"])){
                $errores["precio"] = "Precio ingresado no válido";
            }
            
        }
        if (isset($array["promocion"])) {
            
             if($array["promocion"] < 0 || $array["promocion"] >100){
                $errores["promocion"] = "Promoción ingresada no válida";
            }
            else if(is_integer($array["promocion"])){
                $errores["promocion"] = "Promoción ingresado no válido";
            }
            
        }
        
        return $errores;

        }

        public static function validarImagenPerfil($archivo){
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
        public static function validarEmailSimilar($email){
            $errores = [];

            $link = Conexion::conectar();
            $sql = "SELECT email FROM usuarios WHERE email = :email";
            $stmt = $link->prepare($sql);
            $stmt->bindValue(':email', $email, PDO::PARAM_STR);
            $stmt->execute();

            if($stmt->fetch(PDO::FETCH_ASSOC)){
                $errores["email"]= "El email ingresado no está disponible, ingrese otro";
            }
            return $errores;
        }

       public static function existeError($error, $consulta){
            if (isset($error[$consulta])) {
                return $error[$consulta];
            }
    
        }
    
        public static function persistirDato($arrayE, $consulta){
            if (!(isset($arrayE[$consulta]))) {
                    if(isset($_POST[$consulta])){
                        return $_POST[$consulta];
                    }
            }
        }
        public static function validarLogin($array, $recordarme = 0){
            $errores = [];
            if(isset($array["email"]) && isset($array["password"])){
            //ESTO VA A VERIFICAR EN EL CONTROLADORBBDD
            
                $errores = Validador::buscarUsuario($array, $recordarme);
            }
            return $errores;  
        }

        public static function buscarUsuario($array, $recordarme){
            $error = [];
            
            $link= Conexion::conectar();
            $sql = "SELECT * FROM usuarios WHERE email = :email";
            $stmt = $link->prepare($sql);
            $stmt->bindValue(':email', $array["email"], PDO::PARAM_STR);
            $stmt->execute();
            $usuario=$stmt->fetch(PDO::FETCH_ASSOC);
            if($usuario){
                /*$array["password"] .="";
                var_dump($array["password"]);
                var_dump(password_verify($array["password"], $usuario["password"]));
                exit; */

                if (password_verify($array["password"], $usuario["password"])) {
                    $_SESSION["id_usuario"]= $usuario["id_usuario"];
                    $_SESSION["email"] = $usuario["email"];
                    $_SESSION["nombre_usuario"] = $usuario["nombre_usuario"];
                    $_SESSION["facebook"] = $usuario["facebook"];
                    $_SESSION["instagram"] = $usuario["instagram"];
                    $_SESSION["twitter"] = $usuario["twitter"];
                    $_SESSION["avatar"] = $usuario["avatar"];
                    
                    
                    if ($recordarme){
                        setcookie("id_usuario", $usuario["id_usuario"], time() + (60 * 60 * 24 * 7));
                        setcookie("email", $usuario["email"], time() + (60 * 60 * 24 * 7));
                        setcookie("nombre_usuario", $usuario["nombre_usuario"], time() + (60 * 60 * 24 * 7));
                        setcookie("facebook", $usuario["facebook"], time() + (60 * 60 * 24 * 7));
                        setcookie("instagram", $usuario["instagram"], time() + (60 * 60 * 24 * 7));
                        setcookie("twitter", $usuario["twitter"], time() + (60 * 60 * 24 * 7));
                        setcookie("avatar", $usuario["avatar"], time() + (60 * 60 * 24 * 7));
                        
                    }

                    header("Location: index.php");
                
                }else{
                    $error["password"] = "Password incorrecta, intente nuevamente";
                            return $error;
                }

            }
                $error["email"] = "El email ingresado es incorrecto";
                return $error;
    
        }

        public static function verificarPassword($password){
            $link= Conexion::conectar();
            $sql = "SELECT password FROM usuarios WHERE id_usuario = :id";
            $stmt = $link->prepare($sql);
            $stmt->bindValue(':id', $_SESSION["id_usuario"], PDO::PARAM_STR);
            $stmt->execute();
            $usuario=$stmt->fetch(PDO::FETCH_ASSOC);
            
                if (password_verify($password, $usuario["password"])) {
                        return false;
                    }
                
            
            return true;
        }
         

    }



?>