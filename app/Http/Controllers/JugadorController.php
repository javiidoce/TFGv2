<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Http\Request;
use App\Models\Jugador;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class JugadorController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function equipo()
    {
        $userId = Auth::id();

        $equipo = Equipo::where('user_id', $userId)
                     ->first();

        $jugadores = Jugador::where('equipo_id', $equipo->id)
                         ->orderByRaw("FIELD(posicion, 'POR', 'DEF', 'MC', 'DEL'), dorsal")
                         ->get();

        return view('equipo.equipo', ['jugadores' => $jugadores]);
    }

    public function editar($id)
    {
        $jugador = Jugador::findOrFail($id);
        $dorsales = Jugador::pluck('dorsal')->toArray();
        return view('equipo.editar', ['jugador' => $jugador, 'equipo_id' => $jugador->equipo_id, 'dorsales' => $dorsales]);
    }

    public function update(Request $r, $id){

        $jugador = Jugador::find($id);
        $jugador->Nombre = $r->nombre;
        $jugador->Dorsal = $r->dorsal;
        $jugador->Posicion = $r->posicion;
        $minutos = $r->añadirMinutos - $r->quitarMinutos;
        $jugador->Minutos += $minutos;
        $amarillas = $r->añadirAmarillas - $r->quitarAmarillas;
        $jugador->Amarillas += $amarillas;
        $rojas = $r->añadirRojas - $r->quitarRojas;
        $jugador->Rojas += $rojas;
        $goles = $r->añadirGoles - $r->quitarGoles;
        $jugador->Goles += $goles;
        $asistencias = $r->añadirAsistencias - $r->quitarAsistencias;
        $jugador->Asistencias += $asistencias;
        $jugador->Notas = $r->notas;
        $jugador->save();

        return redirect()->route('equipo');
    }

    public function delete($id){
        $j = Jugador::find($id);
        $j->delete();
        return redirect()->route('equipo');
    }

    public function crear(){
        $dorsales = Jugador::pluck('dorsal')->toArray();
        return view('equipo.crear', ['dorsales' => $dorsales]);
    }

    public function store(Request $r){
        $userId = Auth::id();
        $equipo = Equipo::where('user_id', $userId)
                     ->first();
        $jugador = new Jugador();
        $jugador->equipo_id = $equipo->id;
        $jugador->Nombre = $r->nombre;
        $jugador->Dorsal = $r->dorsal;
        $jugador->Posicion = $r->posicion;
        $jugador->Minutos = $r->minutos;
        $jugador->Amarillas = $r->amarillas;
        $jugador->Rojas = $r->rojas;
        $jugador->Goles = $r->goles;
        $jugador->Asistencias = $r->asistencias;
        $jugador->Notas = $r->notas;
        $jugador->save();
        return redirect()->route('equipo');
    }

}
