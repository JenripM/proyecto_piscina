<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $table="clientes";
    protected $primaryKey="idCliente";
    public $timestamps=false;
    protected $fillable=["direccion","telefono","nombres","sexo","documento","tipo_documento","estado"];

    public function matriculas(){
        return $this->hasMany(Matricula::class,'idCliente','idCliente');
    }
}
