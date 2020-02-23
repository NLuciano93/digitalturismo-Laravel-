<?php

    class UsuarioComun extends Usuario
    {
        private $id;
        private $facebook;
        private $twitter;
        private $instagram;
        private $imagenPerfil;
        private $favoritos = [];
        private $destinosComprados = [];





        public function __construct($array){
                $this->setId($array["id_usuario"]);
                $this->setNombre($array["nombre_usuario"]);
                $this->setEmail($array["email"]);
                $this->setFacebook($array["facebook"]);
                $this->setTwitter($array["twitter"]);
                $this->setInstagram($array["instagram"]);
                $this->setImagenPerfil($array["avatar"]);
                

        }


        public function listarUsuarios(){
                $link = Conexion::conectar();
                $sql = "SELECT * FROM usuarios";

                try {
                        $stmt = $link->prepare($sql);
                        $stmt->execute();

                } catch (\Throwable $th) {
                        return "No se pudo obtener los destinos intente nuevamente";
                }

                $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $usuariosObject= [];

                foreach ($usuarios as $usuario) {
                        $finalUsuario= new UsuarioComun($usuario);
                        $usuariosObject[]= $finalUsuario;
                }
                return $usuariosObject;
        }


        /**
         * Get the value of destinosComprados
         */ 
        public function getDestinosComprados()
        {
                return $this->destinosComprados;
        }

        /**
         * Set the value of destinosComprados
         *
         * @return  self
         */ 
        public function setDestinosComprados($destinosComprados)
        {
                $this->destinosComprados = $destinosComprados;

                return $this;
        }

        /**
         * Get the value of favoritos
         */ 
        public function getFavoritos()
        {
                return $this->favoritos;
        }

        /**
         * Set the value of favoritos
         *
         * @return  self
         */ 
        public function setFavoritos($favoritos)
        {
                $this->favoritos = $favoritos;

                return $this;
        }

        /**
         * Get the value of imagenPerfil
         */ 
        public function getImagenPerfil()
        {
                return $this->imagenPerfil;
        }

        /**
         * Set the value of imagenPerfil
         *
         * @return  self
         */ 
        public function setImagenPerfil($imagenPerfil)
        {
                $this->imagenPerfil = $imagenPerfil;

                return $this;
        }

        /**
         * Get the value of instagram
         */ 
        public function getInstagram()
        {
                return $this->instagram;
        }

        /**
         * Set the value of instagram
         *
         * @return  self
         */ 
        public function setInstagram($instagram)
        {
                $this->instagram = $instagram;

                return $this;
        }

        /**
         * Get the value of twitter
         */ 
        public function getTwitter()
        {
                return $this->twitter;
        }

        /**
         * Set the value of twitter
         *
         * @return  self
         */ 
        public function setTwitter($twitter)
        {
                $this->twitter = $twitter;

                return $this;
        }

        /**
         * Get the value of facebook
         */ 
        public function getFacebook()
        {
                return $this->facebook;
        }

        /**
         * Set the value of facebook
         *
         * @return  self
         */ 
        public function setFacebook($facebook)
        {
                $this->facebook = $facebook;

                return $this;
        }

      
        
        public function agregarUsuario($array, $archivo){
            try {
                $nombreImagen = UsuarioComun::guardarAvatar($archivo);
                $pass = password_hash($array["password"], PASSWORD_DEFAULT);
                $nombre= trim($array["nombre"]);
                $link = Conexion::conectar();

                $sql = "INSERT INTO usuarios VALUES(null, :nombre, :email, :pass, :facebook, :instagram, :twitter, :avatar, now())";
                
                $stmt= $link->prepare($sql);
                $stmt->bindValue(':nombre', $nombre, PDO::PARAM_STR);
                $stmt->bindValue(':email', $array["email"], PDO::PARAM_STR);
                $stmt->bindValue(':pass', $pass);
                $stmt->bindValue(':facebook', $array["facebook"], PDO::PARAM_STR);
                $stmt->bindValue(':instagram', $array["instagram"], PDO::PARAM_STR);
                $stmt->bindValue(':twitter', $array["twitter"], PDO::PARAM_STR);
                $stmt->bindValue(':avatar', $nombreImagen, PDO::PARAM_STR);
                $stmt->execute();
                header("Location: login.php?registro=ok");
            } catch (\Throwable $th) {
                echo "<h2>No se pudo registrar al usuario, intentelo nuevamente<br></h2>".$th->getMessage();
                header("refresh:5; url=registro.php");

                
            }

        }

        public function guardarAvatar($archivo){
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

        public function actualizarUsuario($array, $imagen){
                try {
                        
                        $link = Conexion::conectar();
        
                        $sql = "UPDATE usuarios SET nombre_usuario= :nombre, email= :email, facebook= :facebook, instagram= :instagram, twitter= :twitter, avatar= :avatar WHERE id_usuario = :id" ;
                        
                        $stmt= $link->prepare($sql);
                        $stmt->bindValue(':nombre', $array["nombre"], PDO::PARAM_STR);
                        $stmt->bindValue(':email', $array["email"], PDO::PARAM_STR);
                        $stmt->bindValue(':facebook', $array["facebook"], PDO::PARAM_STR);
                        $stmt->bindValue(':instagram', $array["instagram"], PDO::PARAM_STR);
                        $stmt->bindValue(':twitter', $array["twitter"], PDO::PARAM_STR);
                        $stmt->bindValue(':avatar', $imagen, PDO::PARAM_STR);
                        $stmt->bindValue(':id', $_SESSION["id"], PDO::PARAM_INT);

                        $stmt->execute();
                        
                        $this->setNombre($array["nombre_usuario"]);
                        $this->setEmail($array["email"]);
                        $this->setFacebook($array["facebook"]);
                        $this->setTwitter($array["twitter"]);
                        $this->setInstagram($array["instagram"]);
                        $this->setImagenPerfil($imagen);

                        $_SESSION["nombre_usuario"] = $this->getNombre();
                        $_SESSION["email"] = $this->getEmail();
                        $_SESSION["facebook"] = $this->getFacebook();
                        $_SESSION["twitter"] = $this->getTwitter();
                        $_SESSION["instagram"] = $this->getInstagram();
                        $_SESSION["avatar"] = $this->getImagenPerfil();
                        return true;
                        
                    } catch (\Throwable $th) {
                        return false;
                        
                        
                    }
        }
        public function cambiarPassword($pass){
                try {
                $pass = password_hash($pass, PASSWORD_DEFAULT);
                $link = Conexion::conectar();
                $sql = "UPDATE usuarios SET password = :pass WHERE id_usuario= :id";
                $stmt = $link->prepare($sql);
                $stmt->bindValue(':pass', $pass, PDO::PARAM_STR);
                $stmt->bindValue(':id', $_SESSION["id_usuario"], PDO::PARAM_INT);
                $stmt->execute();
                } catch (\Throwable $th) {
                        return false;
                }
                return true;
        }

        

        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }
    }

?>