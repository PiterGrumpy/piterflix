<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Media;
use App\Models\Director;

class AsignarDirectores extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        // Obtener todas las medias y directores
        $medias = Media::all();
        $directores = Director::all();

        // Asignar un director aleatorio a cada media
        foreach ($medias as $media) {
            $director = $directores->random();
            $media->directores()->attach($director->id);
        }
    }
}
