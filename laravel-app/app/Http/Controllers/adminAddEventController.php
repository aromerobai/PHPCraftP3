<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminAddEventController extends Controller
{
    public function adminAddEvent(){
        return view('adminAddEvent');
    }

    public function adminAddEventInsert(){
        return view('adminAddEvent');
    }
    
}
