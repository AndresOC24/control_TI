<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroAsistencia extends Model
{
    use HasFactory;

    protected $table = 'registros_asistencia';

    protected $fillable = [
        'user_id',
        'fecha',
        'hora_entrada',
        'hora_salida',
        'minutos_tarde_entrada',
        'minutos_temprano_salida',
        'balance_minutos_dia',
        'balance_minutos_acumulado',
        'comentarios',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
