<?php

namespace App\Http\Controllers;

use App\Models\Emisora;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmisoraController extends Controller
{
    //El constructor es lo que se ejecuta cuando instanciamos un controlador
    public function __construct()
    {
        //protegemos la url
        //Solo los usuarios autenticados podrán ingresar
        $this->middleware('auth');
    }
    //Visualizar el form
    public function index(){
        //Mostrar la vista de login de usuarios
        return view('formEmisora');
    }
    public function store(Request $request){

        //Modificaciones username en minusculaas y sin espacios
        // $request->request->add(['rfc_emisora'=>Str::slug($request->rfc_emisora)]);
        //validaciones del formulario de registro
        $this->validate($request,[
            'razon_social'=>'required|min:5',
            'email'=>'required|unique:emisora|email|max:60',
            'rfc_emisora'=>'required|unique:emisora|min:5|max:20',
             
        ]);
        //dd('Mensaje creado cuenta...');
        
        //dd($request);
        Emisora::create([
              'razon_social' =>$request->razon_social,
              'email'=>$request->email,
              'rfc_emisora' =>$request->rfc_emisora,
              
        ]);
        

        //Redireccionar a dashboard
        return redirect()->route('post.index');
    }
    public function show(){
        $emisora = DB::table('emisora')->get();
        //Retornar a la vista productos
        return view('empresaEmisora',['emisora'=>$emisora]);
    }
    //eliminar factura con un id
    public function delete($id)
    {
        Emisora::find($id)->delete();
        return redirect()->back();
    }
}
