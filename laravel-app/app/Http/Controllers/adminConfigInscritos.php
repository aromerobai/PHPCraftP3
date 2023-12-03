<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminConfigInscritos extends Controller
{
    public function configInscritos(){
        return view ('adminConfigInscritos');
    }

    public function configInscritosGest(Request $request){
        $Id_acto = $request->input('id_acto');
        $Titulo = $request->input('titulo');

        return view('adminConfigInscritosGest', compact('Id_acto', 'Titulo'));
    }

    public function configInscribir(Request $request){
        $view = $request->input('view');
        $Id_acto = $request->input('id_acto');
        $Titulo = $request->input('titulo');

        return view('adminConfigInscritosGest', compact('view','Id_acto', 'Titulo'));
    }

    public function configDesInscribir(Request $request){
        $view = $request->input('view');
        $Id_acto = $request->input('id_acto');
        $Titulo = $request->input('titulo');

        return view('adminConfigInscritosGest', compact('view','Id_acto', 'Titulo'));
    }
}
