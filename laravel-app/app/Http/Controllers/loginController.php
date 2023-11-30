<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class loginController extends Controller
{
    public function init()
    {
        $usuarios = Usuario::all();
        return view('login')->with('usuarios', $usuarios);
    }

    public function userLogin(Request $request)
    {
        $mensaje = 'HAS ACTUALIZADO';
        return view('login')->with('mensaje', $mensaje);
    }
}
