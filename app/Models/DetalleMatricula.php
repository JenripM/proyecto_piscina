<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleMatricula extends Model
{
   
    use HasFactory;
    protected $table="detalle_matriculas";
    protected $primaryKey="iddm";
    public $timestamps=false;
    protected $fillable=["iddv","idMatricula","idMonto","idMontoD","estado"];

    public function detalle_vacante(){
        return $this->hasOne(DetalleVacante::class,'iddv','iddv');
    }

    public function matricula(){
        return $this->hasOne(Matricula::class,'idMatricula','idMatricula');
    }

    public function monto(){
        return $this->hasOne(Monto::class,'idMonto','idMonto');
    }

    public function montodescuento(){
        return $this->hasOne(MontoDescuento::class,'idMontoD','idMontoD');
    }

}
