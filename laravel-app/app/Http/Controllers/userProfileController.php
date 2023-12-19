<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class userProfileController extends Controller
{
    function userProfileModify(Request $request){
        $Id = $request->input('Id');
        $Username = $request->input('newUsername');
        $Password = $request->input('newPassword');
        $Email = $request->input('newEmail'); 

        $usuario = Usuario::find($Id);

        if ($usuario) {
            $usuario->Username = $Username;
            $usuario->Password = $Password;
            $usuario->Email = $Email;
        
            if ($usuario->save()) {
                if ($request->has('Ponente')) {
                    $Ponente = $request->input('Ponente');
                    return view('user', compact('Id', 'Username', 'Password', 'Email','Ponente'));
                } else {
                    return view('user', compact('Id', 'Username', 'Password', 'Email'));
                }
                
            } else {
                // Error al guardar
                return back()->with('error', 'Error al guardar los cambios');
            }
        } else {
            // Usuario no encontrado
            return back()->with('error', 'Usuario no encontrado');
        }
        
    }

    public function userProfileBack(){
        return view('login');
    }
}
