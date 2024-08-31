<?php

namespace App\Http\Controllers;

use App\Models\Monto;
use App\Models\Periodo;
use Illuminate\Http\Request;

class MontoController extends Controller
{
    
    const PAGINATION=10;
    public function index(Request $request){
        $buscarpor = $request->get('buscarpor');
        $montos= Monto::select('montos.idMonto','montos.descripcion','montos.montoMes','montos.montoClase','montos.fechaInicio','montos.fechaFinal','montos.tipo')->join('periodos', 'periodos.idPeriodo', '=', 'montos.idPeriodo')->where("montos.estado","=","1")->where('montos.descripcion','like','%'.$buscarpor.'%')->where('periodos.actividad','like','ACTIVO')->paginate($this::PAGINATION);
        $periodo = Periodo::all();
        return view("monto.index",compact("montos",'buscarpor', 'periodo'));
    }

    public function create(){
        $periodo = Periodo::all();
        return view('monto.create', compact('periodo'));
    }

    public function store(Request $request){
     
        $montos=new Monto();
        $montos->descripcion=$request->descripcion;
        $montos->montoMes=$request->montoMes;
        $montos->montoClase=$request->montoClase;
        $montos->fechaInicio=$request->fechaInicio;
        $montos->fechaFinal=$request->fechaFinal;
        $montos->tipo=$request->tipo;
        $montos->idPeriodo=$request->idPeriodo;
        $montos->estado="1";
        $montos->save();
        return redirect()->route('monto.index')->with('datos','Registro Nuevo Guardado...!');
    }


    public function edit($id){
        $periodo = Periodo::all();
        $montos=Monto::findOrFail($id);
        return view('monto.edit',compact('montos','periodo'));
    }

    public function update(Request $request,$id){
        $data=$request->validate([
            'descripcion'=>'required|max:40'
        ],
        [
            'descripcion.required'=>'Ingrese descripción',
            'descripcion.max'=>'Máximo 40 caracteres para la descripción'
        ]);

        $montos = Monto::findOrFail($id);
        $montos->descripcion=$request->descripcion;
        $montos->montoMes=$request->montoMes;
        $montos->montoClase=$request->montoClase;
        $montos->fechaInicio=$request->fechaInicio;
        $montos->fechaFinal=$request->fechaFinal;
        $montos->tipo=$request->tipo;
        $montos->idPeriodo=$request->idPeriodo;
        $montos->estado="1";
        $montos->save();
        return redirect()->route('monto.index')->with('datos','Registro Nuevo Guardado...!');
    }

    
    public function confirmar($id){
        $montos=Monto::findOrFail($id);
        return view('monto.confirmar',compact('montos'));
    }

    public function destroy($id){
        $montos=Monto::findOrFail($id);
        $montos->estado='0';
        $montos->save();
        return redirect()->route('monto.index')->with('datos','Registro Eliminado');
    }

}
