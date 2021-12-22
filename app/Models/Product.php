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

}
