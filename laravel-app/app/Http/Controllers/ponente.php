<?php

namespace App\Http\Controllers;
use App\Models\Documentacion;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ponente extends Controller
{

    public function ponente(Request $request)
    {
        return view('ponente')->with([
            'Id' => $request->Id,
            'Username' => $request->Username,
        ]);
    }

    public function subirArchivo(Request $request)
    {
        $request->validate([
            'archivo' => 'required|file',
            'id_acto' => 'required|integer'
        ]);
    
        $archivo = $request->file('archivo');
        $nombreArchivo = time() . '_' . $archivo->getClientOriginalName();
    
        // Definir la ruta final del archivo en public/documentos
        $finalPath = public_path('documentos/' . $nombreArchivo);

        // Mover el archivo directamente a la carpeta public/documentos
        $archivo->move(public_path('documentos'), $nombreArchivo);

        // Aquí tu lógica para guardar en la base de datos
        $documentacion = new Documentacion();
        $documentacion->Id_acto = $request->id_acto;
        $documentacion->Id_persona = $request->Id;
        $documentacion->Orden = 1;
        $documentacion->Localizacion_documentacion = 'documentos/' . $nombreArchivo;
        $documentacion->Titulo_documento = $nombreArchivo;
        $documentacion->save();
    
        return view('ponente')->with([
            'Id' => $request->Id,
            'Username' => $request->Username,
        ]);
    }
    
}
