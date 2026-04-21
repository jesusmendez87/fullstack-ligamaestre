<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Partido extends Model
{
    protected $collection = 'partidos';
    protected $connection = 'mongodb';

    protected $fillable = [
        'local_id',
        'visitante_id',
        'liga_id',
        'arbitro_id',
        'lugar_id',
        'fecha',
        'resultado',
    ];

    public function clubLocal()
    {
        return $this->belongsTo(Club::class, 'local_id'); // Relación con el club local
    }

    public function clubVisitante()
    {
        return $this->belongsTo(Club::class, 'visitante_id'); // Relación con el club visitante
    }

    public function liga()
    {
        return $this->belongsTo(Liga::class); // Relación con la liga
    }
}
