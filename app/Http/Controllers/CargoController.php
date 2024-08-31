<?php

namespace App\Http\Controllers;
use App\Models\Cargo;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    const PAGINATION=10;
    public function index(Request $request){
        $buscarpor = $request->get('buscarpor');
        $cargo=Cargo::where("estado","=","1")->where('descripcion','like','%'.$buscarpor.'%')->paginate($this::PAGINATION);
        return view("cargo.index",compact("cargo",'buscarpor'));
    }
    public function create(){
        return view('cargo.create');
    }

    public function store(Request $request){
        $data=$request->validate([
            'descripcion'=>'required|max:40'
        ],
        [
            'descripcion.required'=>'Ingrese descripción',
            'descripcion.max'=>'Máximo 40 caracteres para la descripción'
        ]);

        $cargo=new Cargo();
        $cargo->descripcion=$request->descripcion;
        $cargo->estado="1";
        $cargo->save();
        return redirect()->route('cargo.index')->with('datos','Registro Nuevo Guardado...!');
    }

    public function edit($id){
        $cargo=Cargo::findOrFail($id);
        return view('cargo.edit',compact('cargo'));
    }

    public function update(Request $request,$id){
        $data=$request->validate([
            'descripcion'=>'required|max:40'
        ],
        [
            'descripcion.required'=>'Ingrese descripción',
            'descripcion.max'=>'Máximo 40 caracteres para la descripción'
        ]);

        $cargo=Cargo::findOrFail($id);
        $cargo->descripcion=$request->descripcion;
        $cargo->save();
        return redirect()->route('cargo.index')->with('datos','Registro Actualizado...!');
    }

    public function confirmar($id){
        $cargo=Cargo::findOrFail($id);
        return view('cargo.confirmar',compact('cargo'));
    }

    public function destroy($id){
        $cargo=Cargo::findOrFail($id);
        $cargo->estado='0';
        $cargo->save();
        return redirect()->route('cargo.index')->with('datos','Registro Eliminado');
    }

}
