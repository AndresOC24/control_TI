<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HorariosRegulares extends Model
{
    use HasFactory;

    protected $table = 'horarios_regulares';

    // Aquí defines los campos que se pueden asignar masivamente
    protected $fillable = [
        'user_id',
        'hora_entrada',
        'hora_salida',
        'dia_semana',
        'activo',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
