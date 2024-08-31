<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    use HasFactory;
    protected $table="niveles";
    protected $primaryKey="idNivel";
    public $timestamps=false;
    protected $fillable=["descripcion","abreviatura","estado"];

    public function programaciones(){
        return $this->hasMany(Programacion::class,'idNivel','idNivel');
    }
}
