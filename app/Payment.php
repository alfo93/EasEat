<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'id_user','id_locale','nome', 'num_carta', 
    ];
}
