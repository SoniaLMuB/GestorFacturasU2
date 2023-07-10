<?php

namespace App\Http\Controllers;

use App\Models\Receptora;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReceptoraController extends Controller
{
    //
    public function index(){
        //Mostrar la vista de login de usuarios
        return view('formEmpresaReceptora');
    }
    public function store(Request $request){

        //Modificaciones username en minusculaas y sin espacios
        // $request->request->add(['rfc_emisora'=>Str::slug($request->rfc_emisora)]);
        //validaciones del formulario de registro
        $this->validate($request,[
            'nombre'=>'required|min:5',
            'direccion'=>'required|min:5',
            'rfc'=>'required|min:5|max:20',
            'contacto'=>'required|min:5',
            'email'=>'required|unique:receptora|email|max:60',

             
        ]);
        //dd('Mensaje creado cuenta...');
        
        //dd($request);
        Receptora::create([
            'nombre' =>$request->nombre,
            'direccion' =>$request->direccion,
            'rfc' =>$request->rfc,
            'contacto' =>$request->contacto,
            'email'=>$request->email,
              
              
        ]);
        //Redireccionar a dashboard
        return redirect()->route('post.index');
    }

    public function show(){
        $receptora = DB::table('receptora')->get();
        //Retornar a la vista productos
        return view('empresaReceptora',['receptora'=>$receptora]);
    }
}
