<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balik extends Model
{
    use HasFactory;

    //nazov tabulky
    protected $table = 'vbelco_baliky';
    //nazov primarneho kluca, ak je id, tak nieje povinne
    protected $primaryKey = 'id';
}
