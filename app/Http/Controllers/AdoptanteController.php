<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adoptante;
use PDF;

class AdoptanteController extends Controller
{
    public function index()
    {
        $adoptantes = Adoptante::all();
        return view('adoptantes.index', compact('adoptantes'));
    }

    public function create()
    {
        return view('adoptantes.create');
    }

    public function store(Request $request)
    {
        Adoptante::create($request->all());
        return redirect()->route('adoptantes.index')->with('success', 'Adoptante agregado');
    }

    public function edit(Adoptante $adoptante)
    {
        return view('adoptantes.edit', compact('adoptante'));
    }

    public function update(Request $request, Adoptante $adoptante)
    {
        $adoptante->update($request->all());
        return redirect()->route('adoptantes.index')->with('success', 'Adoptante actualizado');
    }

    public function destroy(Adoptante $adoptante)
    {
        $adoptante->delete();
        return redirect()->route('adoptantes.index')->with('success', 'Adoptante eliminado');
    }

    // Método para generar PDF
    public function exportPDF()
    {
        $adoptantes = Adoptante::all();
        $pdf = PDF::loadView('adoptantes.pdf', compact('adoptantes'));
        return $pdf->download('reporte_adoptantes.pdf');
    }
}
