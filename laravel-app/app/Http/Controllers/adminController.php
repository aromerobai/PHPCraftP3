<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    public function crearActo()
    {
        return view()->route('crearActo');
    }

    public function configurarActo()
    {
        return view()->route('confActo');
    }

    public function adminBack(){
        return view('admin');
    }
}
