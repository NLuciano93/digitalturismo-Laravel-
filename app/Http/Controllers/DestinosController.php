<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Destino;
use App\Provincia;
use App\Comentario;
use App\Carrito;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Session;


class DestinosController extends Controller
{

 /*    public function busquedaDestinoAdmin(Request $request)
    {
       $provincias= Provincia::all();
        if($request->input('provincia') && $request->input('busqueda') === null){
            $destinos = Destino::where('id_provincia', '=', $request->input('provincia'))->paginate(8);
        }else if($request->input('provincia') && $request->input('busqueda')){
            
            $destinos = Destino::where('nombre_destino', 'like', '%'.$request->input('busqueda').'%')
                        ->orWhere('id_provincia', '=', $request->input('provincia'))
                        ->paginate(8);
        }else{
            $destinos= Destino::where('nombre_destino', 'like', '%'. $request->input('busqueda'). '%')
                        ->paginate(8);
        }
        
        $vac = compact('destinos', 'provincias');
        return view('/adminDestinos', $vac);
    } */
    public function inicio()
    {
        $destinos = Destino::where("promocion", 0)->inRandomOrder()->take(3)->get();
        $destinosPromo = Destino::where("promocion", ">", 0)->inRandomOrder()->take(3)->get();
        $destinosDestacados = DB::table('destinos')
                                ->join('comentarios', 'destinos.id_destino','=', 'comentarios.id_destino')
                                ->select('destinos.id_destino','nombre_destino', 'precio', 'promocion', 'avatar_destino', DB::raw('AVG(puntuacion) as promedio'), DB::raw('COUNT(comentario) as comentarios'))
                                ->groupBy('destinos.id_destino','nombre_destino', 'precio', 'promocion', 'avatar_destino')
                                ->orderBy('promedio', 'DESC')
                                ->take(3)                               
                                ->get();
        
        /* $destinosDestacados = Destino::with('comentarios');
        $destinosDestacados =$destinosDestacados->select('destinos.*')
                                ->selectSub('AVG(puntuacion)','promedio')
                                ->groupBy('id_destino')
                                ->get(); */
        
        
        
        /* with(['comentarios' => function($query){
            $query->orderBy('puntuacion', '>', 2);
        }])->get(); */
        $vac = compact('destinos','destinosPromo', 'destinosDestacados');
        return view('/index/index', $vac);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->get('provincia') && $request->get('busqueda') === null){
            $destinos = Destino::where('id_provincia', '=', $request->get('provincia'))->paginate(8);
        }else if($request->get('provincia') && $request->get('busqueda')){
            
            $destinos = Destino::where('nombre_destino', 'like', '%'.$request->get('busqueda').'%')
                        ->orWhere('id_provincia', '=', $request->get('provincia'))
                        ->paginate(8);
        }else{
            $destinos= Destino::where('nombre_destino', 'like', '%'. $request->get('busqueda'). '%')
                        ->paginate(8);
        }
        $provincias = Provincia::all();
        if($request->get('provincia') == -1){
            dd("HOLA");
            $destinos= Destino::paginate(8);
            $vac = compact('destinos', 'provincias');
            return view('/adminDestinos', $vac);
        }
        $vac = compact('destinos', 'provincias');
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
            "detalle"=> "required|string|min:10",
            "descripcion"=> "required|string|min:10",
            "precio" => "required|integer",
            "promocion" => "required|integer|min:0|max:100",
            "provincia" => "required",
            "imagenPerfil" => "required|image|mimes:jpeg,jpg,png,svg,bmp,webp",
            

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
        $destinoNuevo->detalle = $request["detalle"];
        $destinoNuevo->descripcion = $request["descripcion"];
        $destinoNuevo->precio = $request["precio"];
        $destinoNuevo->promocion = $request["promocion"];
        $destinoNuevo->avatar_destino = $imageName;
        $destinoNuevo->id_provincia = (int)$request["provincia"];
       

        $destinoNuevo->save();
        Alert::success('Destino Agregado' , $destinoNuevo->nombre_destino);
        return redirect("/adminDestinos");
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
            "precio" => "required|numeric",
            "promocion" => "required|integer|min:0|max:100",
            "provincia" => "required",
            "descripcion" => "required|string|min:10",
            "detalle"=>"required|string|min:10"
            

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
        $Destino->detalle = $request["detalle"];
        $Destino->descripcion= $request["descripcion"];
        $Destino->precio = $request["precio"];
        $Destino->promocion = $request["promocion"];
        
        if ($request->file('imagenPerfil')) {
            $imageName = time(). $request->imagenPerfil->getClientOriginalName();
            $request->imagenPerfil->move(public_path('images/destinos'), $imageName);
           $Destino->avatar_destino = $imageName; 
        }
        
        $Destino->id_provincia = (int)$request["provincia"];
        $Destino->save();
        Alert::success('Destino Actualizado' , $Destino->nombre_destino);
        return redirect('/adminDestinos');
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
    public function verComentarios($id)
    {
        $Destino = Destino::find($id);
        $cantidad = $Destino->comentarios->count();
        $promedio = round($Destino->comentarios()->avg('puntuacion'), 2);

        $vac= compact('Destino', 'cantidad', 'promedio');
        return view("/verComentarioDestino", $vac);
    }
    
