<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
        'documento',
        'email',
        'codigo_estudiantil',
        'programa_academico',
        'telefono',
    ];

    
    public function solicitudes()
    {
        return $this->hasMany(Solicitud::class);
    }
}
