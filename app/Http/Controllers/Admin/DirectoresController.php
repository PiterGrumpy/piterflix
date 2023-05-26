<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use App\Models\Director;

class DirectoresController extends Controller
{
    public function index(){
        $directores = Director::paginate(10);
        return view('admin.directores', compact('directores'));
    }

    public function edit($id = null){
        if(isset($id)){
            $director = Director::find($id);
            return view('admin.editarDirector', compact('director'));
        }
        return view('admin.editarDirector');
    }

    public function delete($id = null){
        if(isset($id)){
            $director =  Director::find($id);
            $director->delete();
            return redirect()->route('dashboard')->with('success', 'El director seleccionado se ha eliminado satisfactoriamente!');
        }
        return redirect()->back()->with('error', 'No se ha podido eliminar el director');
    }

    public function store(Request $request){
        $msg = '¡El director ha sido añadido a la base de datos con éxito!';
        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'nacionalidad' => 'required',
            'anoNacimiento' => 'required'
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        if(isset($request->id)){
            $director = Director::find($request->id);
            $msg = '¡El director ha sido editado con éxito!';
        }else{
            $director = new Director();
        }
        $director->nombre = $request->nombre;
        $director->nacionalidad = $request->nacionalidad;
        $director->anoNacimiento = $request->anoNacimiento;
        
        if(isset($request->id_api)){
            $director->id_api = intval($request->id_api); 
        }
        $director->save();
        
        return redirect()->route('dashboard')->with('success', $msg);
    }

    public function elegir(){
        $directores = Director::all();
        return view('admin.elegirDirector', compact('directores'));
    }
}
