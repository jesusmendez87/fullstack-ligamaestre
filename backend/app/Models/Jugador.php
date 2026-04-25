<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Laravel\Sanctum\HasApiTokens;

class Jugador extends Model implements AuthenticatableContract
{
    use Authenticatable, HasApiTokens;

    protected $connection = 'mongodb';
    protected $collection = 'jugadores';
    protected $fillable = [
        'username',
        'password',
        'name',
        'rol',
        'nombre',
        'posicion',
        'dorsal',
        'club_id',
        'api_token',

    ];




    public function club()
    {
        return $this->belongsTo(Club::class);
    }


}
