<?php

namespace App\Http\Controllers;

use App\Models\Matricula;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as s;
use DB;

class VoucherController extends Controller
{
    
    const PAGINATION=10;
    public function index(Request $request){
        $buscarpor = $request->get('buscarpor');
        $voucher= Voucher::where("estado","=","1")->where('banco','like','%'.$buscarpor.'%')->paginate($this::PAGINATION);
        return view("voucher.index",compact('buscarpor','voucher'));
    }


    public function create2($id){
        $matricula = Matricula::findOrFail($id);
        return view('voucher.create',compact('matricula'));
    }

    public function store(Request $request){
        $voucher=new Voucher();
        $voucher->banco=$request->banco;
        $voucher->nroOperacion=$request->nroOperacion;
        if(s::hasFile('imagen')){
            $file=s::file('imagen');
            $file->move(public_path().'/img/vouchers/',$file->getClientOriginalName());
            $voucher->imagen=$file->getClientOriginalName();
        }
        if($request->observacion!=""){
            $voucher->observacion=$request->observacion;
        }else{
            $voucher->observacion="APROBADO";
        }
        $voucher->estado="1";
        $voucher->save();


        $matricula = Matricula::findOrFail($request->idMatricula);
        $matricula->idVoucher=$voucher->idVoucher;
        $matricula->save();

        return redirect()->route('matricula.index')->with('datos','Registro Nuevo Guardado...!');
    }
}
