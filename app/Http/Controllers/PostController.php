<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //Contructor para protección de la url "dashboard"
    //El constructor es lo que se ejecuta cuando instanciamos un controlador
    public function __construct()
    {
        //protegemos la url
        //Solo los usuarios autenticados podrán ingresar
        $this->middleware('auth');
    }

    //función que redireccionará a la vista del dashboard
    public function index(User $user){
        //Crear la consulta 
        //Post es el nombre del modelo
        //Muestre la vista de dashabord
        //return view('dashboard')->with('posts',$posts);
        //dd("Usuario",$user->username);
        return view('dashboard',[
            //dd("Creando post");
            'user'=>$user,
        ]);
    }
}
