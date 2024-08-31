<?php

namespace App\Http\Controllers;

use App\Models\Dia;
use App\Models\Programacion;
use App\Models\Turno;
use App\Models\Personal;
use App\Models\Nivel;
use App\Models\Periodo;
use App\Models\Piscina;
use App\Models\Vacante;
use App\Models\DetalleVacante;
use Illuminate\Http\Request;

class ProgramacionController extends Controller
{

    public function show($id){

        $detalles=DetalleVacante::join('vacantes', 'detalle_vacantes.idVacante', '=', 'vacantes.idVacante')
        ->where("idprogramacion","like",'%'.$id.'%')->get();

        return view('programacion.ver',compact("detalles"));
    }

    const PAGINATION = 10;
    public function index(Request $request)
    {
        $buscarpor = $request->get('buscarpor');
        $programacion = Programacion::join('periodos', 'periodos.idPeriodo', '=', 'programaciones.idPeriodo')->where('periodos.actividad','like','ACTIVO')->where("programaciones.estado", "=", "1")->where('idProgramacion', 'like', '%' . $buscarpor . '%')->paginate($this::PAGINATION);
        $turno = Turno::all();
        $personal = Personal::all();
        $nivel = Nivel::all();
        $dia = Dia::all();
        $piscina = Piscina::all();
        $periodo = Periodo::all();
        return view("programacion.index", compact("turno", 'buscarpor', 'programacion', 'nivel', 'personal', 'piscina', 'dia', 'periodo'));
    }

    public function create()
    {
        $turno = Turno::all();
        $nivel = Nivel::all();
        $dia = Dia::all();
        $personal = Personal::all();
        $piscina = Piscina::all();
        $periodo = Periodo::all();
        $vacante = Vacante::join('periodos', 'periodos.idPeriodo', '=', 'vacantes.idPeriodo')->where('periodos.actividad','like','ACTIVO')->where("vacantes.estado", "=", "1")->get();
        return view('programacion.create', compact('nivel', 'dia', 'turno', 'personal', 'piscina', 'periodo', 'vacante'));
    }


    public function edit($id)
    {
        $turno = Turno::all();
        $nivel = Nivel::all();
        $dia = Dia::all();
        $personal = Personal::all();
        $piscina = Piscina::all();
        $periodo = Periodo::all();
        $programacion = Programacion::findOrFail($id);
        return view('programacion.edit', compact('programacion', 'nivel', 'dia', 'turno', 'personal', 'piscina', 'periodo'));
    }


    public function store(Request $request)
    {
        $programacion = new Programacion();
        $programacion->idTurno = $request->idTurno;
        $programacion->idPersonal = $request->idPersonal;
        $programacion->idNivel = $request->idNivel;
        $programacion->idPiscina = $request->idPiscina;
        $programacion->idPeriodo = $request->idPeriodo;
        $programacion->estado = "1";
        $programacion->save();

        $idVacante = $request->idVacante;

        $cont = 0;

        while ($cont < count($idVacante)) {
            $dv = new DetalleVacante();
            $dv->idProgramacion = $programacion->idProgramacion;
            $dv->idVacante = $idVacante[$cont];
            $vacante = Vacante::findOrFail($idVacante[$cont]);
            $dv->cupos_d =  $vacante->cupos;
            $dv->estado = "1";
            $dv->save();

            $cont = $cont + 1;
        }

        return redirect()->route('programacion.index')->with('datos', 'Registro Nuevo Guardado...!');
    }



    public function update(Request $request, $id)
    {
        $data = $request->validate(
            [
                'descripcion' => 'required|max:40'
            ],
            [
                'descripcion.required' => 'Ingrese descripción',
                'descripcion.max' => 'Máximo 40 caracteres para la descripción'
            ]
        );

        $programacion = Programacion::findOrFail($id);
        $programacion->idTurno = $request->idTurno;
        $programacion->idPersonal = $request->idPersonal;
        $programacion->idNivel = $request->idNivel;
        $programacion->idPiscina = $request->idPiscina;
        $programacion->idPeriodo = $request->idPeriodo;
        $programacion->estado = "1";
        $programacion->save();
        return redirect()->route('programacion.index')->with('datos', 'Registro Nuevo Guardado...!');
    }

    public function confirmar($id)
    {
        $programacion = Programacion::findOrFail($id);
        return view('programacion.confirmar', compact('programacion'));
    }

    public function destroy($id)
    {
        $programacion = Programacion::findOrFail($id);
        $programacion->estado = '0';
        $programacion->save();
        return redirect()->route('programacion.index')->with('datos', 'Registro Eliminado');
    }
}
