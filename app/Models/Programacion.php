<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programacion extends Model
{
    use HasFactory;
    protected $table="programaciones";
    protected $primaryKey="idProgramacion";
    public $timestamps=false;
    protected $fillable=["idPiscina","idTurno","idNivel","idPersonal","idPeriodo","estado"];

    public function detalle_vacantes(){
        return $this->hasMany(DetalleVacante::class,'idProgramacion','idProgramacion');
    }

    public function piscina(){
        return $this->hasOne(Piscina::class,'idPiscina','idPiscina');
    }

    public function turno(){
        return $this->hasOne(Turno::class,'idTurno','idTurno');
    }

    public function nivel(){
        return $this->hasOne(Nivel::class,'idNivel','idNivel');
    }

    public function personal(){
        return $this->hasOne(Personal::class,'idPersonal','idPersonal');
    }

    public function periodo(){
        return $this->hasOne(Periodo::class,'idPeriodo','idPeriodo');
    }
}
