<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Media;
use App\Models\Temporada;

class TemporadasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $medias = Media::where('tipo', 'serie')->get();

        foreach ($medias as $media) {
            for ($i = 1; $i <= 5; $i++) {
                $temporada = new Temporada();
                $temporada->n_temporada = $i;
                $temporada->media_id = $media->id;
                if($i == 1) {
                    $year = rand(1990, 2018);
                    $temporada->anoEstreno = $year;
                } else {
                    $temporada->anoEstreno = ++$year;
                }
                
                $temporada->save();
            }
        }
    }
}
