<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscrito;

class userDesInscriptionController extends Controller
{
    public function userDesAddInscription(Request $request){
        $id_acto = $request->input('id_acto');
        $Id = $request->input('id_persona');
        $Password = $request->input('password');
        $Username = $request->input('username');
        $Email = $request->input('email');

        Inscrito::where('id_acto', $id_acto)
            ->where('Id_persona', $Id)
            ->delete();

        return view('userDesInscription', compact('Id','Username', 'Password', 'Email'));
    }
}
