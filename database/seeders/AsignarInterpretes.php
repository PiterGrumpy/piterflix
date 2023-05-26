<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Media;
use App\Models\Interprete;

class AsignarInterpretes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
         // Obtener todas las medias e interpretes
         $medias = Media::all();
         $interpretes = Interprete::all();
 
         // Asignar 5 actores aleatorios a cada media
         foreach ($medias as $media) {
            $interpretes_comprobacion = []; 
            for($i = 0; $i < 5; $i++){
                $interprete = $interpretes->random();
                if (!in_array($interprete->id, $interpretes_comprobacion)) {
                    $media->interpretes()->attach($interprete->id);
                }
                $interpretes_comprobacion[$i] = $interprete->id;
             } 
         }
    }
}
