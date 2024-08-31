<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Cargo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as s;

class UsuarioController extends Controller
{
    public function perfil($id){
        $user = User::findOrFail($id);
        $cargos = Cargo::all();
        return view("usuario.index",compact('user','cargos'));
    }

    public function update(Request $request,$id){

        $user=User::findOrFail($id);
        $user->name=$request->name;
        $user->direccion=$request->direccion;
        $user->dni=$request->dni;
        $user->estado="Verificado";
        $user->idcargo=$request->idcargo;

        if(s::hasFile('foto')){
            $file=s::file('foto');
            $file->move(public_path().'/img/usuarios/',$file->getClientOriginalName());
            $user->foto=$file->getClientOriginalName();
        }

        $user->save();
        return redirect()->route('usuario.perfil',$id)->with('datos','Registro Actualizado...!');
    }
}
