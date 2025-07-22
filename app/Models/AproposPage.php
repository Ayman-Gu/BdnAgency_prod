<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AproposPage extends Model
{
    protected $table='apropos_pages';
    protected $fillable=[
        'idAproposPage',
        'name',
        'hero_section',
        'qui_sommes_nous_section',
        'nos_valeurs_section',
        'notre_histoire_section',
        'notre_equipe_section',
        'cta_section'
    ];
}
