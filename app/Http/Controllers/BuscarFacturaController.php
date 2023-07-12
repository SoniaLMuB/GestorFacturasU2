<?php

namespace App\Http\Controllers;

use App\Models\Emisora;
use App\Models\Factura;
use App\Models\Receptora;
use Illuminate\Http\Request;

class BuscarFacturaController extends Controller
{
    // Función para redireccionar a la página principal
    public function index()
    {
        // Se instancia a los modelos para obtener todos los datos
        $emisoras = Emisora::all();
        $receptoras = Receptora::all();
        
        // Se retorna la vista 'principal' y se pasan las variables $emisoras y $receptoras a esa vista
        return view('principal', ['emisoras' => $emisoras, 'receptoras' => $receptoras]);
    }

    // Función para buscar la factura
    public function buscar(Request $request) {
        // Valida los datos requeridos
        
        $request->validate([
            'emisora' => 'required',
            'receptora' => 'required',
            'rfc' => 'required',
        ]);
        
        /// Busca que coincida el RFC con el ID de la empresa receptora
        $rfcReceptora = Receptora::find($request->receptora);
        
        //Si no se encuentra un 
        if (!$rfcReceptora || $rfcReceptora->rfc !== $request->rfc) {
            // Si el RFC y nombre de la empresa receptora no coinciden, se muestra un mensaje
            return redirect()->route('principal')->with('mensaje', 'El RFC ingresado no coincide con la empresa receptora seleccionada.');
        }
        
        // Se ejecuta la consulta con las condiciones de empresa emisora y receptora
        $facturas = Factura::where('emisora_id', $request->emisora)->where('receptora_id', $request->receptora)
            ->when($request->filled('folio'), function ($query) use ($request) {
                $query->where('folio', $request->folio);
        })->get();
        
        // Si se reciben facturas de la consulta, se redirige al listado
        if ($facturas->count() > 0) {
            // Se retorna la vista 'Portal' y se pasa la variable $factura a esa vista
            return view('Portal', ['facturas' => $facturas]);
            #return redirect()->route('principal')->with('facturas', $facturas);
        } else {
            // Si no coincide con facturas en la base de datos, se muestra un mensaje
            return redirect()->route('principal')->with('mensaje', 'Los datos ingresados no corresponden a ninguna factura.');
        }
    }
    
}
