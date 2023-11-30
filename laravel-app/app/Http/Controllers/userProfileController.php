<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userProfileController extends Controller
{
    function userProfileModify(Request $request){
        $Id = $request->input('Id');
        $Username = $request->input('Username');
        $Password = $request->input('Password');
        $Email = $request->input('Email'); 
        return view('user', compact('Id', 'Username', 'Password', 'Email'));
    }
}
