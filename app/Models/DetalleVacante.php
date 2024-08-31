<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVacante extends Model
{
    use HasFactory;
    protected $table="detalle_vacantes";
    protected $primaryKey="iddv";
    public $timestamps=false;
    protected $fillable=["idVacante","idProgramacion","cupos_d","estado"];

    public function detalle_matriculas(){
        return $this->hasMany(DetalleMatricula::class,'iddv','iddv');
    }

    public function vacante(){
        return $this->hasOne(Vacante::class,'idVacante','idVacante');
    }

    public function programacion(){
        return $this->hasOne(Programacion::class,'idProgramacion','idProgramacion');
    }
}
