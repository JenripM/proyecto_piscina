<?php

namespace App\Http\Controllers;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    const PAGINATION=10;
    public function index(Request $request){
        $buscarpor = $request->get('buscarpor');
        $cliente=Cliente::where("estado","=","1")->where('nombres','like','%'.$buscarpor.'%')->paginate($this::PAGINATION);
        return view("cliente.index",compact("cliente",'buscarpor'));
    }
    public function create(){
        return view('cliente.create');
    }

    public function store(Request $request){
        $cliente=new Cliente();
        $cliente->direccion=$request->direccion;
        $cliente->telefono=$request->telefono;
        $cliente->nombres=$request->nombres;
        $cliente->sexo=$request->sexo;
        $cliente->documento=$request->documento;
        $cliente->tipo_documento=$request->tipo_documento;
        $cliente->estado="1";
        $cliente->save();
        return redirect()->route('cliente.index')->with('datos','Registro Nuevo Guardado...!');
    }

    public function store2(Request $request){
        $cliente=new Cliente();
        $cliente->direccion=$request->direccion;
        $cliente->telefono=$request->telefono;
        $cliente->nombres=$request->nombres;
        $cliente->sexo=$request->sexo;
        $cliente->documento=$request->documento;
        $cliente->tipo_documento=$request->tipo_documento;
        $cliente->estado="1";
        $cliente->save();
        //return redirect()->route('matricula.create');
    }

    public function edit($id){
        $cliente=Cliente::findOrFail($id);
        return view('cliente.edit',compact('cliente'));
    }

    public function update(Request $request,$id){
        // $data=$request->validate([
        //     'descripcion'=>'required|max:40'
        // ],
        // [
        //     'descripcion.required'=>'Ingrese descripción',
        //     'descripcion.max'=>'Máximo 40 caracteres para la descripción'
        // ]);

        $cliente=Cliente::findOrFail($id);
        $cliente->direccion=$request->direccion;
        $cliente->telefono=$request->telefono;
        $cliente->nombres=$request->nombres;
        $cliente->sexo=$request->sexo;
        $cliente->documento=$request->documento;
        $cliente->tipo_documento=$request->tipo_documento;
        $cliente->estado="1";
        $cliente->save();
        return redirect()->route('cliente.index')->with('datos','Registro Nuevo Guardado...!');
    }

    public function confirmar($id){
        $cliente=Cliente::findOrFail($id);
        return view('cliente.confirmar',compact('cliente'));
    }

    public function destroy($id){
        $cliente=Cliente::findOrFail($id);
        $cliente->estado='0';
        $cliente->save();
        return redirect()->route('cliente.index')->with('datos','Registro Eliminado');
    }
}
