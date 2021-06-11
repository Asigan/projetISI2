<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Joueur extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'id',
        'prenom',
        'nom',
        'nationalite',
        'niveau',
    ];
    public function parties(){
        return $this->hasMany(Partie::class);
    }

    public function elo(){
        return $this->belongsTo(Niveau::class);
    }
}
