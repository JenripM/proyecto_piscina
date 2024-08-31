<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    use HasFactory;
    protected $table="turnos";
    protected $primaryKey="idTurno";
    public $timestamps=false;
    protected $fillable=["idTurno","iddia","descripcion","idPeriodo","estado"];

    public function programaciones(){
        return $this->hasMany(Programacion::class,'idTurno','idTurno');
    }

    public function dia(){
        return $this->hasOne(Dia::class,'iddia','iddia');
    }
}
