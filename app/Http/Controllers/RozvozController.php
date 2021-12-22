<?php

namespace App\Http\Controllers;

use App\Models\Rozvoz;

class RozvozController extends Controller
{
    //uvitacia stranka
    public function show($rozvoz_id = 0){
        $rozvozy = Rozvoz::all(); //nacitanie si vsetkych typov rozvozov
        $rozvoz = Rozvoz::find($rozvoz_id); //nacitanie zoznamu pre konkretny rozvoz

        $objednavky = $rozvoz->orders; //nacita si vsetky objednavky k danemu orders_statusu
        $produkty = array(); //vytvr si prazdne pole
        //pre kazdu objednavku si nacitam objednany tovar
        foreach($objednavky as $obj){
            $produkty[$obj->orders_id]= $obj->products; //cez eloquent a funckiu products() triedy Order si nacitam objednane produkty pre danu objednavk
        }


        return view('rozvoz', compact('rozvoz', 'rozvozy', 'objednavky', 'produkty'));
    }
}
