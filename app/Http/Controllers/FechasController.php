<?php

namespace App\Http\Controllers;

use App\Models\Partido;
use App\Models\Entrenamiento;
use Illuminate\Http\Request;
use App\Models\Fecha;
use Illuminate\Support\Facades\Auth;
use App\Models\Equipo;

class FechasController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function calendario(){
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
        return view('calendario.calendario', ['eventos' => $eventos]);
    }

    public function editar($id){
        $fecha = Fecha::find($id);
        if($fecha->Tipo == 0){
            $entrenamiento = Entrenamiento::where('fecha_id',$id)->first();
            return view('calendario.editar', ['fecha' => $fecha, 'entrenamiento' => $entrenamiento]);
        }else{
            $partido = Partido::where('fecha_id',$id)->first();
            return view('calendario.editar', ['fecha' => $fecha, 'partido' => $partido]);
        }

    }

    public function update(Request $r, $id){
        $fecha = Fecha::find($id);
        if($fecha->Tipo == 0){
            $entrenamiento = Entrenamiento::where('fecha_id',$id)->first();
            $fecha->Dia = $r->dia;
            $fecha->Inicio = $r->inicio;
            $fecha->Final = $r->final;
            $entrenamiento->Ejercicios = $r->ejercicios;
            $fecha->save();
            $entrenamiento->save();
            return redirect()->route('calendario');
        }else{
            $partido = Partido::where('fecha_id',$id)->first();
            $fecha->Dia = $r->dia;
            $fecha->Inicio = $r->inicio;
            $partido->Rival = $r->rival;
            $fecha->save();
            $partido->save();
            return redirect()->route('calendario');
        }
    }

    public function delete($id){
        $f = Fecha::find($id);
        if($f->Tipo == 0){
            $e = Entrenamiento::where('fecha_id',$id)->first();
            $f->delete();
            $e->delete();
            return redirect()->route('calendario');
        }else{
            $e = Partido::where('fecha_id',$id)->first();
            $f->delete();
            $e->delete();
            return redirect()->route('calendario');
        }
    }

    public function createPartido(){
        return view('calendario.crearPartido');
    }

    public function createEntrenamiento(){
        return view('calendario.crearEntrenamiento');
    }

    public function storePartido(Request $r){
        $user_id = Auth::id();
        $equipo = Equipo::where('user_id','=', $user_id)->get();
        $primer_equipo_id = $equipo->first()->id;
        $f = new Fecha();
        $p = new Partido();
        $f->equipo_id = $primer_equipo_id;
        $f->Tipo = 1;
        $f->Dia = $r->dia;
        $f->Inicio = $r->inicio;
        $f->save();
        $p->Rival = $r->rival;
        $p->fecha_id =  $f->id;
        $p->save();
        return redirect()->route('calendario');
    }

    public function storeEntrenamiento(Request $r){
        $user_id = Auth::id();
        $equipo = Equipo::where('user_id','=', $user_id)->get();
        $primer_equipo_id = $equipo->first()->id;
        $f = new Fecha();
        $e = new Entrenamiento();
        $f->equipo_id = $primer_equipo_id;
        $f->Tipo = 0;
        $f->Dia = $r->dia;
        $f->Inicio = $r->inicio;
        $f->Final = $r->final;
        $f->save();
        $e->Ejercicios = $r->ejercicios;
        $e->fecha_id =  $f->id;
        $e->save();
        return redirect()->route('calendario');
    }
}
