<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    protected $table = 'partidos';

    protected $fillable = [
        'club_local_id',
        'club_visitante_id',
        'liga_id',
        'fecha',
        'resultado',
    ];

    public function clubLocal()
    {
        return $this->belongsTo(Club::class, 'club_local_id'); // Relación con el club local
    }

    public function clubVisitante()
    {
        return $this->belongsTo(Club::class, 'club_visitante_id'); // Relación con el club visitante
    }

    public function liga()
    {
        return $this->belongsTo(Liga::class); // Relación con la liga
    }
}
