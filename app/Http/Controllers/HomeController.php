<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Equipo;
use App\Models\Fecha;
use App\Models\Jugador;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = Auth::id();
        $equipo = Equipo::where('user_id','=', $user_id)->get();
        $maximos_goleadores = [];
        $maximos_asistentes = [];
        $amarillas = [];
        $rojas = [];
        $fechas = Fecha::all();
        $eventos = [];
        foreach($fechas as $fecha){
            if($fecha->Tipo==1){
                $tipo = 'Partido';
                $color = '#73C6B6';
            }else{
                $tipo = 'Entrenamiento';
                $color = '#F1C40F ';
            }
            $start = $fecha->Dia .' '.$fecha->Inicio;
            $end = $fecha->Dia .' '.$fecha->Final;
            $eventos[] = [
                'id' => $fecha->id,
                'title' => $tipo,
                'start' => $start,
                'end' => $end,
                'backgroundColor' => $color,
            ];
        }
        if ($equipo->isNotEmpty()) {
            $primer_equipo_id = $equipo->first()->id;
            $maximos_goleadores = Jugador::where('equipo_id', '=',$primer_equipo_id)
                ->orderBy('Goles', 'desc')
                ->take(3)
                ->get();
            $maximos_asistentes = Jugador::where('equipo_id', '=',$primer_equipo_id)
            ->orderBy('Asistencias', 'desc')
                ->take(3)
                ->get();

            $amarillas = Jugador::where('equipo_id', '=',$primer_equipo_id)
            ->orderBy('Amarillas', 'desc')
                ->take(3)
                ->get();

            $rojas = Jugador::where('equipo_id', '=',$primer_equipo_id)
            ->orderBy('Rojas', 'desc')
                ->take(3)
                ->get();
        }
        return view('home', ['maximos_goleadores' => $maximos_goleadores, 'maximos_asistentes' => $maximos_asistentes, 'amarillas' => $amarillas, 'rojas' => $rojas,'equipo_id' => $primer_equipo_id, 'eventos' => $eventos]);
    }
}
