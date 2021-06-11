<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournoi extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'nom',
        'date',
        'adresse',
        'classement',
        'niveau_id',
        'organisateur_id',
    ];
    public function parties(){
        return $this->hasMany(Partie::class);
    }
    public function joueurs(){
        return $this->belongsToMany(Joueur::class, 'participes');
    }
}
