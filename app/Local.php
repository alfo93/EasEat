<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Local extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'indirizzo', 'num_tavoli', 'disp_massima', 'id_ristoratore', 'info', 'tipo', 'pianta', 'sponsorizzato', 'link_immagine',  
    ];
}
