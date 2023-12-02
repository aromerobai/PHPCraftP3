<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Acto;

class adminAddEventController extends Controller
{
    public function adminAddEvent(){
        return view('adminAddEvent');
    }

    public function adminAddEventInsert(Request $request){
        $data = [
            'Fecha' => $request->input("fecha"),
            'Hora' => $request->input("hora"),
            'Titulo' => $request->input("titulo"),
            'Descripcion_corta' => $request->input("descripcion_corta"),
            'Descripcion_larga' => $request->input("descripcion_larga"),
            'Num_asistentes' => $request->input("num_asistentes"),
            'Id_tipo_acto' => $request->input("id_tipo_acto"),
        ];

        // Insertar un nuevo registro usando el método create
        $nuevoActo = Acto::create($data);
        // Lógica para verificar si el acto se ha creado correctamente
        $mensaje = $nuevoActo ? 'Se ha registrado el evento' : 'Error al crear el evento';

        // Pasar la variable $mensaje a la vista
        return view('adminAddEvent', compact('mensaje'));
    }
    
}
