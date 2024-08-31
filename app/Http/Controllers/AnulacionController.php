<?php

namespace App\Http\Controllers;
use App\Models\Anulacion;
use App\Models\DetalleMatricula;
use App\Models\DetalleVacante;
use App\Models\Matricula;
use App\Models\Periodo;
use Illuminate\Http\Request;

class AnulacionController extends Controller
{
    
    const PAGINATION=10;
    public function index(Request $request){
        $buscarpor = $request->get('buscarpor');
        $anulacion=Anulacion::join('matriculas', 'anulaciones.idMatricula', '=', 'matriculas.idMatricula')->join('periodos', 'periodos.idPeriodo', '=', 'matriculas.idPeriodo')->where('periodos.actividad','like','ACTIVO')->where('fecha_a','like','%'.$buscarpor.'%')->where("anulaciones.estado","=","1")->paginate($this::PAGINATION);
        $periodo = Periodo::all();
        return view("anulacion.index",compact("anulacion",'buscarpor',"periodo"));
    }

    public function eliminar($id){
        $anulacion=Anulacion::findOrFail($id);
        $anulacion->estado=0;
        $anulacion->save();

        $matricula=Matricula::findOrFail($anulacion->idMatricula);
        $matricula->estado=1;
        $matricula->save();
        return redirect()->route('anulacion.index')->with('datos','Registro Actualizado...!');
    }


    public function confirmaranulacion($id)
    {
        $matricula = Matricula::findOrFail($id);
        return view('matricula.anular', compact('matricula'));
    }

    public function anulacion(Request $request,$id)
    {
        $anulacion= new Anulacion();
        $anulacion->idMatricula = $id;
        $anulacion->motivo = $request->motivo;
        $anulacion->fecha_a = $request->fecha_a;
        $anulacion->save();


        $matricula = Matricula::findOrFail($id);
        $matricula->estado = '0';
        $matricula->save();


        $dm=DetalleMatricula::join('matriculas', 'detalle_matriculas.idMatricula', '=', 'matriculas.idMatricula')
        ->where("detalle_matriculas.idMatricula","like",'%'.$id.'%')->get();

        foreach($dm as $item){
            $dv = DetalleVacante::findOrFail($item->iddv);
            $dv->cupos_d = ($dv->cupos_d) + ($matricula->cantidad_personas);
            $dv->save();
        }

        return redirect()->route('matricula.index')->with('datos', 'Registro Eliminado');
    }
}
