<?php

namespace App\Http\Controllers;

use App\Models\Emisora;
use App\Models\Factura;
use App\Models\Receptora;
use Illuminate\Http\Request;

class BuscarController extends Controller
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

    // Ruta para buscar la factura
    public function buscar(Request $request)
    {
        // Validaciones de formulario
        $this->validate($request, [
            'emisora' => 'required',
            'receptora' => 'required',
        ]);

        // Se verifica si se proporcionó un valor en el campo 'folio'
        if ($request->folio == null) {
            // Se realiza la consulta para obtener todas las facturas que coincidan con 'emisora_id' y 'receptora_id'
            // Se utilizan los métodos 'with()' para cargar las relaciones 'empresaEmisora' y 'empresaReceptora' asociadas a cada factura
            $factura = Factura::with('empresaEmisora', 'empresaReceptora')
                ->where('emisora_id', $request->emisora)
                ->where('receptora_id', $request->receptora)
                ->get();
        } else {
            // Se realiza la consulta para obtener las facturas que coincidan con 'emisora_id', 'receptora_id' y 'folio'
            // También se utilizan los métodos 'with()' para cargar las relaciones 'empresaEmisora' y 'empresaReceptora' asociadas a cada factura
            $factura = Factura::with('empresaEmisora', 'empresaReceptora')
                ->where('emisora_id', $request->emisora)
                ->where('receptora_id', $request->receptora)
                ->where('folio', $request->folio)
                ->get();
        }

        // Se retorna la vista 'Portal' y se pasa la variable $factura a esa vista
        return view('Portal', ['facturas' => $factura]);
    }
}
