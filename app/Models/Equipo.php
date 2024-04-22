<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function jugadores() {
        return $this->hasMany('App\Models\Jugador', 'equipo_id','id');
    }

    public function fechas() {
        return $this->hasMany('App\Models\Fecha', 'equipo_id','id');
    }
}
