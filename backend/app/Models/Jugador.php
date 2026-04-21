<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Auth\User as Authenticatable;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;


class Jugador extends Authenticatable implements JWTSubject
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'usuarios';
    protected $fillable = [
        'username',
        'password',
        'name',
        'rol',
        'nombre',
        'posicion',
        'dorsal',
        'club_id',
    ];


    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function club()
    {
        return $this->belongsTo(Club::class);
    }


}
