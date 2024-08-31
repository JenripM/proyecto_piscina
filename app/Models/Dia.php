<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dia extends Model
{
    use HasFactory;
    protected $table="dias";
    protected $primaryKey="iddia";
    public $timestamps=false;
    protected $fillable=["descripcion","estado"];

    public function turnos(){
        return $this->hasMany(Turno::class,'iddia','iddia');
    }
}
