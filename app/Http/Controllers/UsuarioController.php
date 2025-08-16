<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UsuarioController extends Controller
{
    public function showRegistroForm()
    {
        return view('usuarios.registro');
    }

    public function registrar(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'email' => 'required|email|unique:usuarios,email',
            'password' => 'required|min:6',
        ]);

        $usuario = Usuario::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Enviar correo de bienvenida
        Mail::to($usuario->email)->send(new \App\Mail\BienvenidaUsuario($usuario));

        return redirect()->route('usuarios.form')->with('success', '¡Registro exitoso! Revisa tu correo.');
    }
}
