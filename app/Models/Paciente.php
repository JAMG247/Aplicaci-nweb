<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Paciente extends Model
{
    protected $table = 'pacientes';

    protected $fillable = [
        'id',
        'rut',
        'nombres',
        'apellidos',
        'email',
        'telefono',
        'fecha_nacimiento',
    ];

    // Esta línea es clave para tratar fecha_nacimiento como objeto Carbon
    protected $casts = [
        'fecha_nacimiento' => 'date',
    ];
}
