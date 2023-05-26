<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use App\Models\Productora;


class ProductorasController extends Controller{
    
    public function index(){
        $productoras = Productora::all();
        return view('admin.addProductora', compact('productoras'));
    }

    public function store(Request $request){
        $msg = '¡La productora ha sido añadida a la base de datos con éxito!';
        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'pais' => 'required'
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        if(isset($request->id)){
            $productora = Productora::find($request->id);
            $msg = '¡La productora ha sido editada con éxito!';
        }else{
            $productora = new Productora();
        }
        $productora->nombre = $request->nombre;
        $productora->pais = $request->pais;
        
        if(isset($request->api_id)){
            $productora->api_id = intval($request->api_id); 
        }
        $productora->save();
        
        return redirect()->route('dashboard')->with('success', $msg);
    }

    public function elegir(){
        $productoras = Productora::all();
        return view('admin.elegirProductora', compact('productoras'));
    }

    public function edit(Request $request){
        $productora = json_decode($request->input('productora'), true); 
        return view('admin.editarProductora', compact('productora'));
    }
}
