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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_cuenta')->nullable(false);
            $table->string('nombre')->nullable(false);
            $table->boolean('isAdmin')->default(false)->on(false, 'user')->on(true, 'admin');
            $table->integer('anoNacimiento')->nullable(false);
            $table->string('avatar');
            $table->timestamps();

            // Definir clave foránea
            $table->foreign('id_cuenta')->references(['id'])->on('cuentas')
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
        Schema::dropIfExists('usuarios');
    }
};
