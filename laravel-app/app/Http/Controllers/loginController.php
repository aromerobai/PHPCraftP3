<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class loginController extends Controller
{
    function init() {
        $usuarios = Usuario::all();
        return view('login')->with('usuarios', $usuarios);
    }

    public function userLogin(Request $request)
    {
        $username = $request->input('usuario');
        $password = $request->input('contrasena');

        // Buscar el usuario en la base de datos por nombre de usuario
        $usuario = Usuario::where('Username', $username)->first();

        if ($usuario) {
            // Verificar la contras
            if ($password === $usuario->Password) {
                if($usuario->Id_tipo_usuario == 1){
                    return view('user')->with([
                        'Id' => $usuario->Id_usuario,
                        'Id_persona' => $usuario->Id_persona,
                        'Username' => $usuario->Username,
                        'Password' => $usuario->Password,
                        'Email' => $usuario->Email,
                    ]);
                }elseif($usuario->Id_tipo_usuario == 2){
                    return view('ponente')->with([
                        'Id' => $usuario->Id_usuario,
                        'Id_persona' => $usuario->Id_persona,
                        'Username' => $usuario->Username,
                        'Password' => $usuario->Password,
                        'Email' => $usuario->Email,
                    ]);
                }elseif($usuario->Id_tipo_usuario == 3){
                    return view('admin');
                }else{
                    $mensaje = 'No hay un tipo de usuario definido para este usuario:  ' . $username;
                    return view('login')->with('mensaje', $mensaje);
                }  
            }
        }

        // Si las credenciales no coinciden o el usuario no existe
        $mensaje = 'Credenciales inválidas. Inténtalo de nuevo.';
        return view('login')->with('mensaje', $mensaje);
    }
}
