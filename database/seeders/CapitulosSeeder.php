<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Media;
use App\Models\Temporada;
use App\Models\Capitulo;

class CapitulosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $temporadas = Temporada::all();
        $media = Media::find($temporadas[0]->media_id);
        foreach ($temporadas as $temporada) {
            for($i = 1; $i <= 5; $i++) {
                Capitulo::create([
                    'n_capitulo' => $i,
                    'n_temporada' => $temporada->n_temporada,
                    'media_id' => $temporada->media_id,
                    'nombre' => 'Capítulo ' . $i,
                    'duracion' => rand(20, 60),
                    'descripcion' => 'Descripción del capítulo ' . $i,
                    'video' => $media->video
                ]);
            }
            
        }
    }
}
