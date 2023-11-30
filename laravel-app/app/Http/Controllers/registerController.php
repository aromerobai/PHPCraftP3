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
            'Nombre' => $nombre,
            'Apellido1' => $apellido1,
            'Apellido2' => $apellido2,
        ]);

        // Si se crea la persona correctamente, crea un usuario asociado
        if ($persona) {
            $usuario = Usuario::create([
                'Username' => $username,
                'Password' => bcrypt($password), 
                'Id_Persona' => $persona->Id_persona, 
                'Id_tipo_usuario' => $id_tipo_usuario,
                'Email' => $email,
            ]);
            
            // Redirige después del registro exitoso
            $mensaje = '¡Registro exitoso!';
            return view('home')->with('mensaje', $mensaje);
        }

        // En caso de falla en el registro
        $mensaje = 'Error en el registro!';
        return view('register')->with('mensaje', $mensaje);
    }
}
