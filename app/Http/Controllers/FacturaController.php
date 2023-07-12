<?php

namespace App\Http\Controllers;

use App\Models\Emisora;
use App\Models\Factura;
use App\Models\Receptora;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FacturaController extends Controller
{
    //El constructor es lo que se ejecuta cuando instanciamos un controlador
    public function __construct()
    {
        //protegemos la url
        //Solo los usuarios autenticados podrán ingresar
        $this->middleware('auth');
    }
    //dirigir a la vista a la vista del form
    public function index(){
        //Se instancia a los modelos para obtener todos los datos
        //
        $receptora=Receptora::all();
        $emisora=Emisora::all();
        return view('formfacturas',['emisora'=>$emisora, 'receptora'=>$receptora]);
        
    }

    //Mostrar la lo guardado
    public function show(){
        //Obtiene los datos de la tabla de facturas y las pasará con $facturas
        //$facturas=Factura::with('empEmisora','empReceptora')->get();
        $facturas = Factura::all();
        #$facturas = DB::table('facturas')->get();
        //Retornar a la vista de facturas (tabla) y pasará los datos de la tabla de facturas
        return view('facturas',['facturas'=>$facturas]);
    }

    //Funcion para insertar los datos de la factura en su respectiva tabla
    public function store(Request $request){
        //Validaciones de formulario
        $this->validate($request,[
            'emisora'=>'required',
            'receptora'=>'required',
            'folio'=>'required|unique:facturas',
            'pdf'=>'required',
            'xml'=>'required'
        ]);
        //Se insertan los valores a la tabla facturas
        Factura::create([
            'emisora_id'=>$request->emisora,
            'receptora_id'=>$request->receptora,
            'folio'=>$request->folio,
            'pdf'=>$request->pdf,
            'xml'=>$request->xml

        ]);
        //Retorna a la vista del Dashboard
        return redirect()->route('post.index');
    }

    //Función para almacenar el archivo PDF
    public function storePdf(Request $request)
    {
        $pdf = $request->file('file');
        // Se obtiene el nombre del archivo
        $nombrepdf = $pdf->getClientOriginalName();
        //Se obtiene el path en donde queremos almecenar el archivo
        $pdfPath = public_path('uploads') . '/' . $nombrepdf;
        //Con la creación del archivo, se coloca en la ruta establecida
        copy($pdf,$pdfPath);

        return response()->json([
            'pdf' => $nombrepdf
        ]);
    }

    //Función para almacenar el archivo PDF
    public function storeXml(Request $request)
    {
        $xml = $request->file('file');
        // Se obtiene el nombre del archivo
        $nombrexml = $xml->getClientOriginalName();
        //Se obtiene el path en donde queremos almecenar el archivo
        $xmlPath = public_path('uploads') . '/' . $nombrexml;
        //Con la creación del archivo, se coloca en la ruta establecida
        copy($xml,$xmlPath);

        return response()->json([
            'xml' => $nombrexml
        ]);
    }

    //Descargar el archivo de las facturas 
    public function descargar($file){
        $pathFile = public_path('uploads').'/'.$file;
        return response()->download($pathFile);
    }
    
    //eliminar factura con un id
    public function delete($id)
    {
        Factura::find($id)->delete();
        return redirect()->back();
    }
}
