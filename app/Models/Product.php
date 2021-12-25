<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    //nazov tabulky
    protected $table = 'products';
    //nazov primarneho kluca
    protected $primaryKey = 'products_id';

    //funkcia vrati popis k produktu
    public function description() {
        return $this->hasOne(ProductDescription::class, 'products_id');
    }

    //fnkcia na najdenie prislusnych balikov k danemu produktu
    public function baliky() {
        //                     nazov pivot tabulky     id produktu v pivot,id balika v pivot, id produktu v tabulke products, id balika v tabulke baliky 
        return $this->belongsToMany( Balik::class, 'vbelco_baliky_to_products', 'products_id' , 'typ_balika_id', 'products_id', 'id');
    }

}
