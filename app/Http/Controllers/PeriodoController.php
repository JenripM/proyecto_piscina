<?php

namespace App\Http\Controllers;

use App\Models\Periodo;
use Illuminate\Http\Request;

class PeriodoController extends Controller
{
    const PAGINATION=10;
    public function index(Request $request){
        $buscarpor = $request->get('buscarpor');
        $periodo=Periodo::where("estado","=","1")->where('descripcion','like','%'.$buscarpor.'%')->paginate($this::PAGINATION);
        return view("periodo.index",compact("periodo",'buscarpor'));
    }

    
    public function create(){
        return view('periodo.create');
    }
    
    public function activar($id){

        $periodos = Periodo::all();

        foreach($periodos as $item){

            $item->actividad="INACTIVO";
            $item->save();
        }

        $periodo=Periodo::findOrFail($id);
        $periodo->actividad="ACTIVO";
        $periodo->save();
        return redirect()->route('periodo.index')->with('datos','Registro Nuevo Guardado...!');
    }

    public function store(Request $request){


        $periodo=new Periodo();
        $periodo->descripcion=$request->descripcion;
        $periodo->actividad="INACTIVO";
        $periodo->estado="1";
        $periodo->save();
        return redirect()->route('periodo.index')->with('datos','Registro Nuevo Guardado...!');
    }

}

