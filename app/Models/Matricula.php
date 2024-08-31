<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    use HasFactory;
    protected $table="matriculas";
    protected $primaryKey="idMatricula";
    public $timestamps=false;
    protected $fillable=["idCliente","idVoucher","fecha_matricula","cantidad_personas","idPeriodo","estado"];

    public function anulaciones(){
        return $this->hasMany(Anulacion::class,'idMatricula','idMatricula');
    }

    public function cliente(){
        return $this->hasOne(Cliente::class,'idCliente','idCliente');
    }

    public function periodo(){
        return $this->hasOne(Periodo::class,'idPeriodo','idPeriodo');
    }

    public function voucher(){
        return $this->hasOne(Voucher::class,'idVoucher','idVoucher');
    }

    public function detalle_matricula(){
        return $this->hasMany(DetalleMatricula::class,'idMatricula','idMatricula');
    }
}
