<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Club extends Model
{
    use HasFactory;

    protected $collection = 'equipos';
    protected $connection = 'mongodb';
    protected $fillable = [
        'name',
        'city',
        'category',
        'players',
        'sport',
    ];

    /**
     * Get the ligas for the club.
     */
    public function ligas()
    {
        return $this->hasMany(Liga::class); //  relación de un club con muchas ligas
    }
}
