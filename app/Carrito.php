<?php

namespace App;


class Carrito
{
    public $items =null;
    public $totalCant = 0;
    public $totalPrecio= 0;

    public function __construct($carritoViejo)
    {
        if ($carritoViejo) {
            $this->items = $oldCart->items;
            $this->totalCant = $oldCart->totalCant;
            $this->totalPrecio = $oldCart->totalPrecio;
            
        }

    }
    public function agregar($item, $id)
    {
        $itemGuardado = ['cantidad'=>0, 'precio' => $item->precio, 'item' =>$item];
        /* Compruebo si el item que agrego ya está en el atributo item, primero comprobando que exitan items en la clase*/
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $itemGuardado = $this->items[$id];

                }

        }
        /* Aca sumo las cantidades del itemguardado, si ya habia se  suman los nuevos  */
        $itemGuardado['cantidad']+= $itemGuardado['cantidad'];
        $itemGuardado['precio']= $item->precio * $itemGuardado['cantidad'];
        $this->items[$id]  = $itemGuardado;
        /* Agrego a la cantidad total de compra, la cantidad de producto nuevo*/
        $this->totalCant+= $itemGuardado['cantidad'];
        /* Agrego al precio total de compra, el precio del producto nuevo ya multiplicado por la cantidad */
        $this->totalPrecio += $itemGuardado['precio'];
    }

}