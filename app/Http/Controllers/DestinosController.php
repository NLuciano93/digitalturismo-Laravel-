<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Destino;
use App\Provincia;

class DestinosController extends Controller
{


    public function inicio()
    {
        $destinos = Destino::where("promocion", 0)->inRandomOrder()->take(3)->get();
        $destinosPromo = Destino::where("promocion", ">", 0)->inRandomOrder()->take(3)->get();
        $vac = compact('destinos','destinosPromo');
        return view('inicio', $vac);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $destinos= Destino::paginate(8);

        $vac = compact('destinos');
        return view('/adminDestinos', $vac);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provincias = Provincia::all();

        $vac = compact('provincias');

        return view('/destinoAlta', $vac);
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
            "nombre" => "required|string|min:3",
            "precio" => "required|integer",
            "promocion" => "required|integer|min:0|max:100",
            "provincia" => "required",
            "imagenPerfil" => "required|image|mimes:jpeg,jpg,png,svg,bmp,webp"

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
        
        //Almacenamiento en STORAGE
       // $ruta = $request->file("imagenPerfil")->store("public");
       // $nombreArchivo = basename($ruta);
       $imageName = time(). $request->imagenPerfil->getClientOriginalName();
       $request->imagenPerfil->move(public_path('images/destinos'), $imageName);
        

        
        $destinoNuevo = new Destino();
       
        $destinoNuevo->nombre_destino = strtoupper($request["nombre"]);
        $destinoNuevo->precio = $request["precio"];
        $destinoNuevo->promocion = $request["promocion"];
        $destinoNuevo->avatar_destino = $imageName;
        $destinoNuevo->id_provincia = (int)$request["provincia"];
       

        $destinoNuevo->save();
        return redirect("/adminDestinos")->with('mensaje', 'Destino '. $destinoNuevo->nombre_destino. ' agregado con éxito');
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
        
        $destino = Destino::find($id);
        $provincia= Provincia::find($id);
        $provincias = Provincia::all();
        $vac= compact('destino', 'provincia', 'provincias');

        return view('/destinoMod', $vac);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $reglas = [
            "nombre" => "required|string|min:3",
            "precio" => "required|integer",
            "promocion" => "required|integer|min:0|max:100",
            "provincia" => "required",
            

        ];
        $mensajes =[
            "string" => "El campo :attribute debe ser un texto",
            "min" => "El campo :attribute tiene un mínimo de :min",
            "max" => "El campo :attribute tiene un máximos de :max",
            "integer" => "El campo :attribute debe ser un número",
            "required" => "El campo :attribute es obligatorio",
             
        ];
        
        $this->validate($request, $reglas, $mensajes);

        $Destino = Destino::find($request->input('id'));
        $Destino->nombre_destino = $request["nombre"];
        $Destino->precio = $request["precio"];
        $Destino->promocion = $request["promocion"];
        if ($request->file('imagenPerfil')) {
            $imageName = time(). $request->imagenPerfil->getClientOriginalName();
            $request->imagenPerfil->move(public_path('images/destinos'), $imageName);
           $Destino->avatar_destino = $imageName; 
        }
        
        $Destino->id_provincia = (int)$request["provincia"];
        $Destino->save();
        return redirect('/adminDestinos')->with('mensaje', 'Destino '. $Destino->nombre_destino. ' fue modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Destino = Destino::find($id);

        $Destino->delete();
        return redirect("/adminDestinos")->with('mensaje', 'Destino '. $Destino->nombre_destino. ' borrado exitosamente');
    }
    
}
