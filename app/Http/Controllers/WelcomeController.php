<?php

namespace App\Http\Controllers;

use App\Models\Rozvoz;

class WelcomeController extends Controller
{
    //uvitacia stranka
    public function welcome(){
        $rozvozy = Rozvoz::all();

        return view('welcome', compact('rozvozy'));
    }
}
