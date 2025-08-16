<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MascotaController extends Controller
{
    public function index()
    {
        $mascotas = Mascota::all();
        return view('mascotas.index', compact('mascotas'));
    }

    public function create()
    {
        return view('mascotas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'raza' => 'required|string|max:100',
            'descripcion' => 'required|string',
            'imagen' => 'nullable|image|max:2048',
        ]);

        $mascota = new Mascota($request->except('imagen'));

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '_' . uniqid() . '.' . $imagen->getClientOriginalExtension();
            $mascota->imagen = $imagen->storeAs('mascotas', $nombreImagen, 'public');
        }

        $mascota->save();

        return redirect()->route('mascotas.index')->with('success', 'Mascota agregada con éxito.');
    }

    public function edit($id)
    {
        $mascota = Mascota::findOrFail($id);
        return view('mascotas.edit', compact('mascota'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'raza' => 'required|string|max:100',
            'descripcion' => 'required|string',
            'imagen' => 'nullable|image|max:2048',
        ]);

        $mascota = Mascota::findOrFail($id);
        $mascota->fill($request->except('imagen'));

        if ($request->hasFile('imagen')) {
            // Eliminar la imagen anterior solo si no la usan otras mascotas
            if ($mascota->imagen) {
                $otras = Mascota::where('imagen', $mascota->imagen)->where('id', '!=', $mascota->id)->count();
                if ($otras == 0) {
                    Storage::disk('public')->delete($mascota->imagen);
                }
            }

            $imagen = $request->file('imagen');
            $nombreImagen = time() . '_' . uniqid() . '.' . $imagen->getClientOriginalExtension();
            $mascota->imagen = $imagen->storeAs('mascotas', $nombreImagen, 'public');
        }

        $mascota->save();

        return redirect()->route('mascotas.index')->with('success', 'Mascota actualizada correctamente.');
    }

    public function destroy($id)
    {
        $mascota = Mascota::findOrFail($id);

        if ($mascota->imagen) {
            $otras = Mascota::where('imagen', $mascota->imagen)->where('id', '!=', $mascota->id)->count();
            if ($otras == 0) {
                Storage::disk('public')->delete($mascota->imagen);
            }
        }

        $mascota->delete();

        return redirect()->route('mascotas.index')->with('success', 'Mascota eliminada.');
    }
}
