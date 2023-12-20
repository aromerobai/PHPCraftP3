<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Acto;

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

    public function obtenerActosFuturos(){
        $actosFuturos = Acto::where('Fecha', '>', now())
            ->with('Tipo_acto')
            ->orderBy('Fecha', 'asc')
            ->get()
            ->map(function ($acto) {
                return [
                    'Fecha' => $acto->Fecha->format('Y-m-d'),
                    'Hora' => $acto->Hora->format('H:i'),
                    'Titulo' => $acto->Titulo,
                    'Tipo' => $acto->Tipo_acto->Descripcion,
                    'Descripcion'=> $acto->Descripcion_corta,
                    'Aforo'=> $acto->Num_asistentes,
                    
                ];
            });

        return response()->json($actosFuturos);
    }
}
