<?php

namespace App\Http\Controllers;

use App\Models\Vacante;
use App\Models\Periodo;
use Illuminate\Http\Request;

class VacanteController extends Controller
{
    const PAGINATION=10;
    public function index(Request $request){
        $buscarpor = $request->get('buscarpor');
        $vacante= Vacante::join('periodos', 'periodos.idPeriodo', '=', 'vacantes.idPeriodo')->where('periodos.actividad','like','ACTIVO')->where("vacantes.estado","=","1")->where('mes','like','%'.$buscarpor.'%')->paginate($this::PAGINATION);
        $periodo = Periodo::all();
        return view("vacante.index",compact("vacante",'buscarpor', 'periodo'));
    }

    public function create(){
        $periodo = Periodo::all();
        return view('vacante.create', compact('periodo'));
    }

    public function store(Request $request){
        // $data=$request->validate([
        //     'descripcion'=>'required|max:40'
        // ],
        // [
        //     'descripcion.required'=>'Ingrese descripción',
        //     'descripcion.max'=>'Máximo 40 caracteres para la descripción'
        // ]);
    
        $vacante=new Vacante();
        $vacante->mes=$request->mes;
        $vacante->cupos=$request->cupos;
        $vacante->idPeriodo=$request->idPeriodo;
        $vacante->estado="1";
        $vacante->save();
        return redirect()->route('vacante.index')->with('datos','Registro Nuevo Guardado...!');
    }

    public function edit($id){
        $periodo = Periodo::all();
        $vacante=Vacante::findOrFail($id);
        return view('vacante.edit',compact('vacante','periodo'));
    }

    public function update(Request $request,$id){
        // $data=$request->validate([
        //     'descripcion'=>'required|max:40'
        // ],
        // [
        //     'descripcion.required'=>'Ingrese descripción',
        //     'descripcion.max'=>'Máximo 40 caracteres para la descripción'
        // ]);
    
        $vacante=Vacante::findOrFail($id);
        $vacante->mes=$request->mes;
        $vacante->cupos=$request->cupos;
        $vacante->idPeriodo=$request->idPeriodo;
        $vacante->estado="1";
        $vacante->save();
        return redirect()->route('vacante.index')->with('datos','Registro Nuevo Guardado...!');
    }
}
