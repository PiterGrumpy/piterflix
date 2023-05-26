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
        Schema::create('generoMedias', function (Blueprint $table) {
            $table->foreignId('id_media');
            $table->foreignId('id_genero');
            $table->timestamps();

            // Definir clave primaria compuesta
            $table->primary(['id_media', 'id_genero']);

            // Definir clave foránea
            $table->foreign('id_media')->references(['id'])->on('medias')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            
            // Definir clave foránea
            $table->foreign('id_genero')->references(['id'])->on('generos')
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
        Schema::dropIfExists('generoMedias');
    }
};
