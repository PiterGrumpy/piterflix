<?php

namespace Database\Factories;

use App\Models\Cuenta;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class CuentaFactory extends Factory
{
    protected $model = Cuenta::class;

    public function definition()
    {
        return [
            'email' => $this->faker->unique()->safeEmail,
            'plan' => $this->faker->randomElement(['basico', 'premium', 'vip']),
            'estado' => $this->faker->boolean(),
            'datos_de_pago' => $this->faker->creditCardNumber,
            'password' => Hash::make('password'),
            'remember_token' => null,
        ];
    }
}