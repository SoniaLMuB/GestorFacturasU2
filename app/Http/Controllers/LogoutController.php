<?php

namespace App\Http\Controllers;

use App\Models\Emisora;
use App\Models\Receptora;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    //
    public function store(){
        //dd('Cerrando sesión');
        //Cerrar sesión con el helper auth implementando el métod logout
        auth()->logout();
        //Enviar a la vista de login

        #return redirect()->route('login');
        // Se instancia a los modelos para obtener todos los datos
        $emisoras = Emisora::all();
        $receptoras = Receptora::all();
        
        // Se retorna la vista 'principal' y se pasan las variables $emisoras y $receptoras a esa vista
        return view('principal', ['emisoras' => $emisoras, 'receptoras' => $receptoras]);

    }
}
