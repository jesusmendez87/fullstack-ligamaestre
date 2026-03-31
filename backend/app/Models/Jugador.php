<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jugador extends Model
{
    protected $table = 'jugadors';
    protected $fillable = ['nombre', 'posicion', 'dorsal', 'club_id'];
    use HasFactory;
    public function club()
    {
        return $this->belongsTo(Club::class);
    }


}
