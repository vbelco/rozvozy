<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    //nazov tabulky
    protected $table = 'orders';
    //nazov primarneho kluca
    protected $primaryKey = 'orders_id';

    //ze ake produkty ma tato objednavka
    public function products(){
        return $this->belongsToMany(Product::class,'orders_products', 'orders_id', 'products_id', 'orders_id', 'products_id' );
    }

}