   /*  public function verTodosLosDestinos(){
        $Destinos = Destino::paginate(12);
        $vac = compact('Destinos');
        return view('/verTodosLosDestinos', $vac);
    } */
    public function verComentarioDestino($id)
    {
        $destino = Destino::find($id);
        $comentarios = Comentario::find($id)->get();
        
        $vac= compact('comentarios');
        return view("/verComentarioDestino", $vac);
    }
    
    /** metodo para pagina DESTINOS - listado general y carrusel */
    public function pagDestinos(Request $request)
    {
        $Destinos = Destino::paginate(8);
        $provincias = Provincia::all();
        if($request->input('provincia') && $request->input('busqueda') === null){
            $Destinos = Destino::where('id_provincia', $request->input('provincia'))->paginate(8);
        }else if($request->input('provincia') && $request->input('busqueda')){
            
            $Destinos = Destino::where('nombre_destino', 'like', '%'.$request->input('busqueda').'%')
                        ->where('id_provincia', $request->input('provincia'))
                        ->paginate(8);
        }else{
            $Destinos= Destino::where('nombre_destino', 'like', '%'. $request->input('busqueda'). '%')
                        ->paginate(8);
        }
       
        $destinosRandom = Destino::where('promocion', '>', 0)->inRandomOrder()->take(4)->get();
        
        // Cant Comentarios x Destino y Promedio Puntaje - listado general 
       /*  foreach ($destinos as $destino) {
            $comments = Destino::find($destino->id_destino)->getComentariosXdestino;
            
            $puntaje[] = round($comments->avg('puntuacion'), 1, PHP_ROUND_HALF_DOWN);
                     
            $cantComments [] = $comments->count();
        } */

        // Promedio destinos Random en Carrusel
    
        foreach ($destinosRandom as $destino) {
            $comments = Destino::find($destino->id_destino)->getComentariosXdestino;
            
            if (empty($comments)) 
                {
                    $puntajeRandom[]=0;
                }
                else 
                {
                    $puntajeRandom[] = round($comments->avg('puntuacion'), 1, PHP_ROUND_HALF_DOWN);
                }
          }

        $vac = compact('Destinos', 'destinosRandom',
                        'puntajeRandom', 'provincias');

        return view('/destinos', $vac);
    }
    
    public function detalleDestino($id)
    {
        $Destino = Destino::find($id);
        $cantidad = $Destino->comentarios->count();
        $promedio = round($Destino->comentarios()->avg('puntuacion'), 2);

        $vac= compact('Destino', 'cantidad', 'promedio');
        return view('/detalleDestino', $vac);
    }
    public function busDestinosUser(Request $request){

        $provincias= Provincia::all();
        if($request->input('provincia') && $request->input('busqueda') === null){
            $Destinos = Destino::where('id_provincia', $request->input('provincia'))->paginate(8);
        }else if($request->input('provincia') && $request->input('busqueda')){
            
            $Destinos = Destino::where('nombre_destino', 'like', '%'.$request->input('busqueda').'%')
                        ->where('id_provincia', $request->input('provincia'))
                        ->paginate(8);
        }else{
            $Destinos= Destino::where('nombre_destino', 'like', '%'. $request->input('busqueda'). '%')
                        ->paginate(8);
        }
        $destinosRandom = Destino::where("promocion", 0)->inRandomOrder()->take(4)->get();
        foreach ($destinosRandom as $destino) {
            $comments = Destino::find($destino->id_destino)->getComentariosXdestino;
            
            $puntajeRandom[] = round($comments->avg('puntuacion'), 1, PHP_ROUND_HALF_DOWN);
          }

        $vac = compact('Destinos', 'provincias', 'puntajeRandom', 'destinosRandom');
        return view('/destinos', $vac);
    }

    public function agregarCarrito(Request $request, $id)
    {
       
        $validarCant= $request->input('cantidadPasajes');
        if ($validarCant < 1 || $validarCant >10) {
            Alert::warning('' , 'Falla en la cantidad asignada');
            return redirect()->back();
        }
        $Destino = Destino::find($id);
        $cantidadPasajes = $request->input('cantidadPasajes');
        
        /* compruebo si en la sesion ya existe un carrito y se la paso a la variable */
        /* Session::flush();*/
       /*  dd(Session::get('carrito'));  */
        $carritoViejo = Session::has('carrito') ? Session::get('carrito') : null;
        /*Le paso al constructor el viejo carrito */
        $carrito = new Carrito($carritoViejo);
        /* aca le mando el destino comprado al metodo agregar */
        $carrito->agregar($Destino, $Destino->id_destino, $cantidadPasajes);
        /* dd(Session::get('carrito')); */

        $request->session()->put('carrito', $carrito);
        Alert::success('Destino agregado al carrito🛒');
        return redirect()->back();
    }
    
}

