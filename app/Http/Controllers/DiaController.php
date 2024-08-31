<?php

namespace App\Http\Controllers;
use App\Models\Dia;
use Illuminate\Http\Request;

class DiaController extends Controller
{
    const PAGINATION=10;
    public function index(Request $request){
        $buscarpor = $request->get('buscarpor');
        $dia=Dia::where("estado","=","1")->where('descripcion','like','%'.$buscarpor.'%')->paginate($this::PAGINATION);
        return view("dia.index",compact("dia",'buscarpor'));
    }

    public function create(){
        return view('dia.create');
    }

    public function store(Request $request){
        $data=$request->validate([
            'descripcion'=>'required|max:40'
        ],
        [
            'descripcion.required'=>'Ingrese descripción',
            'descripcion.max'=>'Máximo 40 caracteres para la descripción'
        ]);

        $dia=new Dia();
        $dia->descripcion=$request->descripcion;
        $dia->estado="1";
        $dia->save();
        return redirect()->route('dia.index')->with('datos','Registro Nuevo Guardado...!');
    }

    public function edit($id){
        $dia=Dia::findOrFail($id);
        return view('dia.edit',compact('dia'));
    }

    public function update(Request $request,$id){
        $data=$request->validate([
            'descripcion'=>'required|max:40'
        ],
        [
            'descripcion.required'=>'Ingrese descripción',
            'descripcion.max'=>'Máximo 40 caracteres para la descripción'
        ]);

        $dia=Dia::findOrFail($id);
        $dia->descripcion=$request->descripcion;
        $dia->estado="1";
        $dia->save();
        return redirect()->route('dia.index')->with('datos','Registro Nuevo Guardado...!');
    }

    public function confirmar($id){
        $dia=Dia::findOrFail($id);
        return view('dia.confirmar',compact('dia'));
    }

    public function destroy($id){
        $dia=Dia::findOrFail($id);
        $dia->estado='0';
        $dia->save();
        return redirect()->route('dia.index')->with('datos','Registro Eliminado');
    }

}
