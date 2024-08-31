<?php

namespace App\Http\Controllers;

use App\Models\MontoDescuento;
use App\Models\Periodo;
use Illuminate\Http\Request;
use DB;

class MontoDescuentoController extends Controller
{
    const PAGINATION=10;
    public function index(Request $request){
        $buscarpor = $request->get('buscarpor');
        $descuento= MontoDescuento::select('montosdescuento.idMontoD','montosdescuento.descripcion','montosdescuento.montoDescuento')->join('periodos', 'periodos.idPeriodo', '=', 'montosdescuento.idPeriodo')->where("montosdescuento.estado","=","1")->where('montosdescuento.descripcion','like','%'.$buscarpor.'%')->where('periodos.actividad','like','ACTIVO')->paginate($this::PAGINATION);
        $periodo = Periodo::all();
        return view("descuento.index",compact("descuento",'buscarpor','periodo'));
    }


    public function create(){
        $periodo = Periodo::all();
        return view('descuento.create', compact('periodo'));
    }

    public function store(Request $request){
       
        $montos=new MontoDescuento();
        $montos->descripcion=$request->descripcion;
        $montos->montoDescuento=$request->montoDescuento;
        $montos->idPeriodo=$request->idPeriodo;
        $montos->estado="1";
        $montos->save();
        return redirect()->route('descuento.index')->with('datos','Registro Nuevo Guardado...!');
    }

}
