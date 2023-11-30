<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Usuario;
use Illuminate\Http\Request;

class registerController extends Controller
{
    public function register(Request $request)
    {
        // Obtener datos del formulario
        $nombre = $request->input('nombre');
        $apellido1 = $request->input('apellido1');
        $apellido2 = $request->input('apellido2');
        $username = $request->input('Username');
        $password = $request->input('Password');
        $id_tipo_usuario = $request->input('Id_tipo_usuario');
        $email = $request->input('Email');

        // Crear una nueva persona
        $persona = Persona::create([
            'nombre' => $nombre,
            'apellido1' => $apellido1,
            'apellido2' => $apellido2,
        ]);

        // Si se crea la persona correctamente, crea un usuario asociado
        if ($persona) {
            Usuario::create([
                'username' => $username,
                'password' => bcrypt($password), 
                'id_persona' => $persona->id, 
                'id_tipo_usuario' => $id_tipo_usuario,
                'email' => $email,
            ]);
            
            // Redirige después del registro exitoso
            return redirect('/')->with('success', '¡Registro exitoso!');
        }

        // En caso de falla en el registro
        return redirect()->back()->with('error', 'Error en el registro!');
    }
}
