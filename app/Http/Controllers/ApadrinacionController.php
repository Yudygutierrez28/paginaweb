<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mascota;
use App\Models\Apadrinacion;

class ApadrinacionController extends Controller
{
    // Mostrar todas las mascotas disponibles
    public function index()
    {
        $mascotas = Mascota::where('disponible', true)->get();
        return view('mascotas.index', compact('mascotas'));
    }

    // Mostrar el formulario para apadrinar una mascota
    public function create($id)
    {
        $mascota = Mascota::findOrFail($id);
        $monto_minimo = 10000;
        $tiempo = 'Mensual';
        return view('mascotas.apadrinar', compact('mascota', 'monto_minimo', 'tiempo'));
    }

    // Guardar los datos del apadrinamiento
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'correo' => 'required|email',
            'cedula' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'mascota_id' => 'required|exists:mascotas,id',
            'monto' => 'required|numeric|min:10000',
            'tiempo_consignacion' => 'required',
        ]);

        Apadrinacion::create($request->all());

        $mascota = Mascota::findOrFail($request->mascota_id);

        return redirect('/mascotas')->with(
            'success',
            "¡Gracias por apadrinar a {$mascota->nombre}! 🐾 Pronto te estaremos contactando al correo {$request->correo} para formalizar el apadrinamiento."
        );
    }
}
