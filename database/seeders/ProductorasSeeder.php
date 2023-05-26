<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductorasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('productoras')->insert([
            [
                'nombre' => 'Warner Bros. Pictures',
                'pais' => 'Estados Unidos',
                'api_id' => 6194,
            ],
            [
                'nombre' => 'Universal Pictures',
                'pais' => 'Estados Unidos',
                'api_id' => 33,
            ],
            [
                'nombre' => '20th Century Fox',
                'pais' => 'Estados Unidos',
                'api_id' => 25,
            ],
            [
                'nombre' => 'Paramount Pictures',
                'pais' => 'Estados Unidos',
                'api_id' => 4,
            ],
            [
                'nombre' => 'Sony Pictures',
                'pais' => 'Estados Unidos',
                'api_id' => 34,
            ],
            [
                'nombre' => 'Walt Disney Pictures',
                'pais' => 'Estados Unidos',
                'api_id' => 2,
            ],
            [
                'nombre' => 'DreamWorks Pictures',
                'pais' => 'Estados Unidos',
                'api_id' => 27,
            ],
            [
                'nombre' => 'Focus Features',
                'pais' => 'Estados Unidos',
                'api_id' => 10108,
            ],
            [
                'nombre' => 'New Line Cinema',
                'pais' => 'Estados Unidos',
                'api_id' => 12,
            ],
            [
                'nombre' => 'MGM',
                'pais' => 'Estados Unidos',
                'api_id' => 8411,
            ]
        ]);
    }
}
