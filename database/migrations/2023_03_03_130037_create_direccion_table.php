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
        Schema::create('direccion', function (Blueprint $table) {
            $table->foreignId('id_media');
            $table->foreignId('id_director');
            $table->timestamps();

            // Definir clave primaria compuesta
            $table->primary(['id_media', 'id_director']);

            // Definir clave foránea
            $table->foreign('id_media')->references(['id'])->on('medias')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            // Definir clave foránea
            $table->foreign('id_director')->references(['id'])->on('directores')
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
        Schema::dropIfExists('direccion');
    }
};
