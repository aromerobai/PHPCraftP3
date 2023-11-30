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
}
