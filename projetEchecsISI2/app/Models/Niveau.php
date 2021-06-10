<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Niveau extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'nom',
        'eloMin',
        'eloMax',
    ];

    public function joueurs()
    {
        return $this->hasMany(Joueur::class);
    }
}
