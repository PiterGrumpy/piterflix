<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\EliminarGeneroRequest;
use App\Models\Genero;
use Illuminate\Support\Str;
use App\Models\Media;
use App\Models\GeneroMedia;

class GenerosController extends Controller
{
    public function index(){
        $generos = Genero::paginate(10);
        return view('admin.generos', compact('generos'));
    }

    public function delete(EliminarGeneroRequest $request){
        $genero =  Genero::find($request->id_genero);
        $genero->delete();
        return redirect()->back()->with('success', 'El género seleccionado se ha eliminado satisfactoriamente.');
    }

    public function add(Request $request){
        $generos = Genero::all();
        $nombreNormalizado = Str::slug($request->nombre, '');
        foreach ($generos as $genero) {
            $generoNormalizado = Str::slug($genero->nombre, '');
            if ($generoNormalizado === $nombreNormalizado) {
                // el género ya existe
                return redirect()->back()->with('error', 'El género seleccionado ya existe.');
            }
        }
        
        $genero = new Genero();
        $genero->nombre = $request->nombre;
        $genero->id_api = $request->id_api;
        $genero->save();
        return redirect()->route('dashboard')->with('success', 'El género ha sido añadido con éxito!');
    }
}
