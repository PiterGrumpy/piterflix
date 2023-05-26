<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DirectoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run() {
        $directores = [
            ['nombre' => 'Steven Spielberg', 'nacionalidad' => 'Estados Unidos'],
            ['nombre' => 'Martin Scorsese', 'nacionalidad' => 'Estados Unidos'],
            ['nombre' => 'Alfred Hitchcock', 'nacionalidad' => 'Reino Unido'],
            ['nombre' => 'Stanley Kubrick', 'nacionalidad' => 'Estados Unidos'],
            ['nombre' => 'Francis Ford Coppola', 'nacionalidad' => 'Estados Unidos'],
            ['nombre' => 'Spike Lee', 'nacionalidad' => 'Estados Unidos'],
            ['nombre' => 'Pedro Almodóvar', 'nacionalidad' => 'España'],
            ['nombre' => 'Alejandro González Iñárritu', 'nacionalidad' => 'México'],
            ['nombre' => 'Hayao Miyazaki', 'nacionalidad' => 'Japón'],
            ['nombre' => 'Tim Burton', 'nacionalidad' => 'Estados Unidos'],
            ['nombre' => 'David Lynch', 'nacionalidad' => 'Estados Unidos'],
            ['nombre' => 'Christopher Nolan', 'nacionalidad' => 'Reino Unido'],
            ['nombre' => 'Wes Anderson', 'nacionalidad' => 'Estados Unidos'],
            ['nombre' => 'Joel Coen', 'nacionalidad' => 'Estados Unidos'],
            ['nombre' => 'Ethan Coen', 'nacionalidad' => 'Estados Unidos'],
            ['nombre' => 'Akira Kurosawa', 'nacionalidad' => 'Japón'],
            ['nombre' => 'Federico Fellini', 'nacionalidad' => 'Italia'],
            ['nombre' => 'Jean-Luc Godard', 'nacionalidad' => 'Francia'],
            ['nombre' => 'Luis Buñuel', 'nacionalidad' => 'España'],
            ['nombre' => 'Ingmar Bergman', 'nacionalidad' => 'Suecia'],
            ['nombre' => 'John Ford', 'nacionalidad' => 'Estados Unidos'],
            ['nombre' => 'Orson Welles', 'nacionalidad' => 'Estados Unidos'],
            ['nombre' => 'Billy Wilder', 'nacionalidad' => 'Estados Unidos'],
            ['nombre' => 'Robert Altman', 'nacionalidad' => 'Estados Unidos'],
            ['nombre' => 'Michael Mann', 'nacionalidad' => 'Estados Unidos'],
            ['nombre' => 'Oliver Stone', 'nacionalidad' => 'Estados Unidos'],
            ['nombre' => 'John Carpenter', 'nacionalidad' => 'Estados Unidos'],
            ['nombre' => 'David Cronenberg', 'nacionalidad' => 'Canadá'],
            ['nombre' => 'Brian De Palma', 'nacionalidad' => 'Estados Unidos'],
            ['nombre' => 'Sam Peckinpah', 'nacionalidad' => 'Estados Unidos'],
            ['nombre' => 'Roman Polanski', 'nacionalidad' => 'Francia'],
            ['nombre' => 'Steven Soderbergh', 'nacionalidad' => 'Estados Unidos'],
            ['nombre' => 'Sofia Coppola', 'nacionalidad' => 'Estados Unidos'],
            ['nombre' => 'Darren Aronofsky', 'nacionalidad' => 'Estados Unidos'],
            ['nombre' => 'Ridley Scott', 'nacionalidad' => 'Reino Unido'],
            ['nombre' => 'Tony Scott', 'nacionalidad' => 'Reino Unido'],
            ['nombre' => 'Terry Jones', 'nacionalidad' => 'Reino Unido'],
            ['nombre' => 'Terry Gilliam', 'nacionalidad' => 'Estados Unidos'],
            ['nombre' => 'Pedro Costa', 'nacionalidad' => 'Portugal'],
            ['nombre' => 'Pier Paolo Pasolini', 'nacionalidad' => 'Italia'],
            ['nombre' => 'Werner Herzog', 'nacionalidad' => 'Alemania'],
            ['nombre' => 'Dario Argento', 'nacionalidad' => 'Italia'],
            ['nombre' => 'Miloš Forman', 'nacionalidad' => 'Checoslovaquia'],
            ['nombre' => 'Lukas Moodysson', 'nacionalidad' => 'Suecia'],
            ['nombre' => 'Park Chan-wook', 'nacionalidad' => 'Corea del Sur'],
            ['nombre' => 'Bong Joon-ho', 'nacionalidad' => 'Corea del Sur'],
            ['nombre' => 'Kim Ki-duk', 'nacionalidad' => 'Corea del Sur'],
            ['nombre' => 'Mamoru Oshii', 'nacionalidad' => 'Japón'],
            ['nombre' => 'Isao Takahata', 'nacionalidad' => 'Japón'],
            ['nombre' => 'John Lasseter', 'nacionalidad' => 'Estados Unidos'],
            ['nombre' => 'Brad Bird', 'nacionalidad' => 'Estados Unidos'],
            ['nombre' => 'Andrew Stanton', 'nacionalidad' => 'Estados Unidos'],
            ['nombre' => 'Hayao Miyazaki', 'nacionalidad' => 'Japón'],
            ['nombre' => 'Satoshi Kon', 'nacionalidad' => 'Japón'],
            ['nombre' => 'Wes Craven', 'nacionalidad' => 'Estados Unidos'],
            ['nombre' => 'John Carpenter', 'nacionalidad' => 'Estados Unidos'],
            ['nombre' => 'David Cronenberg', 'nacionalidad' => 'Canadá'],
            ['nombre' => 'Dario Argento', 'nacionalidad' => 'Italia'],
            ['nombre' => 'George A. Romero', 'nacionalidad' => 'Estados Unidos'],
            ['nombre' => 'Lucio Fulci', 'nacionalidad' => 'Italia'],
            ['nombre' => 'Tobe Hooper', 'nacionalidad' => 'Estados Unidos'],
            ['nombre' => 'David Lynch', 'nacionalidad' => 'Estados Unidos'],
            ['nombre' => 'Darren Aronofsky', 'nacionalidad' => 'Estados Unidos'],
            ['nombre' => 'Park Chan-wook', 'nacionalidad' => 'Corea del Sur'],
            ['nombre' => 'Quentin Tarantino', 'nacionalidad' => 'Estados Unidos'],
            ['nombre' => 'Robert Rodriguez', 'nacionalidad' => 'Estados Unidos'],
            ['nombre' => 'Eli Roth', 'nacionalidad' => 'Estados Unidos'],
            ['nombre' => 'Rob Zombie', 'nacionalidad' => 'Estados Unidos'],
            ['nombre' => 'Alex de la Iglesia', 'nacionalidad' => 'España'],
            ['nombre' => 'Alejandro Amenábar', 'nacionalidad' => 'España'],
        ];
        foreach ($directores as $director) {
            DB::table('directores')->insert([
                'nombre' => $director['nombre'],
                'nacionalidad' => $director['nacionalidad'],
                'anoNacimiento' => $this->getRandomYear(),
                'id_api' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
    /**
    * Genera un año de nacimiento aleatorio entre 1940 y 1980.
    *
    * @return string
    */
   private function getRandomYear()
   {
       return rand(1940, 1980);
   }
}
   
