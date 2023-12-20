<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class documentos extends Controller
{
    public function documentosPagina(){

        return view('documentosPagina');
    }   
}
