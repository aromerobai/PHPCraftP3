<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class loginControlador extends Controller
{
    public function index(){
        $datos = DB::select("Select * from Personas");
        return view("welcome")->with("datos",$datos);
    }
}
