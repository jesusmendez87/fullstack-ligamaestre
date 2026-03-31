<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Liga extends Model
{
    protected $table = 'ligas';

    protected $fillable = [
        'nombre',
        'deporte',
        'temporada',
    ];


    /**
     * Get the clubs for the league.
     */

    public function clubes()
    {
        return $this->hasMany(Club::class);  // Una liga tiene muchos clubes
    }
}
