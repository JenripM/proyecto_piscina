<?php

namespace App\Http\Controllers;
use App\Models\Personal;
use App\Models\Cargo;
use Illuminate\Http\Request;

class PersonalController extends Controller
{

    const PAGINATION=10;
    public function index(Request $request){
        $buscarpor = $request->get('buscarpor');
        $personal = Personal::where("estado","=","1")->where('apellidos','like','%'.$buscarpor.'%')->paginate($this::PAGINATION);
        $cargos = Cargo::all();
        return view("personal.index",compact("personal",'buscarpor', 'cargos'));
    }

    public function create(){
        $cargos = Cargo::all();
        return view('personal.create', compact('cargos'));
    }


    public function store(Request $request){

        $data = $request->validate([
            'dni'=>'required|numeric|unique:personal,dni',
            'nombres'=>'required|max:40',
            'apellidos'=>'required|max:40',
            'direccion'=>'required|max:40',
            'telefono'=>'required|numeric'
        ]);


        $personal=new Personal();
        $personal->dni=$request->dni;
        $personal->nombres=$request->nombres;
        $personal->apellidos=$request->apellidos;
        $personal->direccion=$request->direccion;
        $personal->sexo=$request->sexo;
        $personal->telefono=$request->telefono;
        $personal->idCargo=$request->idCargo;
        $personal->estado="1";
        $personal->save();
        return redirect()->route('personal.index')->with('datos','Registro Nuevo Guardado...!');
    }
}
