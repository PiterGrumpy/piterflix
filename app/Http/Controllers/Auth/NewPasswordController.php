<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\Cuenta;

class NewPasswordController extends Controller
{
    /**
     * Display the password reset view.
     */
    public function create(Request $request): View
    {
        return view('auth.reset-password', ['request' => $request]);
    }

    /**
     * Handle an incoming new password request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'currentPassword' => ['required'],
            'newPassword' => ['required', 'string', 'min:8', 'different:currentPassword'],
            'newPassword_confirmation' => ['required', 'string', 'min:8', 'same:newPassword'],
        ]);

         // Check if the current password matches the authenticated user's password
        if (!Hash::check($request->currentPassword, auth()->user()->password)) {
            return back()->withErrors(['currentPassword' => 'La contraseña actual es incorrecta']);
        }

        Cuenta::find(auth()->user()->id)->update(['password'=> Hash::make($request->newPassword)]);

        return redirect()->back()->with('success','¡La contraseña se ha cambiado correctamente!');
    }
}
