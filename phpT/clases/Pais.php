<?php

    class Pais
    {
        private $id;
        private $nombre;


        public function __construct($id, $nombre){
            $this->id= $id;
            $this->nombre = $nombre;
        }

        public function listarPais()
        {
            $link = Conexion::conectar();
            $sql= "SELECT id_pais, nombre_pais FROM pais";
            
            $stmt = $link->prepare($sql);
            $stmt->execute();

            $paises = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $paisesObject= [];

            foreach ($paises as $pais) {
                
                $paisesFinal = new Pais($pais["id_pais"], $pais["nombre_pais"]);
                $paisesObject[] = $paisesFinal;
            }
            return $paisesObject;

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