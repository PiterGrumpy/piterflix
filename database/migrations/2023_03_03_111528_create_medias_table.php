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
        Schema::create('medias', function (Blueprint $table) {
            $table->id();
            $table->string("tipo");
            $table->string('titulo');
            $table->string('titulo_original');
            $table->string('idioma_original');
            $table->integer('duracion')->nullable();
            $table->integer('anoEstreno');
            $table->text('descripcion')->nullable();
            $table->foreignId('id_productora')->nullable()->constrained()->references('id')->on('productoras')
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->integer('id_api')->unique()->nullable();
            $table->string('imagen');
            $table->string('poster');
            $table->string('video')->nullable();
            $table->timestamps();

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
   
        Schema::dropIfExists('medias');
    }
};
