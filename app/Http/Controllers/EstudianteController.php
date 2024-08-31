<?php

namespace App\Http\Controllers;
use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    
    const PAGINATION=10;
    public function index(Request $request){
        $buscarpor = $request->get('buscarpor');
        $estudiante=Estudiante::where("estado","=","1")->where('apellidos','like','%'.$buscarpor.'%')->paginate($this::PAGINATION);
        return view("estudiante.index",compact("estudiante",'buscarpor'));
    }

    public function create(){
        return view('estudiante.create');
    }

    
    public function store(Request $request){
         
        $data=$request->validate([
            'dni'=>'required|numeric',
            'nombres'=>'required|max:40',
            'apellidos'=>'required|max:40',
            'direccion'=>'required|max:40',
            'edad'=>'required|numeric',
            'telefono'=>'required|numeric'
        ]);

       
        $estudiante=new Estudiante();
        $estudiante->dni=$request->dni;
        $estudiante->nombres=$request->nombres;
        $estudiante->apellidos=$request->apellidos;
        $estudiante->edad=$request->edad;
        $estudiante->direccion=$request->direccion;
        $estudiante->sexo=$request->sexo;
        $estudiante->telefono=$request->telefono;
        $estudiante->tipo=$request->tipo;
        $estudiante->estado="1";
        $estudiante->save();
        return redirect()->route('estudiante.index')->with('datos','Registro Nuevo Guardado...!');
    }
}
