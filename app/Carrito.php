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
            $this->items = $carritoViejo->items;
            $this->totalCant = $carritoViejo->totalCant;
            $this->totalPrecio = $carritoViejo->totalPrecio;
            
        }

    }
    public function agregar($item, $id, $cantidadPasajes)
    {
       

        
        $itemGuardado = ['cantidad'=>$cantidadPasajes, 'precio' => $item->precio, 'item' =>$item];
        /**Lo pongo aca para que no haya conflictos al sumar el total porque sino suma el total del precio de cada item y no los que agrego en un request */
        if($item->promocion){
            $itemGuardado['precio']= $item->precio * $itemGuardado['cantidad'];
            $itemGuardado['precioPromo'] = ($item->precio -($item->precio* ($item->promocion/100)) ) * $itemGuardado['cantidad'];
            $this->totalPrecio += $itemGuardado['precioPromo'];
        }else{
            $itemGuardado['precio']= $item->precio * $itemGuardado['cantidad'];
            $this->totalPrecio += $itemGuardado['precio'];
        }
        
        /* Compruebo si el item que agrego ya está en el atributo item, primero comprobando que exitan items en la clase*/
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                        
                 $itemGuardado = $this->items[$id];
                 
                 $itemGuardado['cantidad']= $this->items[$id]['cantidad']+ $cantidadPasajes;
                 
                /* $itemGuardado['cantidad']+= $this->items[$id]['cantidad']; */
                }

        }
        /* Aca sumo las cantidades del itemguardado, si ya habia se  suman los nuevos  */
        if ($item->promocion) {
            $itemGuardado['precio']= $item->precio * $itemGuardado['cantidad'];
            $itemGuardado['precioPromo'] = ($item->precio -($item->precio* ($item->promocion/100)) ) * $itemGuardado['cantidad'];
        } else {
             $itemGuardado['precio']= $item->precio * $itemGuardado['cantidad'];
        }
        
       
        
        $this->items[$id]  = $itemGuardado;
        /* Agrego a la cantidad total de compra, la cantidad de producto nuevo*/
        
        $this->totalCant+= $cantidadPasajes;
        /* Agrego al precio total de compra, el precio del producto nuevo ya multiplicado por la cantidad */
       
        
    }
    public function borrarItem($id){
        $cantidad= $this->items[$id]['cantidad'];
        $precio = $this->items[$id]['precio'];
        $this->totalCant-=$cantidad;
        $this->totalPrecio -=$precio;
        
        unset($this->items[$id]);
    }

}