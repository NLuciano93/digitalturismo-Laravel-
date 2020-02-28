<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsuariosController extends Controller
{

    public function busquedaUsuarioAdmin(Request $request)
    {
        $usuarios = User::where('name', 'like', '%'. $request->input('busqueda') .'%')
                          ->orWhere('email', 'like', '%'. $request->input('busqueda') .'%')
                          ->paginate(8);
        $vac = compact('usuarios');
        return view('/adminUsuarios', $vac);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::paginate(8);

        $vac= compact('usuarios');
        return view('adminUsuarios', $vac);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $usuario = User::find($id);

        $usuario->delete();

        return redirect("/adminUsuarios");
    }

    public function agregarFav(Request $request){
        
        $usuario = User::find($request->input('usuario'));
        $usuario->favoritos()->attach($request["agregarFav"]);
        return redirect('/')->with('mensaje', 'Destino agregado a Favoritos');
    }
    public function quitarFav(Request $request){
        
        $usuario = User::find($request->input('usuario'));
        $usuario->favoritos()->detach($request["quitarFav"]);
        return redirect('/')->with('mensaje', 'Destino quitado de Favoritos');
    }
    public function agregarComentario(Request $request)
    {
        
        $usuario = User::find($request->input('usuario'));
        $usuario->comentarios()->attach($request["agregarComent"], 
                                        [
                                            'puntuacion' => $request->input('calificacion'),
                                            'comentario' => $request["comentario"]
                                        ]);
        return redirect('/comentario')->with('mensaje', 'Comentario agregado exitosamente');
    }
    public function quitarComentario(Request $request)
    {

    }
    
}
