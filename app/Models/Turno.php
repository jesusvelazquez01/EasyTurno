<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    protected $fillable = [
        'nro_turno',
        'profesor',
        'carrera',
        'email',
        'entrada',
        'salida',
        'fecha',
        'sala_informatica_id'
    ];

    public function sala()
{
    return $this->belongsTo(SalaInformatica::class, 'sala_informatica_id');
}

}
