<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Auth\Cuenta as CuentaAuthenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Cuenta extends Model implements Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = "cuentas";

    protected $fillable = [
        'email',
        'plan',
        'estado',
        'datos_de_pago',
        'password',
    ];

    // Atributos que no se deben serializar
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Relación uno a muchos con la tabla usuario
    public function usuarios() {
        return $this->hasMany(Usuario::class, 'id_cuenta');
    }

    // Método para obtener el identificador del usuario
    public function getAuthIdentifierName() {
        return 'id';
    }

    // Método para obtener el identificador del usuario
    public function getAuthIdentifier() {
        return $this->getKey();
    }

    // Método para obtener la contraseña del usuario
    public function getAuthPassword() {
        return $this->password;
    }

    // Método para obtener el token de autenticación de recuerdame
    public function getRememberToken() {
        return $this->remember_token;
    }

    // Método para establecer el token de autenticación de recuerdame
    public function setRememberToken($value) {
        $this->remember_token = $value;
    }

    // Método para obtener el nombre del campo de autenticación de recuerdame
    public function getRememberTokenName() {
        return 'remember_token';
    }
}
