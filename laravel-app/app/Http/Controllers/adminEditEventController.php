<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Acto;

class adminEditEventController extends Controller
{
    public function editEvent(){
        return view('adminEditEvent');
    }

    public function adminEditFullEvent(Request $request){

        $Id_acto = $request->input("id_acto");
        $Fecha = $request->input("fecha");
        $Hora = $request->input("hora");
        $Titulo = $request->input("titulo");
        $Descripcion_corta = $request->input("descripcion_corta");
        $Descripcion_larga = $request->input("descripcion_larga");
        $Num_asistentes = $request->input("num_asistentes");
        $Id_tipo_acto = $request->input("id_tipo_acto");

        $Id_acto = $request->input("id_acto");

        // Buscar el acto por su ID
        $acto = Acto::find($Id_acto);

        if ($acto) {
            // Actualizar los campos necesarios
            $acto->Fecha = $Fecha;
            $acto->Hora = $Hora;
            $acto->Titulo = $Titulo;
            $acto->Descripcion_corta = $Descripcion_corta;
            $acto->Descripcion_larga = $Descripcion_larga;
            $acto->Num_asistentes = $Num_asistentes;
            $acto->Id_tipo_acto = $Id_tipo_acto;

            // Guardar los cambios
            $acto->save();
        }

        return view('adminEditEvent');
    }
}
