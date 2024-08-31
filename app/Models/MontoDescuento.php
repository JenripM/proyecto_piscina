<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MontoDescuento extends Model
{
    use HasFactory;
    protected $table="montosdescuento";
    protected $primaryKey="idMontoD";
    public $timestamps=false;
    protected $fillable=["descripcion","montoDescuento","idPeriodo","estado"];

    
    public function detalle_matriculas(){
        return $this->hasMany(DetalleMatricula::class,'idMatricula','idMatricual');
    }
    
    public function periodo(){
        return $this->hasOne(Periodo::class,'idPeriodo','idPeriodo');
    }
}
