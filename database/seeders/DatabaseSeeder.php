<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Http\Controllers\DataBaseController;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
    	$this->call(ProductorasSeeder::class);
    	$this->call(MediasTableSeeder::class);
        $this->call(AsignarGeneros::class);
        $this->call(DirectoresSeeder::class);
        $this->call(AsignarDirectores::class);
        $this->call(TemporadasSeeder::class);
        $this->call(CapitulosSeeder::class);
        $this->call(CuentasSeeder::class);
        $this->call(UsuariosSeeder::class);
        $this->call(InterpretesSeeder::class);
        $this->call(AsignarInterpretes::class);
    }
}
