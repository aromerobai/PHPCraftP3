<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListaPonente;

class adminPonenteController extends Controller
{
    public function adminPonente(){
        return view('adminPonente');
    }

    public function adminCrearPonente(Request $request){
        $Id_persona = $request->input("id_persona");
        $Id_acto = $request->input("id_acto");
        $Orden = $request->input("orden");

        $nuevoPonente = new ListaPonente();
        $nuevoPonente->Id_persona = $Id_persona;
        $nuevoPonente->Id_acto = $Id_acto;
        $nuevoPonente->Orden = $Orden;
    
        // Guardar el nuevo registro en la base de datos
        $nuevoPonente->save();
        return view('adminPonente');
    }

    public function adminGestionarPonente(Request $request){

        $Id_ponente = $request->input('id_ponente');
        $Id_acto = $request->input('id_acto');
        $Id_persona = $request->input('id_persona');
        $Orden = $request->input('orden');

        if ($request->has('guardar_cambios')) {
            $ponente = ListaPonente::findOrFail($Id_ponente);

            // Actualizar los campos con los nuevos valores
            $ponente->Id_acto = $Id_acto;
            $ponente->Id_persona = $Id_persona;
            $ponente->Orden = $Orden;

            // Guardar los cambios en la base de datos
            $ponente->save();

            return view('adminPonente');

        } elseif ($request->has('eliminar_ponente')) {
            // Si se elimina el ponente
            $ponente = ListaPonente::findOrFail($Id_ponente);
            // Eliminar el registro
            $ponente->delete();

            return view('adminPonente');
        }
    }
}
