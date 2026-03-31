<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Club extends Model
{
    use HasFactory;
    protected $table = 'clubs';
    protected $fillable = [
        'nombre',
        'ciudad',
        'categoria',
    ];

    /**
     * Get the ligas for the club.
     */
    public function ligas()
    {
        return $this->hasMany(Liga::class); //  relación de un club con muchas ligas
    }
}
