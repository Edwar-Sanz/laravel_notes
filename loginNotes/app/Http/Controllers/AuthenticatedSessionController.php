<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    public function store(Request $request){

        // $credentials contiene un array con los datos
        // que se validaron correctamente
        $credentials = $request->validate([
            "email"=>["required"],
            "password"=>["required"]
        ]);

        // guarda en una variable el estado del checkbox
        $remember = $request->boolean("remember");

        
        //Auth::attempt compara con la db y retorna un booleano
        if (Auth::attempt($credentials, $remember)) { 
            // Autenticación exitosa
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        throw ValidationException::withMessages([
            // 'email' => __('auth.failed'),
            'email' => "No se pudo loguear"
        ]);
    }

    //------------------------------------------------------------
    public function destroy(Request $request){

        Auth::guard("web")->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route("login");
    }
}
