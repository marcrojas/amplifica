<?php

namespace App\Http\Controllers;

use App\Models\AuditoriaAccesos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{

    public function login(){


        return view('login.login');
    }


    public function valida_login(Request $request){

        date_default_timezone_set("America/Santiago");

        // Obtén las credenciales del formulario
        $credentials = [
            'email' => $request->input('correo'),
            'password' => $request->input('password'),
        ];

        // Intenta autenticar al usuario
        if (Auth::attempt($credentials)) {

            // Autenticación exitosa, redirige al home
            return redirect()->route('inicio');


        } else {
            // Autenticación fallida, redirige de nuevo al login con un mensaje de error
            return redirect()->route('login')->with('error_login', 'Usuario no registrado o datos incorrectos.');
        }

    }


    public function logout(Request $request){

        Auth::logout();

        // Opcionalmente, invalidar la sesión actual
        $request->session()->invalidate();

        // Regenerar el token de sesión para prevenir ataques CSRF
        $request->session()->regenerateToken();

        return redirect('/');  // Redirigir al login u otra ruta después del logout

    }

}
