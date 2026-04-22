<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class Liga extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $collection = 'liga';
    protected $connection = 'mongodb';
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
