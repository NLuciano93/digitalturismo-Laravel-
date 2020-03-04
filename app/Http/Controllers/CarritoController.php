<?php

namespace App\Http\Controllers;

use App\Carrito;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $itemsCarrito = Carrito::paginate(8);

        $vac = compact('itemsCarrito');
        return view('/adminCarrito', $vac);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/carritoAlta');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reglas = [
            "idDestino" => "required",
            "idUsuario" => "required",
            "cantidad" => "required",
            "costoXunidad" => "required",
        ];
        
        $mensajes =[
            "string" => "El campo :attribute debe ser un texto",
            "min" => "El campo :attribute tiene un mínimo de :min",
            "max" => "El campo :attribute tiene un máximos de :max",
            "integer" => "El campo :attribute debe ser un número",
            "required" => "El campo :attribute es obligatorio",
            "image"=> "El campo no es un imagen",
            "mimes" => "El archivo tiene que ser jpeg, jpg, png, svg, bmp o webp" 
        ];
        
        $this->validate($request, $reglas, $mensajes);
             
        $itemCarritoNvo = new Carrito();
       
        $itemCarritoNvo->id_usuario = $request["idUsuario"];
        $itemCarritoNvo->id_destino = $request["idDestino"];
        $itemCarritoNvo->cantidad = $request["cantidad"];
        $itemCarritoNvo->costoXunidad = $request["costoXunidad"];

        $itemCarritoNvo->save();
        return redirect("/adminCarrito")->with('mensaje', 'Carrito'. $itemCarritoNvo->id_destino. ' agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
