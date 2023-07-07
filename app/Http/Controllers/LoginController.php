<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index(){
        //Mostrar la vista de login de usuarios
        return view('auth.login');
    }
    //Validar formulario de login de usuarios
    public function store(Request $request){
        //dd('Autenticando');
        $this ->validate($request,[
            'email' => 'required|email',
            'password' => 'required'

        ]);
        //Verificar que las contraseñas sean correctas
        if(!auth()->attempt($request->only('email','password'),$request->remember)){
            //Usar la directiva "with" para llenar los valores de la sesión
            return back()->with('mensaje','Credenciales incorrectas');
        }
        //CRedecncials correctamente
        return redirect()->route('post.index');
        

    }
}