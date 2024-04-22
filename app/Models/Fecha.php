<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fecha extends Model
{
    use HasFactory;

    public function equipo() {
        return $this->belongsTo('App\Models\Equipo');
    }

    public function entrenamientos() {
        return $this->hasMany('App\Models\Entrenamiento','fecha_id','id');
    }

    public function partidos() {
        return $this->hasMany('App\Models\Partido','fecha_id','id');
    }
}
