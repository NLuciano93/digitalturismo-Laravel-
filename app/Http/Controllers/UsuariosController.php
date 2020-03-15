<?php

namespace App\Http\Controllers;
/** PARA USAR LOS REDIRECT */
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Carrito;
use RealRashid\SweetAlert\Facades\Alert;
use App\Destino;
use Session;


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
        $destino = Destino::find($request["agregarFav"]);
        Alert::success('🌴Destino agregado a Favoritos🌴', $destino->nombre_destino);
        return Redirect::back();
    }
    public function quitarFav(Request $request){
        
        
        $usuario = User::find($request->input('usuario'));
        $usuario->favoritos()->detach($request["quitarFav"]);
        $destino = Destino::find($request["quitarFav"]);
        
        Alert::success('🌴Destino quitado de Favoritos🌴' , $destino->nombre_destino);
        return Redirect::back();
    }
    public function quitarFavUser(Request $request){
        
        $usuario = User::find(Auth::user()->id);
        $usuario->favoritos()->detach($request["quitarFav"]);
        $destino = Destino::find($request["quitarFav"]);
        
        Alert::success('🌴Destino quitado de Favoritos🌴' , $destino->nombre_destino);
        return redirect('/user')->with('favorito', 'eliminado');
    }


    public function agregarComentario(Request $request)
    {
        
        $validator = Validator::make($request->all(),
        [
            'puntuacion'=> 'required|integer|between:1,5|',
            'comentario'=> 'required|string|min:3' 
        ]);
        if($validator->fails()){
            return redirect('/detalleDestino/'. $request["destino"]. '/#comentario')
                            ->withErrors($validator)
                            ->withInput();
        }
        
        $usuario = User::find($request->input('usuario'));
        $usuario->comentarios()->attach($request["destino"], 
                                        [
                                            'puntuacion' => $request->input('puntuacion'),
                                            'comentario' => $request["comentario"]
                                        ]);
        Alert::success("",'🌴Comentario agregado exitosamente🌴');
        return redirect('/detalleDestino/'. $request["destino"])->with('mensaje', 'Comentario agregado exitosamente');
    }
    public function quitarComentario(Request $request)
    {

    }
 
    public function perfilUsuario()
    {
        $usuario = User::find(Auth::user()->id);
        $favoritos = $usuario->favoritos()->paginate(6);
        $vac = compact('favoritos');
        return view('/user/index', $vac);
    }
    
    public function actualizarDatos(Request $request){

        $reglas =[
            "nombre" => 'required|string|min:3',
            'email' => 'required|email',
            'avatar'=> 'mimes:jpeg, jpg, png, svg, bmp, webp'    
        ];

        $this->validate($request, $reglas);
     
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
     Alert::success('🌴Cambios realizados con exito!.🌴');
     return redirect ('/user');
    }

    public function actualizarPass(Request $request){
      
        
        
        $validator = Validator::make($request->all(),[
            'passwordActual' => [ 
                'required',
                function($attribute, $value, $fail){
                $pass = Auth::user()->password;
                
                if (!Hash::check($value, $pass)) {
                  
                    $fail('La contraseña no coincide');
                    }
                },
            ],
            'password' => 'required|confirmed|min:8'
        ]);
        if ($validator->fails()) {
            return redirect('/user/#list-profile')
                ->withErrors($validator)
                ->withInput();  
        }

        $usuario = User::find(Auth::user()->id);

        
        $usuario->password=Hash::make($request->input('password'));

        $usuario->save();
        Alert::success('','🌴Cambios realizados con exito!.🌴');
        return redirect ('/user');
        
    }
    public function carritoCompra(){
        if (!Session::has('carrito')) {
            return view('/carritoCompra', ['productos' => []]);
        }else{
            $viejoCarrito = Session::get('carrito');
            $carrito = new Carrito($viejoCarrito);

            return view('/carritoCompra', ['productos' =>$carrito->items, 'precioTotal' =>$carrito->totalPrecio]);
        }

        
    }
    public function borrarCarrito(){
        Session::forget('carrito');

        return $this->carritoCompra();
    }
}
