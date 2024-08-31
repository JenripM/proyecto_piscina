<?php

namespace App\Http\Controllers;
use App\Models\Nivel;
use Illuminate\Http\Request;

class NivelController extends Controller
{
    const PAGINATION=10;
    public function index(Request $request){
        $buscarpor = $request->get('buscarpor');
        $nivel=Nivel::where("estado","=","1")->where('descripcion','like','%'.$buscarpor.'%')->paginate($this::PAGINATION);
        return view("nivel.index",compact("nivel",'buscarpor'));
    }

    public function create(){
        return view('nivel.create');
    }

    public function store(Request $request){
        $data=$request->validate([
            'descripcion'=>'required|max:40'
        ],
        [
            'descripcion.required'=>'Ingrese descripción',
            'descripcion.max'=>'Máximo 40 caracteres para la descripción'
        ]);

        $nivel=new Nivel();
        $nivel->descripcion=$request->descripcion;
        $nivel->abreviatura=$request->abreviatura;
        $nivel->estado="1";
        $nivel->save();
        return redirect()->route('nivel.index')->with('datos','Registro Nuevo Guardado...!');
    }

    public function edit($id){
        $nivel=Nivel::findOrFail($id);
        return view('nivel.edit',compact('nivel'));
    }

    public function update(Request $request,$id){
        $data=$request->validate([
            'descripcion'=>'required|max:40',
            'abreviatura'=>'required|max:10'
        ],
        [
            'descripcion.required'=>'Ingrese una descripción',
            'descripcion.max'=>'Máximo 40 caracteres para la descripción',
            'abreviatura.required'=>'Ingrese una abreviatura',
            'abreviatura.max'=>'Máximo 10 caracteres para la abreviatura'
        ]);

        $nivel=Nivel::findOrFail($id);
        $nivel->descripcion=$request->descripcion;
        $nivel->abreviatura=$request->abreviatura;
        $nivel->save();
        return redirect()->route('nivel.index')->with('datos','Registro Actualizado...!');
    }

    public function confirmar($id){
        $nivel=Nivel::findOrFail($id);
        return view('nivel.confirmar',compact('nivel'));
    }

    public function destroy($id){
        $nivel=Nivel::findOrFail($id);
        $nivel->estado='0';
        $nivel->save();
        return redirect()->route('nivel.index')->with('datos','Registro Eliminado');
    }
}
