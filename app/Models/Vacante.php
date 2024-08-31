<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacante extends Model
{
    use HasFactory;
    protected $table="vacantes";
    protected $primaryKey="idVacante";
    public $timestamps=false;
    protected $fillable=["mes","cupos","idPeriodo","estado"];

    public function detalle_vacantes(){
        return $this->hasMany(DetalleVacante::class,'idVacante','idVacante');
    }

    public function periodo(){
        return $this->hasOne(Periodo::class,'idPeriodo','idPeriodo');
    }
}
