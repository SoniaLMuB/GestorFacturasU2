<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;

    protected $fillable=[
        'emisora_id',
        'receptora_id',
        'folio',
        'pdf',
        'xml'
    ];
    
    //Se hacen las relaciones entre las tablas de la base de datos
    public function empEmisora(){
        return $this->belongsTo(Emisora::class,'emisora_id');
    }

    //Se hacen las relaciones de eloquent de las empresas
    public function empReceptora(){
        return $this->belongsTo(Receptora::class,'receptora_id');
    }
}
