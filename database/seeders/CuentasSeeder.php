<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Cuenta;
use App\Models\Usuario;

class CuentasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Cuenta::create([
            'email' => 'admin@admin.com',
            'plan' => 'vip',
            'estado' => true,
            'datos_de_pago' => 'No requeridos',
            'password' => Hash::make('password'),
        ]);
        Usuario::create([
            'id_cuenta' => $admin->id,
            'nombre' => 'Administrador',
            'isAdmin' => true,
            'anoNacimiento' => 1988,
            'avatar' => 'https://via.placeholder.com/200x200.png/00aaee?text=cats+natus',
        ]);
        Cuenta::factory()->count(5)->create();
    }
}
