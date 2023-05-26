<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use App\Models\Cuenta;
use App\Models\Usuario;

class CuentasController extends Controller
{
    public function index(){
        $cuentas = Cuenta::paginate(10);
        return view('admin.cuentas', compact('cuentas'));
    }

    public function edit($id){
        if(isset($id)){
            $id = intval($id);
            $cuenta = Cuenta::find($id);
            $usuarios = $cuenta->usuarios;
            return view('admin.editarCuenta', compact('cuenta', 'usuarios'));

        }
        return redirect()->route('dashboard');
    }
}
