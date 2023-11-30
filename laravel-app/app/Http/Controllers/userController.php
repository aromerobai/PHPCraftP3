<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{
    public function userProfile(Request $request){
        $id = $request->input('id');
        $username = $request->input('username');
        $password = $request->input('password');
        $email = $request->input('email'); 
        return view('userProfile', compact('id', 'username', 'password', 'email'));
    }
}
