<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class Partido extends Model
{
        use HasApiTokens, HasFactory, Notifiable;

    protected $collection = 'partidos';
    protected $connection = 'mongodb';

    protected $fillable = [
        'local_id',
        'visitante_id',
        'liga_id',      
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
