<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Starter extends Model
{
	protected $fillable = [
        'id_locale','nome_piatto', 'costo', 
    ];
}
