<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reproducciones', function (Blueprint $table) {
            $table->foreignId('id_usuario');
            $table->foreignId('id_media');
            $table->timestamps();

            // Definir clave primaria compuesta
            $table->primary(['id_usuario', 'id_media']);

            // Definir clave foránea
            $table->foreign('id_usuario')->references(['id'])->on('usuarios')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            
            // Definir clave foránea
            $table->foreign('id_media')->references(['id'])->on('medias')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reproducciones');
    }
};
