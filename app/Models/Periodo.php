<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    use HasFactory;
    protected $table="periodos";
    protected $primaryKey="idPeriodo";
    public $timestamps=false;
    protected $fillable=["descripcion","actividad","estado"];

    public function vacantes(){
        return $this->hasMany(Vacante::class,'idPeriodo','idPeriodo');
    }

    public function matriculas(){
        return $this->hasMany(Matricula::class,'idPeriodo','idPeriodo');
    }
  
    public function monto(){
        return $this->hasMany(Monto::class,'idMonto','idMonto');
    }

    public function montodescuento(){
        return $this->hasMany(MontoDescuento::class,'idMontoD','idMontoD');
    }

}
