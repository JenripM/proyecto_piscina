<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anulacion extends Model
{
    use HasFactory;
    protected $table="anulaciones";
    protected $primaryKey="idAnulacion";
    public $timestamps=false;
    protected $fillable=["idMatricula","motivo","fecha_a"];

    public function matricula(){
        return $this->hasOne(Matricula::class,'idMatricula','idMatricula');
    }
}
