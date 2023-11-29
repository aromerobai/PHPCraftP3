<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
    function init() {
        return view('home');
    }
    
    public function mostrarFormularioRegistro()
    {
        return redirect()->route('register'); // Redirigir a la ruta 'registro'
    }

    public function mostrarFormularioLogin()
    {
        return redirect()->route('login'); // Redirigir a la ruta 'login'
    }
}
