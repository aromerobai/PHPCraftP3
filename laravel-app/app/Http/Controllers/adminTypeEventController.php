<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoActo;

class adminTypeEventController extends Controller
{
    public function adminTypeEvent(){
        return view('adminTypeEvent');
    }

    public function adminTypeEventEdit(Request $request){

        $Id_tipo_acto = $request->input('Id_tipo_acto');
        $Descripcion = $request->input('Descripcion');

        if ($request->has('guardar_cambios')) {

            $tipoActo = TipoActo::findOrFail($Id_tipo_acto);
            $tipoActo->Descripcion = $Descripcion;
            $tipoActo->save();

            return view('adminTypeEvent');

        }elseif ($request->has('eliminar_tipoActo')) {
            
            $tipoActo = TipoActo::findOrFail($Id_tipo_acto);
            $tipoActo->delete();

            return view('adminTypeEvent');
        }
    }

    public function adminTypeEventAdd(Request $request){
        $Descripcion = $request->input('Descripcion');
        $tipoActo = new TipoActo();
        $tipoActo->Descripcion = $Descripcion;
        
        // Guardar el nuevo tipo de acto en la base de datos
        $tipoActo->save();

        return view('adminTypeEvent');
    }
}
