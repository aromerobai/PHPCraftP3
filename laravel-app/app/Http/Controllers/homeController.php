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
        return view('register'); // Redirigir a la ruta 'registro'
    }

    public function mostrarFormularioLogin()
    {
        return view('login'); // Redirigir a la ruta 'login'
    }

    public function mostrarActos()
    {
        return view('actos'); // Redirigir a la ruta 'actos'
    }
}
