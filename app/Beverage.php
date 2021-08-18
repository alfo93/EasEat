<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beverage extends Model
{
    protected $fillable = [
        'id_locale','nome_bevanda', 'costo', 
    ];
}
