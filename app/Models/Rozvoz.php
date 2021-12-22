<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rozvoz extends Model
{
    use HasFactory;

    //nazov tabulky
    protected $table = 'orders_status';
    //nazov primarneho kluca
    protected $primaryKey = 'orders_status_id';

    public function orders(){ //one to many db vztah, nacita vsetky objednavky ku konkretnej orders_statusu teda k rozvozu
        return $this->hasMany(Order::class, 'orders_status');
    }

}
