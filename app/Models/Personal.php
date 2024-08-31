<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    use HasFactory;
    protected $table="personal";
    protected $primaryKey="idPersonal";
    public $timestamps=false;
    protected $fillable=["dni","apellidos","nombres","direccion","telefono","sexo","cargo","estado"];

    public function programaciones(){
        return $this->hasMany(Programacion::class,'idPersonal','idPersonal');
    }
}
