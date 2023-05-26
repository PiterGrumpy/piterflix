<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use App\Models\Interprete;

class InterpretesController extends Controller
{
    public function index(){
        $interpretes = Interprete::paginate(10);
        return view('admin.interpretes', compact('interpretes'));
    }

    public function edit($id = null){
        if(isset($id)){
            $interprete = interprete::find($id);
            return view('admin.editarInterprete', compact('interprete'));
        }
        return view('admin.editarInterprete');
    }

    public function delete($id = null){
        if(isset($id)){
            $interprete =  Interprete::find($id);
            $interprete->delete();
            return redirect()->route('dashboard')->with('success', 'El interete seleccionado se ha eliminado satisfactoriamente!');
        }
        return redirect()->back()->with('error', 'No se ha podido eliminar el interprete');
    }

    public function store(Request $request){
        $msg = '¡El interprete ha sido añadido a la base de datos con éxito!';
        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'nacionalidad' => 'required',
            'anoNacimiento' => 'required'
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        if(isset($request->id)){
            $interprete = Interprete::find($request->id);
            $msg = '¡El interprete ha sido editado con éxito!';
        }else{
            $interprete = new interprete();
        }
        $interprete->nombre = $request->nombre;
        $interprete->nacionalidad = $request->nacionalidad;
        $interprete->anoNacimiento = $request->anoNacimiento;
        
        if(isset($request->id_api)){
            $interprete->id_api = intval($request->id_api); 
        }
        $interprete->save();
        
        return redirect()->route('dashboard')->with('success', $msg);
    }

    public function elegir(){
        $interpretes = interprete::all();
        return view('admin.elegirinterprete', compact('interpretes'));
    }
}
