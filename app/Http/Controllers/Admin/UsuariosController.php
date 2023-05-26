<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use App\Models\Cuenta;
use App\Models\Usuario;

class UsuariosController extends Controller
{
    public function index(){
        $usuarios = Usuario::all();
        return view('admin.usuarios', compact('usuarios'));
    }

    public function edit(Request $request){
        $validator = Validator::make($request->all(), [
            'id_usuario' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $id = intval($request->id_usuario);
        $usuario = $usuarios = Usuario::find($id);
        return view('admin.editarUsuario', compact('usuario'));
    }

    public function delete(Request $request){
        $validator = Validator::make($request->all(), [
            'id_usuario' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $id = intval($request->id_usuario);
        $usuario =  Usuario::find($id);
        if($usuario->isAdmin == true){
            return redirect()->route('dashboard')->with('error', 'No se pueden eliminar usuarios administradores');
        }
        $usuario->delete();
        return redirect()->route('dashboard')->with('success', 'El usuario seleccionado se ha eliminado satisfactoriamente!');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'id_cuenta' => 'required',
            'nombre' => 'required',
            'avatar' => 'required|string|max:255',
            'anoNacimiento' => 'required',
            'isAdmin' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $id = intval($request->id);
        $usuario =  Usuario::find($id);
        $usuario->nombre = $request->nombre;
        $usuario->avatar = $request->avatar;
        $usuario->anoNacimiento = $request->anoNacimiento;
        $usuario->isAdmin = $request->isAdmin;

        $usuario->save();
        return redirect()->route('dashboard')->with('success', 'El usuario seleccionado se ha actualizado satisfactoriamente!');

    }
}
