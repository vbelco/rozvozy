<?php

namespace App\Http\Controllers;

use App\Models\Rozvoz;

class RozvozController extends Controller
{
    //uvitacia stranka
    public function show($rozvoz_id = 0){
        $rozvozy = Rozvoz::all(); //nacitanie si vsetkych typov rozvozov
        $rozvoz = Rozvoz::find($rozvoz_id); //nacitanie zoznamu pre konkretny rozvoz

        $objednavky = $rozvoz->orders; //nacita si vsetky objednavky k danemu typu rozrozu, rozumej order_statusu

        return view('rozvoz', compact('rozvoz', 'rozvozy', 'objednavky'));
    }
}
