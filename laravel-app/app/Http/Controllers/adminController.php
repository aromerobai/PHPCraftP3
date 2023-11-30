<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    public function crearActo()
    {
        return redirect()->route('crear-acto');
    }

    public function configurarActo()
    {
        return redirect()->route('gestio-acto');
    }
}
