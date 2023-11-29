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
}
