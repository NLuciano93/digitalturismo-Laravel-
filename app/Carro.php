<?php
namespace App;

class Carro
{
    private $renglon = [];
    private $items = ['cant'=>0, 'precio'=>0, 'nombreDestino'=>""];
    
    /**
     * Get the value of items
     */ 
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Set the value of items
     *
     * @return  self
     */ 
    public function setItems($items)
    {
        $this->items = $items;

        return $this;
    }

    /**
     * Get the value of renglon
     */ 
    public function getRenglon()
    {
        return $this->renglon;
    }

    /**
     * Set the value of renglon
     *
     * @return  self
     */ 
    public function setRenglon($renglon)
    {
        $this->renglon = $renglon;

        return $this;
    }
}
?>