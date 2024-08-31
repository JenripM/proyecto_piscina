<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Turno;
use App\Models\Periodo;
use App\Models\Dia;
class TurnoController extends Controller
{
    const PAGINATION=10;
    public function index(Request $request){
        $buscarpor = $request->get('buscarpor');
        $turno= Turno::select('turnos.idTurno','turnos.iddia','turnos.descripcion','turnos.idPeriodo')->join('periodos', 'periodos.idPeriodo', '=', 'turnos.idPeriodo')->where('periodos.actividad','like','ACTIVO')->where("turnos.estado","=","1")->where('turnos.descripcion','like','%'.$buscarpor.'%')->paginate($this::PAGINATION);
        $periodo = Periodo::all();
        $dia = Dia::all();
        return view("turno.index",compact("turno",'buscarpor', 'periodo', 'dia'));
    }

    public function create(){
        $periodo = Periodo::all();
        $dia = Dia::all();
        return view('turno.create', compact('periodo','dia'));
    }

    
    public function store(Request $request){
        $data=$request->validate([
            'descripcion'=>'required|max:40'
        ],
        [
            'descripcion.required'=>'Ingrese descripción',
            'descripcion.max'=>'Máximo 40 caracteres para la descripción'
        ]);

        $turno=new Turno();
        $turno->iddia=$request->iddia;
        $turno->descripcion=$request->descripcion;
        $turno->idPeriodo=$request->idPeriodo;   
        $turno->estado="1";
        $turno->save();
        return redirect()->route('turno.index')->with('datos','Registro Nuevo Guardado...!');
    }

}
