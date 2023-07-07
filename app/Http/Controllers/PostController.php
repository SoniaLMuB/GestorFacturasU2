<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
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
