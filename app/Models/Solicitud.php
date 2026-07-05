<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;

    protected $table = 'solicitudes';
    protected $primaryKey ='id';

    protected $fillable = [
        'estudiante_id',
        'tipo_solicitud',
        'descripcion',
        'estado',
        'observaciones',
    ];

    public function getRouteKeyName()
    {
        return 'id';
    }
    
    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class);
    }
}