<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;
    protected $table="vouchers";
    protected $primaryKey="idVoucher";
    public $timestamps=false;
    protected $fillable=["banco","nroOperacion","imagen","observacion","estado"];

    public function matriculas(){
        return $this->hasMany(Matricula::class,'idVoucher','idVoucher');
    }
}
