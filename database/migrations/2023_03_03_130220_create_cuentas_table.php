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
        Schema::create('cuentas', function (Blueprint $table) {
            $table->id();
            $table->string('email')->nullable(false)->unique();
            $table->enum('plan', ['basico', 'premium', 'vip'])->nullable(false)->default('basico');
            $table->boolean('estado')->default(false)->on(false, 'inactivo')->on(true, 'activo');
            $table->string('datos_de_pago')->nullable(false);
            $table->string('password')->nullable(false);
            $table->rememberToken();
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
        Schema::dropIfExists('cuentas');
    }
};
