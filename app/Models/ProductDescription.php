<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDescription extends Model
{
    use HasFactory;

    //nazov tabulky
    protected $table = 'products_description';
    //nazov primarneho kluca
    protected $primaryKey = 'products_id' ;

}
