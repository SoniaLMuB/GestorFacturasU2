<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receptora extends Model
{
    use HasFactory;
    protected $table = 'receptora';
    protected $fillable = [
        'nombre',
        'direccion',
        'rfc',
        'contacto',
        'email',
    ];
    //Se hacen las conexiones entre las tablas de facturas
    public function facturas(){
        $this->hasMany(Factura::class,'receptora_id');
    }
}
