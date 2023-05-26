<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;



class InterpretesSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $interpretes = [
            ['nombre' => 'Meryl Streep', 'nacionalidad' => 'Estados Unidos', 'anoNacimiento' => 1949],
            ['nombre' => 'Tom Hanks', 'nacionalidad' => 'Estados Unidos', 'anoNacimiento' => 1956],
            ['nombre' => 'Viola Davis', 'nacionalidad' => 'Estados Unidos', 'anoNacimiento' => 1965],
            ['nombre' => 'Denzel Washington', 'nacionalidad' => 'Estados Unidos', 'anoNacimiento' => 1954],
            ['nombre' => 'Cate Blanchett', 'nacionalidad' => 'Australia', 'anoNacimiento' => 1969],
            ['nombre' => 'Leonardo DiCaprio', 'nacionalidad' => 'Estados Unidos', 'anoNacimiento' => 1974],
            ['nombre' => 'Kate Winslet', 'nacionalidad' => 'Reino Unido', 'anoNacimiento' => 1975],
            ['nombre' => 'Brad Pitt', 'nacionalidad' => 'Estados Unidos', 'anoNacimiento' => 1963],
            ['nombre' => 'Morgan Freeman', 'nacionalidad' => 'Estados Unidos', 'anoNacimiento' => 1937],
            ['nombre' => 'Jodie Foster', 'nacionalidad' => 'Estados Unidos', 'anoNacimiento' => 1962],
            ['nombre' => 'Robert De Niro', 'nacionalidad' => 'Estados Unidos', 'anoNacimiento' => 1943],
            ['nombre' => 'Sandra Bullock', 'nacionalidad' => 'Estados Unidos', 'anoNacimiento' => 1964],
            ['nombre' => 'Julia Roberts', 'nacionalidad' => 'Estados Unidos', 'anoNacimiento' => 1967],
            ['nombre' => 'Morgan Fairchild', 'nacionalidad' => 'Estados Unidos', 'anoNacimiento' => 1950],
            ['nombre' => 'Sylvester Stallone', 'nacionalidad' => 'Estados Unidos', 'anoNacimiento' => 1946],
            ['nombre' => 'Jennifer Aniston', 'nacionalidad' => 'Estados Unidos', 'anoNacimiento' => 1969],
            ['nombre' => 'Bruce Willis', 'nacionalidad' => 'Estados Unidos', 'anoNacimiento' => 1955],
            ['nombre' => 'Angelina Jolie', 'nacionalidad' => 'Estados Unidos', 'anoNacimiento' => 1975],
            ['nombre' => 'Robert Downey Jr.', 'nacionalidad' => 'Estados Unidos', 'anoNacimiento' => 1965],
            ['nombre' => 'Emma Stone', 'nacionalidad' => 'Estados Unidos', 'anoNacimiento' => 1988]
        ];

        foreach ($interpretes as $interprete) {
            DB::table('interpretes')->insert([
                'nombre' => $interprete['nombre'],
                'nacionalidad' => $interprete['nacionalidad'],
                'anoNacimiento' => $interprete['anoNacimiento'],
                'id_api' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}


