<?php

namespace App\Http\Controllers;
/** PARA USAR LOS REDIRECT */
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UsuariosController extends Controller
{

    /* public function busquedaUsuarioAdmin(Request $request)
    {
        $usuarios = User::where('name', 'like', '%'. $request->get('busqueda') .'%')
                          ->orWhere('email', 'like', '%'. $request->get('busqueda') .'%')
                          ->paginate(8);
        $vac = compact('usuarios');
        return view('/adminUsuarios', $vac);
    } */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $usuarios = User::where('name', 'like', '%'. $request->get('busqueda') .'%')
                ->orWhere('email', 'like', '%'. $request->get('busqueda') .'%')->paginate(8);

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
        /**Necesita el paquete redirect use Illuminate\Support\Facades\Redirect; */
        return Redirect::back()->with('mensaje', 'Destino agregado a Favoritos');
    }
    public function quitarFav(Request $request){
        
        $usuario = User::find($request->input('usuario'));
        $usuario->favoritos()->detach($request["quitarFav"]);
        return Redirect::back()->with('mensaje', 'Destino quitado de Favoritos');
    }


    public function agregarComentario(Request $request)
    {
        
        $usuario = User::find($request->input('usuario'));
        $usuario->comentarios()->attach($request["destino"], 
                                        [
                                            'puntuacion' => $request->input('puntuacion'),
                                            'comentario' => $request["comentario"]
                                        ]);
        return redirect('/detalleDestino/'. $request["destino"])->with('mensaje', 'Comentario agregado exitosamente');
    }
    public function quitarComentario(Request $request)
    {

    }
 
    public function perfilUsuario()
    {
        return view ('/user');
    }
    
    public function actualizarDatos(Request $request){
      
     $usuario = User::find(Auth::user()->id);
     if (isset($request["avatar"])) {
        $imageName = time(). $request["avatar"]->getClientOriginalName();
        $request["avatar"]->move(public_path('images/usuarios'), $imageName);
        $usuario->avatar=$imageName;
    }
     $usuario->name=$request->input('nombre');
     $usuario->email=$request->input('email');
     $usuario->facebook=$request->input('facebook');
     $usuario->twitter=$request->input('twitter');
     $usuario->instagram=$request->input('instagram');

     $usuario->save();
     return redirect ('/user')->with('mensaje', 'Cambios realzados con exito!.');;
    }

    public function actualizarPass(Request $request){
      
        $usuario = User::find(Auth::user()->id);
        $usuario->password=$request->input('password');
        $usuario->repassword=$request->input('repassword');
        return redirect ('/usef');
}
