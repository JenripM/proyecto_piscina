<?php

namespace App\Http\Controllers;

use App\Models\Anulacion;
use App\Models\Cliente;
use App\Models\DetalleVacante;
use App\Models\Dia;
use App\Models\Matricula;
use App\Models\DetalleMatricula;
use App\Models\Monto;
use App\Models\MontoDescuento;
use App\Models\Nivel;
use App\Models\Periodo;
use App\Models\Personal;
use App\Models\Programacion;
use App\Models\Turno;
use App\Models\Vacante;
use App\Models\Voucher;
use Illuminate\Http\Request;

class MatriculaController extends Controller
{

    public function show($id){

        $matricula = Matricula::findOrFail($id);

        $detalles = DetalleMatricula::where('idMatricula','like','%'.$id.'%')->get();

        return view('matricula.detalles',compact("detalles","matricula"));
    }


    const PAGINATION=10;
    public function index(Request $request){
        $buscarpor = $request->get('buscarpor');
        $columna = $request->get('buscar');
        if($columna=="" || $columna=="fecha_matricula"){
            $matriculas = Matricula::join('periodos', 'periodos.idPeriodo', '=', 'matriculas.idPeriodo')->where('periodos.actividad','like','ACTIVO')->where("matriculas.estado","=","1")->where('fecha_matricula','like','%'.$buscarpor.'%')->paginate($this::PAGINATION);
        }else{
            $matriculas = Matricula::join('periodos', 'periodos.idPeriodo', '=', 'matriculas.idPeriodo')->where('periodos.actividad','like','ACTIVO')->join('clientes', 'clientes.idCliente', '=', 'matriculas.idCliente')->where('clientes.nombres','like','%'.$buscarpor.'%')->where("matriculas.estado","=","1")->paginate($this::PAGINATION);
        }
        $clientes = Cliente::all();
        $voucher = Voucher::all();
        $periodo = Periodo::all();
        return view("matricula.index",compact('matriculas','buscarpor', 'clientes','periodo','voucher','columna'));
    }
    public function create(){
        $clientes = Cliente::all();
        
        $montos = Monto::select('montos.idMonto','montos.descripcion','montos.montoMes','montos.montoClase','montos.fechaInicio','montos.fechaFinal','montos.tipo')->join('periodos', 'periodos.idPeriodo', '=', 'montos.idPeriodo')->where('periodos.actividad','like','ACTIVO')->where("montos.estado", "=", "1")->get();
        $descuentos = MontoDescuento::select('montosdescuento.idMontoD','montosdescuento.descripcion','montosdescuento.montoDescuento')->join('periodos', 'periodos.idPeriodo', '=', 'montosdescuento.idPeriodo')->where('periodos.actividad','like','ACTIVO')->where("montosdescuento.estado", "=", "1")->get();
        $periodo = Periodo::all();
        
        $dv = DetalleVacante::join('vacantes', 'detalle_vacantes.idVacante', '=', 'vacantes.idVacante')->join('periodos', 'periodos.idPeriodo', '=', 'vacantes.idPeriodo')->where('periodos.actividad','like','ACTIVO')->get();

        //$dm = DetalleMatricula::all();
        return view('matricula.create', compact('clientes','montos', 'descuentos', 'periodo','dv'));
    }


    public function store(Request $request)
    {

        $matricula = new Matricula();
        $matricula->idCliente = $request->idCliente;
        $matricula->idVoucher = "0";
        $matricula->fecha_matricula = $request->fechaMatricula;
        $matricula->cantidad_personas = $request->CantidadPersonas;
        $matricula->idPeriodo = $request->idPeriodo;
        $matricula->estado = "1";
        $matricula->save();

        $idProgramacion = $request->idProgramacion;
        $idMonto = $request->idMonto;
        $idDescuento = $request->idDescuento;

        $cont = 0;

        while ($cont < count($idProgramacion)) {
            $dm = new DetalleMatricula();
            $dm->idMatricula = $matricula->idMatricula;
            $dm->iddv = $idProgramacion[$cont];
            $dm->idMonto = $idMonto[$cont];
            $dm->idMontoD = $idDescuento[$cont];
            $dm->estado = "1";
            $dm->save();

            $dv = DetalleVacante::findOrFail($dm->iddv);
            $dv->cupos_d= ($dv->cupos_d)-($request->CantidadPersonas);
            $dv->save();

            $cont = $cont + 1;
        }

        return redirect()->route('matricula.index')->with('datos', 'Registro Nuevo Guardado...!');
    }

    public function confirmar($id)
    {
        $matricula = Matricula::findOrFail($id);
        return view('matricula.confirmar', compact('matricula'));
    }

    public function destroy($id)
    {
        $matricula = Matricula::findOrFail($id);
        $matricula->estado = '0';
        $matricula->save();
        return redirect()->route('matricula.index')->with('datos', 'Registro Eliminado');
    }

}
