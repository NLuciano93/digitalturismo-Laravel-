<?php

    class Destino
    {
        private $id;
        private $nombre;
        private $precio;
        private $promocion;
        private $avatar;
        private $provincia;


        public function __construct($id, $nombre, $precio, $promocion, $avatar, $provincia)
        {
            $this->id = $id;
            $this->nombre = $nombre;
            $this->precio = $precio;
            $this->promocion = $promocion;
            $this->avatar = $avatar;
            $this->provincia = $provincia;
        }

        public function obtenerDestinoPorId($id){
                $link = Conexion::conectar();
                $sql = "SELECT id_destino, nombre_destino, precio, promocion, avatar_destino, id_provincia FROM destinos WHERE id_destino = :id";
                $stmt = $link->prepare($sql);
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                $stmt->execute();
                $destino = $stmt->fetch(PDO::FETCH_ASSOC);
                $destino = new Destino($destino["id_destino"],$destino["nombre_destino"], $destino["precio"], $destino["promocion"], $destino["avatar_destino"], $destino["id_provincia"]);

                return $destino;
        }

        public function buscarDestinos($busqueda, $prov = 0)
        {
            $link = Conexion::conectar();
            
            if($prov){
                $sql= "SELECT id_destino, nombre_destino, precio, promocion, avatar_destino, id_provincia FROM destinos WHERE nombre_destino LIKE :nombre AND id_provincia = :prov";
                $stmt = $link->prepare($sql);
                $stmt->bindValue(':nombre', "%".$busqueda."%", PDO::PARAM_STR);
                $stmt->bindValue(':prov', $prov, PDO::PARAM_INT);

            }else{
                $sql= "SELECT id_destino, nombre_destino, precio, promocion, avatar_destino, id_provincia FROM destinos WHERE nombre_destino LIKE :nombre ";
                $stmt = $link->prepare($sql);
                $stmt->bindValue(':nombre', "%".$busqueda."%", PDO::PARAM_STR);

            }

            $stmt->execute();

            $destinos= $stmt->fetchAll(PDO::FETCH_ASSOC);

            $destinosObject = [];
            foreach ($destinos as $destino) {

                $finalDestino = new Destino($destino["id_destino"],$destino["nombre_destino"], $destino["precio"], $destino["promocion"], $destino["avatar_destino"], $destino["id_provincia"]);
                
                $destinosObject[] = $finalDestino;
            }
            return $destinosObject;
        }




        public function listarDestinos(){
            $link = Conexion::conectar();
            $sql = "SELECT id_destino, nombre_destino, precio, promocion, avatar_destino, nombre_provincia FROM destinos INNER JOIN provincia ON destinos.id_provincia = provincia.id_provincia";
            
            try {
            $stmt= $link->prepare($sql);
            $stmt->execute();

            } catch (\Throwable $th) {
              return "No se pudo obetener los destinos intente nuevamente";
            } 
            $destinos= $stmt->fetchAll(PDO::FETCH_ASSOC);

            $destinosObject = [];
            foreach ($destinos as $destino) {

                $finalDestino = new Destino($destino["id_destino"],$destino["nombre_destino"], $destino["precio"], $destino["promocion"], $destino["avatar_destino"], $destino["nombre_provincia"]);
                
                $destinosObject[] = $finalDestino;
            }
            return $destinosObject;
        }

        public function listarDestinosConProvincia(){
                $link = Conexion::conectar();
                $sql = "SELECT id_destino, nombre_destino, precio, promocion, avatar_destino, nombre_provincia FROM destinos INNER JOIN provincias ON ";
                
                try {
                $stmt= $link->prepare($sql);
                $stmt->execute();
    
                } catch (\Throwable $th) {
                  return "No se pudo obetener los destinos intente nuevamente";
                } 
                $destinos= $stmt->fetchAll(PDO::FETCH_ASSOC);
    
                $destinosObject = [];
                foreach ($destinos as $destino) {
    
                    $finalDestino = new Destino($destino["id_destino"],$destino["nombre_destino"], $destino["precio"], $destino["promocion"], $destino["avatar_destino"]);
                    
                    $destinosObject[] = $finalDestino;
                }
                return $destinosObject;
            }


            public function agregarDestino($array, $archivo){
                try {
                    $nombre = strtoupper($array["nombre"]);    
                    $precio= (int)$array["precio"];
                    $promocion = (int)$array["promocion"];    
                    $nombreImagen = Destino::guardarAvatar($archivo);
                   
                    $link = Conexion::conectar();
    
                    $sql = "INSERT INTO destinos VALUES(null, :nombre, :precio, :promocion, :avatar, :provincia)";
                    
                    $stmt= $link->prepare($sql);                   
                    $stmt->bindValue(':nombre', $nombre, PDO::PARAM_STR);                   
                    $stmt->bindValue(':precio', $precio, PDO::PARAM_INT);
                    $stmt->bindValue(':promocion', $promocion, PDO::PARAM_INT); 
                    $stmt->bindValue(':avatar', $nombreImagen, PDO::PARAM_STR);
                    $stmt->bindValue(':provincia', $array["provincia"], PDO::PARAM_INT);
                    $stmt->execute();
                    header("Location: destinoAlta.php?registro=ok");
                } catch (\Throwable $th) {
                    echo "<h2>No se pudo registrar al destino, intentelo nuevamente<br></h2>".$th->getMessage();
                    header("refresh:5; url=destinoAlta.php");
    
                    
                }
    
            }
            public function guardarAvatar($archivo){
                $nombreImagen = "userImage.png";
                if ($archivo["imagenPerfil"]["error"] != UPLOAD_ERR_NO_FILE) {
                    $ext = strtolower(pathinfo($archivo["imagenPerfil"]["name"], PATHINFO_EXTENSION));
                    $directorioTemporal = $archivo['imagenPerfil']['tmp_name'];
                    $nombreImagen = uniqid('img_') . '.' . $ext;
                    $carpetaFinal= dirname(__DIR__);
                    $carpetaFinal = $carpetaFinal . '/images/Destinos/';
                    $carpetaFinal = $carpetaFinal . $nombreImagen;
                    move_uploaded_file($directorioTemporal, $carpetaFinal);
                }
                return $nombreImagen;
            }

            public function borrarDestino($id){
                    try {
                        $link = Conexion::conectar();
                        $sql = "DELETE FROM destinos WHERE id_destino=:id";
                        $stmt= $link->prepare($sql);
                        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                        $stmt->execute();
                        return "ok";
                    } catch (\Throwable $th) {
                          return "nok";
                    }
                    
                

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

        /**
         * Get the value of nombre
         */ 
        public function getNombre()
        {
                return $this->nombre;
        }

        /**
         * Set the value of nombre
         *
         * @return  self
         */ 
        public function setNombre($nombre)
        {
                $this->nombre = $nombre;

                return $this;
        }

        /**
         * Get the value of promocion
         */ 
        public function getPromocion()
        {
                return $this->promocion;
        }

        /**
         * Set the value of promocion
         *
         * @return  self
         */ 
        public function setPromocion($promocion)
        {
                $this->promocion = $promocion;

                return $this;
        }

        /**
         * Get the value of avatar
         */ 
        public function getAvatar()
        {
                return $this->avatar;
        }

        /**
         * Set the value of avatar
         *
         * @return  self
         */ 
        public function setAvatar($avatar)
        {
                $this->avatar = $avatar;

                return $this;
        }

        /**
         * Get the value of precio
         */ 
        public function getPrecio()
        {
                return $this->precio;
        }

        /**
         * Set the value of precio
         *
         * @return  self
         */ 
        public function setPrecio($precio)
        {
                $this->precio = $precio;

                return $this;
        }

        /**
         * Get the value of provincia
         */ 
        public function getProvincia()
        {
                return $this->provincia;
        }

        /**
         * Set the value of provincia
         *
         * @return  self
         */ 
        public function setProvincia($provincia)
        {
                $this->provincia = $provincia;

                return $this;
        }
    }

?>