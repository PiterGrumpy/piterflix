<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cuenta;
use App\Models\Usuario;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\PagoRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(PagoRequest $request): RedirectResponse
    {
        if($request->paymentMethod === "paypal") {
            $request->datos_de_pago = "paypal";
        } else{
            $request->datos_de_pago = $request->cc_number;
        }
        $anoNacimiento = explode("-", $request->anoNacimiento)[0];
        $cuenta = Cuenta::create([
            'plan' => $request->plan,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'estado' => true,
            'datos_de_pago' => $request->datos_de_pago,

        ]);
        
        $usuario_inicial = Usuario::create([
            'nombre' => $request->nombre,
            'id_cuenta' => $cuenta->id,
            'isAdmin' => false,
            'anoNacimiento' => $anoNacimiento,
            'avatar' => $request->avatar
        ]);

        event(new Registered($cuenta));

        Auth::login($cuenta);

        return redirect(RouteServiceProvider::USERS);
    }
    /**
     * Destroy the account and associated data.
     *
     * @param  int  $id_cuenta
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id_cuenta)
    {
        $user = Cuenta::findOrFail($id_cuenta);
        $user->delete();
        
        return redirect(RouteServiceProvider::HOME);
    }

}
