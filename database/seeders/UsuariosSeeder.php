<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cuenta;
use App\Models\Usuario;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cuenta::all()->each(function ($cuenta) {
            Usuario::factory()->count(3)->create([
                'id_cuenta' => $cuenta->id,
            ]);
        });
    }
}
