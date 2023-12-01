<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscrito;
use Carbon\Carbon;

class userInscriptionController extends Controller
{
    function userAddInscription(Request $request){
        $id_acto = $request->input('id_acto');
        $Id = $request->input('id_persona');
        $Password = $request->input('password');
        $Username = $request->input('username');
        $Email = $request->input('email');

        // Crear una nueva instancia del modelo Inscrito
        $inscripcion = new Inscrito();

        // Asignar los valores a los campos
        $inscripcion->id_acto = $id_acto;
        $inscripcion->Id_persona = $Id;
        $inscripcion->fecha_inscripcion = Carbon::now();
        // Asignar otros campos si es necesario...

        // Guardar los datos en la base de datos
        $inscripcion->save();

        return view('userInscription', compact('Id','Username', 'Password', 'Email'));
    }

    function userAddInscriptionBack(Request $request){
        $id_acto = $request->input('id_acto');
        $Id = $request->input('id_persona');
        $Password = $request->input('password');
        $Username = $request->input('username');
        $Email = $request->input('email');

        return view('user', compact('Id','Username', 'Password', 'Email'));
    }
}
