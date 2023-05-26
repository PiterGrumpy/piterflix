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
    public function up(){
        Schema::create('capitulos', function (Blueprint $table) {
            $table->unsignedInteger('n_capitulo');
            $table->unsignedInteger('n_temporada');
            $table->foreignId('media_id');
            $table->string('nombre')->nullable();
            $table->integer('duracion')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('video')->nullable();
            $table->timestamps();

            // Definir clave primaria compuesta
            $table->primary(['n_capitulo', 'n_temporada', 'media_id']);

            // Definir clave foránea
            $table->foreign(['n_temporada', 'media_id'], 'capitulo_n_temporada_media_id_foreign')
                ->references(['n_temporada', 'media_id'])
                ->on('temporadas')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            
            // Definir clave foránea
            $table->foreign('media_id')->references('id')->on('medias')
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
        Schema::dropIfExists('capitulos');
    }
};
