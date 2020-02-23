<?php

class Provincia
{
    private $id;
    private $nombre;
    private $idPais;


    public function __construct($id, $nombre,$idPais){
        $this->id= $id;
        $this->nombre = $nombre;
        $this->idPais = $idPais;
    }

    public function listarProvincia()
    {
        $link = Conexion::conectar();
        $sql= "SELECT id_provincia, nombre_provincia, id_pais FROM provincia";
        
        $stmt = $link->prepare($sql);
        $stmt->execute();

        $provincias = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $provinciasObject= [];

        foreach ($provincias as $provincia) {
          
            
            $provinciasFinal = new Provincia($provincia["id_provincia"], $provincia["nombre_provincia"], $provincia["id_pais"]);
            $provinciasObject[] = $provinciasFinal;
        }
        return $provinciasObject;

    }
    public function provinciaPorId($id)
    {
        $link = Conexion::conectar();
        $sql= "SELECT id_provincia, nombre_provincia, id_pais FROM provincia WHERE id_provincia = :id";      
        $stmt = $link->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);  
        $stmt->execute();

        $provincia = $stmt->fetch(PDO::FETCH_ASSOC);
 
            $provincia = new Provincia($provincia["id_provincia"], $provincia["nombre_provincia"], $provincia["id_pais"]);
            
        
        return $provincia;

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
      /**
     * Get the value of id
     */ 
    public function getIdPais()
    {
            return $this->idPais;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setIdPais($idPais)
    {
            $this->idPais = $idPais;

            return $this;
    }
}

  

?>