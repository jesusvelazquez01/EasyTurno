<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalaInformatica extends Model
{
protected $table = 'sala_informaticas';
protected $fillable = [
    'nombre',
    'ubicacion',
    'equipos',
    'disponibilidad',
];
    //
    public function turnos()
{
    return $this->hasMany(Turno::class);
}

}
