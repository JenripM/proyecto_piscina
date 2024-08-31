<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monto extends Model
{
    use HasFactory;
    protected $table="montos";
    protected $primaryKey="idMonto";
    public $timestamps=false;
    protected $fillable=["descripcion","montoMes","montoClase","fechaInicio","fechaFinal","tipo","idPeriodo","estado"];


    public function detalle_matriculas(){
        return $this->hasMany(DetalleMatricula::class,'idMonto','idMonto');
    }

    public function periodo(){
        return $this->hasOne(Periodo::class,'idPeriodo','idPeriodo');
    }
}
