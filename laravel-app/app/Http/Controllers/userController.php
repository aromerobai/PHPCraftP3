<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class userController extends Controller
{
    public function userProfile(Request $request){
        $Id = $request->input('Id');
        $Username = $request->input('Username');
        $Password = $request->input('Password');
        $Email = $request->input('Email'); 

        return view('userProfile', compact('Id', 'Username', 'Password', 'Email'));
        
    }

    public function userInscription(Request $request){
        $Id = $request->input('Id');
        $Username = $request->input('Username');
        $Password = $request->input('Password');
        $Email = $request->input('Email'); 

        return view('userInscription', compact('Id','Username', 'Password', 'Email'));
        
    }

    public function userDesInscription(Request $request){
        $Id = $request->input('Id');
        $Username = $request->input('Username');
        $Password = $request->input('Password');
        $Email = $request->input('Email'); 

        return view('userDesInscription', compact('Id','Username', 'Password', 'Email'));
        
    }
    
    public function usuarioVista(Request $request){
        $view = $request->input('view');
        $Id = $request->input('Id');
        $Username = $request->input('Username');
        $Password = $request->input('Password');
        $Email = $request->input('Email');
    
        // Realizar cualquier procesamiento adicional si es necesario
    
        return view('user', compact('view','Id', 'Username', 'Password', 'Email'));
    }

    public function userBack(){
        return view('home');
    }
}

