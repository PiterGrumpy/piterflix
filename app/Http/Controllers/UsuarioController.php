<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\RegistroRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Usuario;


class UsuarioController extends Controller{

    public function setUser($usuario = null, $isAdmin = null){
        if(!is_null($usuario)) {
            request()->session()->put('current_user', intval($usuario));
            if(!is_null($isAdmin)) {
                $cuenta = Auth::user();
                $usuarios = $cuenta->usuarios;
                $current_user_id = session('current_user');
                

                $selected_user = $usuarios->first(function ($user) use ($current_user_id) {
                    return $user->id == $current_user_id;
                });
                if ($selected_user) {
                    request()->session()->put('isAdmin', $selected_user->isAdmin);
                }
                
            }
        }
        return view('profile.perfil');
    }

    public function eliminar($id = null){
        if(!is_null($id)) {
            $usuario = Usuario::find($id);
        }
        if ($usuario) {
            // Si el usuario existe, lo eliminamos de la base de datos
            $usuario->delete();
        }
        return view('profile.cuenta');
    }
    
    public function editar(Request $request){
        $id = request()->session()->get('current_user');
        $usuario = Usuario::find($id);
        if(!is_null($usuario)) {
            if($request->nuevoNombre != "") {
                $usuario->nombre = $request->nuevoNombre;
            }
            if($request->nuevaFecha != "") {
                $fecha = $request->nuevaFecha;
                $fecha_array = explode('-', $fecha);
                $usuario->anoNacimiento = $fecha_array[0];
            }
            if($request->nuevoAvatar != "") {
                $usuario->avatar = $request->nuevoAvatar;
            }
            $usuario->save();
        }
        return view('profile.perfil');
    }

    public function crear(Request $request){
        $cuenta = Auth::user();
        $usuarios_actuales = $cuenta->usuarios;
        if(count($usuarios_actuales) >= 4){
            return redirect()->back()->with('error', '¡Una cuenta no puede tener más de 4 usuarios!');
        }
        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'avatar' => 'required',
            'fechaNacimiento' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $fecha = $request->fechaNacimiento;
        $fecha_array = explode('-', $fecha);
        $insercion = [];
        $insercion["id_cuenta"] = $cuenta->id;
        $insercion["nombre"] = $request->nombre;
        $insercion["avatar"] = $request->avatar;
        $insercion["isAdmin"] = false;
        $insercion["anoNacimiento"] = $fecha_array[0];
        $usuario = Usuario::create($insercion);

        if ($usuario && $usuario->id > 0) {
            // Inserción correcta, redireccionar a la ruta cuenta con un mensaje de éxito
            return redirect()->route('cuenta')->with('success', 'El usuario ha sido creado con éxito.');
        } else {
            // Error en la inserción, regresar a la página anterior con un mensaje de error
            return back()->withInput()->with('error', 'Ha ocurrido un error al crear el usuario.');
        }
    }

    /* 
    *  Función que crea el primer usuario de una nueva cuenta y se lo pasa a la vista
    *  que confirmará el pago.
    */
    public function crearCuentaSinConfirmar(RegistroRequest $request){
      $nuevo_usuario = [
        "nombre" => $request->user_name,
        "anoNacimiento" => $request->user_birth,
        "avatar" => "https://via.placeholder.com/200x200.png/004499?text=cats+earum"
      ];
      $datos_cuenta = [
        "password" => $request->password,
        "email" => $request->email,
        "plan" => $request->plan,
      ];
      $request->session()->put('nuevo_usuario', $nuevo_usuario);
      $request->session()->put('datos_cuenta', $datos_cuenta);
      return view('auth.pago');
    }

    public function comprobarUsuarioEnSesion() {
        if(session('nuevo_usuario') && session('datos_cuenta')){
            return view('auth.pago');
        } else {
            return redirect('/registro');
        }
    }
}