<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emisora extends Model
{
    protected $table = 'emisora';
    use HasFactory;
    protected $fillable = [
        'razon_social',
        'email',
        'rfc_emisora',
    ];
    //Se hacen las conexiones entre las tablas de facturas
    public function facturas(){
         $this->hasMany(Factura::class,'emisora_id');
    }
}
