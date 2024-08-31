<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    use HasFactory;
    protected $table="cargos";
    protected $primaryKey="idcargo";
    public $timestamps=false;
    protected $fillable=["descripcion","estado"];

    public function users(){
        return $this->hasMany(User::class,'idcargo','idcargo');
    }
}
