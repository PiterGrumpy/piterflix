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
        Schema::create('temporadas', function (Blueprint $table) {
            $table->unsignedInteger('n_temporada');
            $table->foreignId('media_id')->constrained()->references('id')->on('medias')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->integer('anoEstreno');
            $table->timestamps();

            // Definir clave primaria compuesta
            $table->primary(['n_temporada', 'media_id']);
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('temporadas');
    }
};
